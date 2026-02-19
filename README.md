
🚀 REST API in PHP (User Authentication System)

A simple REST API built using Core PHP & MySQL for user management.

This project includes:

Create User

Login User

Get User Details

JSON Responses

Prepared Statements (Secure Queries)

📌 Tech Stack

PHP (Core PHP)

MySQL

XAMPP

Postman (for API testing)

Git & GitHub

📂 Project Structure
RESTAPI_PHP/
│
├── api.php
├── db.php
└── README.md
⚙️ Setup Instructions
1️⃣ Clone Repository
git clone https://github.com/harshgavandit/RESTAPI_PHP.git

Move the folder inside:

C:\xampp\htdocs\
2️⃣ Create Database

Open phpMyAdmin and create database:

api_php

Create table:

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100)
);
3️⃣ Start XAMPP

Start Apache

Start MySQL

🔥 API Endpoints
✅ Create User

POST

http://localhost/RESTAPI_PHP/api.php

Body (x-www-form-urlencoded):

action = create-user
name = Harsh
email = harsh@gmail.com
password = 123456
✅ Login User

POST

http://localhost/RESTAPI_PHP/api.php

Body:

action = login-user
email = harsh@gmail.com
password = 123456
✅ Get User Details

POST

http://localhost/RESTAPI_PHP/api.php

Body:

action = get-user-details
user_id = 1
📤 Sample JSON Response
{
  "error": false,
  "message": "User logged in Successfully",
  "data": {
    "id": "1",
    "name": "Harsh",
    "email": "harsh@gmail.com"
  }
}
🔐 Security Features

Uses Prepared Statements

Input Validation

JSON Response Format

Error Handling

🧠 What I Learned

REST API structure

Handling GET & POST

MySQL Prepared Statements

API Testing using Postman

Git Version Control

📌 Future Improvements

Password Hashing (bcrypt)

JWT Authentication

Token-based Authorization

API Versioning

MVC Structure

👨‍💻 Author

Harsh Gavand
B.Tech IT Student
Learning Backend Development 🚀

💡 Pro Tip

After adding README:

git add README.md
git commit -m "Added README file"
git push
