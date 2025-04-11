from tensorflow.keras.models import load_model
from flask import Flask, jsonify, request
from flask_cors import CORS
import numpy as np
import tensorflow as tf
from tensorflow.keras.preprocessing import image
import io

app = Flask(__name__)
CORS(app)

# Load the model
model_load_path = r"C:/xampp/htdocs/Blood_Cancer_Detection/gp/blood_cancer_model.h5"

try:
    loaded_model = load_model(model_load_path)
    print("Model loaded successfully!")
except Exception as e:
    loaded_model = None
    print(f"Error loading model: {e}")

@app.route('/api/healthcheck', methods=['GET'])
def check():
    if loaded_model is None:
        return jsonify({"status": "error", "message": "Model not loaded"}), 500
    return jsonify({"status": "success", "message": "Model loaded successfully"}), 200

@app.route('/api/predict', methods=['POST'])
def predict():
    if loaded_model is None:
        return jsonify({"error": "Model not loaded"}), 500

    if 'file' not in request.files:
        return jsonify({"error": "No file uploaded"}), 400

    file = request.files['file']
    if file.filename == '':
        return jsonify({"error": "No selected file"}), 400 

    try:
        # Convert FileStorage object to BytesIO for processing
        img = image.load_img(io.BytesIO(file.read()), target_size=(224, 224))  # Adjust size if needed

        # Convert image to array and normalize
        img_array = image.img_to_array(img)
        img_array = np.expand_dims(img_array, axis=0)  # Add batch dimension
        img_array /= 255.0  # Normalize (same preprocessing as training)

        # Make prediction
        predictions = loaded_model.predict(img_array)
        predicted_class = np.argmax(predictions)

        class_labels = ['Pre-B', 'Pro-B', 'Early Pre-B']  # Replace with actual class names
        return jsonify({"prediction": class_labels[predicted_class]})
    
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True, port=5000)
