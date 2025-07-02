from flask import Flask, request, jsonify
from flask_cors import CORS
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
import numpy as np
import io
import os
import traceback

app = Flask(__name__)
CORS(app)

# === Config: Paths to your models ===
BASE_DIR = "C:/xampp/htdocs/Blood_Cancer_Detection/gp/"
filter_model_path = os.path.join(BASE_DIR, "blood_detector.h5")
cancer_model_path = os.path.join(BASE_DIR, "blood_cancer_model.keras")

# === Load Models ===
try:
    filter_model = load_model(filter_model_path)
    cancer_model = load_model(cancer_model_path)
    print("✅ Models loaded successfully.")
    print("Filter model input shape:", filter_model.input_shape)
    print("Cancer model input shape:", cancer_model.input_shape)

except Exception as e:
    filter_model = None
    cancer_model = None
    print(f"❌ Error loading models: {e}")
    traceback.print_exc()

# === Health Check Route ===
@app.route('/api/healthcheck', methods=['GET'])
def healthcheck():
    if filter_model is None or cancer_model is None:
        return jsonify({"status": "error", "message": "Model(s) failed to load."}), 500
    return jsonify({"status": "success", "message": "Models are loaded and working."}), 200

# === Prediction Route ===
@app.route('/api/predict', methods=['POST'])
def predict():
    if filter_model is None or cancer_model is None:
        return jsonify({"error": "Model(s) not loaded"}), 500

    if 'file' not in request.files:
        return jsonify({"error": "No file uploaded"}), 400

    file = request.files['file']
    if file.filename == '':
        return jsonify({"error": "Uploaded file is empty"}), 400

    try:
        file_bytes = file.read()

        # === Step 1: Preprocess for filter model ===
        img_for_filter = image.load_img(io.BytesIO(file_bytes), target_size=(150, 150))
        img_array_filter = image.img_to_array(img_for_filter)
        img_array_filter = np.expand_dims(img_array_filter, axis=0) / 255.0

        filter_pred = filter_model.predict(img_array_filter)
        is_blood_image = filter_pred[0][0] < 0.5  # Assuming sigmoid output

        if not is_blood_image:
            return jsonify({
                "success": True,
                "is_blood_image": False,
                "prediction": "This is not a blood image. Please upload a valid image of blood cells."
            }), 200

        # === Step 2: Preprocess for cancer model ===
        img_for_cancer = image.load_img(io.BytesIO(file_bytes), target_size=(224, 224))
        img_array_cancer = image.img_to_array(img_for_cancer)
        img_array_cancer = np.expand_dims(img_array_cancer, axis=0) / 255.0

        cancer_pred = cancer_model.predict(img_array_cancer)
        predicted_class = int(np.argmax(cancer_pred))
        confidence = float(np.max(cancer_pred))

        class_labels = ['Benign', 'Pre-B', 'Pro-B', 'Early Pre-B']
        prediction_label = class_labels[predicted_class] if predicted_class < len(class_labels) else "Unknown"

        return jsonify({
            "success": True,
            "is_blood_image": True,
            "prediction": prediction_label,
            "confidence": round(confidence * 100, 2)
        })

    except Exception as e:
        traceback.print_exc()
        return jsonify({"error": f"Prediction failed: {str(e)}"}), 500



# === Run the Server ===
if __name__ == '__main__':
    app.run(debug=True, port=5000)
