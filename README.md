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
🔌 How to Run Locally
1. Run the Flask Server
bash
Copy
Edit
cd Blood_Cancer_Detection
pip install flask tensorflow pillow flask-cors
python main.py
This starts the Flask ML API at http://127.0.0.1:5000.

2. Run Laravel Web App
bash
Copy
Edit
cd gp
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
Visit: http://localhost:8000

Make sure XAMPP is running Apache and MySQL, and the DB is created (blood_cancer_detection).

🔗 API Endpoints (Flask)
Method	Route	Description
GET	/api/healthcheck	Confirms model is loaded
POST	/api/predict	Accepts image and returns result

Example response:

json
Copy
Edit
{
  "success": true,
  "is_blood_image": true,
  "prediction": "Pre-B",
  "confidence": 94.25
}
🛡 Error Handling
Condition	Behavior
No file uploaded	400 error with message
Invalid blood image	Informative JSON response
Model not loaded	500 internal error
Prediction fails	JSON error + traceback logged

🧪 Datasets Used
Blood Cancer Dataset (4 classes):

Early Pre-B, Pre-B, Pro-B, Benign

Train/Val/Test = 80/10/10%

Blood Filter Dataset (2 classes):

Blood Image, Not Blood Image

1328 images split 80/20

📸 Screenshots
Include screenshots here if desired:

Dashboard

Upload Form

Diagnosis Result

Patient Profile

Contact Admin

👨‍💻 Authors
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

🔮 Future Enhancements
Real-time camera predictions

Integration with Electronic Health Records (EHR)

Admin dashboard and analytics

Automatic PDF generation for diagnoses

📜 License
This project is licensed for educational and research purposes under the terms defined by the graduation committee of Ain Shams University. Contact authors for reuse permissions.

⭐ Star this repo if it helped you or inspired your project!

yaml
Copy
Edit

---

### ✅ To finalize:
- Replace `![System Architecture](...)` image path with your **GitHub-hosted diagram**.
- Add optional screenshots if you wish.
- Push the file as `README.md` to the root of your GitHub repository.

Let me know if you want me to generate that image URL for the architecture diagram or help write a `LICENSE.md`.








Ask ChatGPT
