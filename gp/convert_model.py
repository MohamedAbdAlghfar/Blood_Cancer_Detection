import keras

# Load the Keras 3 model
model = keras.models.load_model("blood_cancer_model.keras")

# Save as HDF5
model.save("blood_cancer_model_fixed.h5")
print("✅ Model converted to .h5")