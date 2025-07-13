# 🩸 Blood Cancer Detection System

A full-stack deep learning-based web application for detecting **leukemia stages** from blood cell images. Built with **Laravel (PHP)** for the web backend and **Flask (Python)** for serving ML models, this system provides doctors with an easy interface for uploading patient images and receiving a fast and accurate diagnosis using pretrained CNN models.

---

## 📊 System Architecture


![Slide1](https://github.com/user-attachments/assets/dfa4642e-bf5a-45f5-ac78-52b372afe1df)


The system follows a three-tier architecture:
- **Presentation Layer:** Laravel web interface where doctors register/login, upload images, and view predictions.
- **Application Layer:** Flask handles image filtering (is it a valid blood cell?) and classification (cancer stage).
- **Data Layer:** Stores users, patients, predictions, and images.

---

## 🧠 Project Overview

- **Problem:** Early-stage leukemia detection is difficult, often requiring invasive and slow tests.
- **Solution:** AI-powered classification of microscopic images of blood using InceptionV3 and CNN models.
- **Goal:** Automatically detect stages of leukemia (Benign, Early Pre-B, Pre-B, Pro-B) with high accuracy.

---

## 🩺 Features

✅ Detect if an uploaded image is a valid blood cell image  
✅ Classify valid images into 4 stages of leukemia  
✅ Doctor login/register + profile edit  
✅ Add/manage patients  
✅ Store and view diagnosis history  
✅ Contact admin form and feedback  
✅ PDF-report ready database schema

---

## 🧩 Models Used

| Model           | Role                                | Accuracy   |
|----------------|-------------------------------------|------------|
| `blood_detector.h5`   | Checks if uploaded image is a blood cell     | ~98.5%     |
| `blood_cancer_model.keras` | Classifies into 4 leukemia stages using InceptionV3 | 99.62%     |

---

## 📁 Project Structure

```plaintext
Blood_Cancer_Detection/
├── main.py                  # Flask API for ML
├── blood_detector.h5        # Blood image filter model
├── blood_cancer_model.keras # Cancer classification model
└── gp/                      # Laravel web app
    ├── app/Http/Controllers/
    ├── routes/web.php
    ├── resources/views/
    └── database/migrations/

## 🔌 How to Run Locally
1. Run the Flask Server

cd Blood_Cancer_Detection
pip install flask tensorflow pillow flask-cors
python main.py
This starts the Flask ML API at http://127.0.0.1:5000.

2. Run Laravel Web App

cd gp
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
Visit: http://localhost:8000

Make sure XAMPP is running Apache and MySQL, and the DB is created (blood_cancer_detection).

## 🔗 API Endpoints (Flask)
Method	Route	Description
GET	/api/healthcheck	Confirms model is loaded
POST	/api/predict	Accepts image and returns result

Example response:


{
  "success": true,
  "is_blood_image": true,
  "prediction": "Pre-B",
}
🛡 Error Handling
Condition	Behavior
No file uploaded	400 error with message
Invalid blood image	Informative JSON response
Model not loaded	500 internal error
Prediction fails	JSON error + traceback logged

## 🧪 Datasets Used
Blood Cancer Dataset (4 classes):

Early Pre-B, Pre-B, Pro-B, Benign

Train/Val/Test = 80/10/10%

Blood Filter Dataset (2 classes):

Blood Image, Not Blood Image

1328 images split 80/20

📸 Screenshots

Dashboard
![WhatsApp Image 2025-06-26 at 02 16 33_c8ea607b](https://github.com/user-attachments/assets/b070d561-ba3d-4bd6-be3c-94d551ed94bb)

Upload Form
![WhatsApp Image 2025-06-26 at 02 18 34_a07e0427](https://github.com/user-attachments/assets/5a2ffc6b-82f8-497e-af68-ff40a6a05a7d)

Diagnosis Result
![WhatsApp Image 2025-06-26 at 02 28 26_20b1212a](https://github.com/user-attachments/assets/81f2422d-eb54-41f5-9248-79ea4b905e26)

Patient Profile
![WhatsApp Image 2025-06-26 at 02 24 00_2046f8cf](https://github.com/user-attachments/assets/789a84e8-d941-48a0-a799-2af6f963f02b)

Doctor Profile
![WhatsApp Image 2025-06-26 at 02 22 50_d9b4fa6e](https://github.com/user-attachments/assets/38d86d22-da77-421c-9a24-189b65cac25b)

Contact Admin
![WhatsApp Image 2025-06-26 at 02 25 44_ce361e4e](https://github.com/user-attachments/assets/0f5d1a61-ab40-4dc0-8bda-fdfc6f4a1976)


## 👨‍💻 Authors
Mohamed Abdalghfar Mohamed – GitHub

Ramy Hany Attia Hanna

Mostafa Mohamed Wael Said

Mahmoud Atef Mohamed Mahmoud

Mina Ashraf Girges Danial

Khaled Mohamed Salah Ahmed

Supervised by:

Dr. Shaimaa Haridy

TA. Nagwa Mostafa
Faculty of Computers and Information, Ain Shams University

## 🔮 Future Enhancements
Real-time camera predictions

Integration with Electronic Health Records (EHR)

Admin dashboard and analytics

Automatic PDF generation for diagnoses











Ask ChatGPT
