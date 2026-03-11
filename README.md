# 🩸 My 1st Blood Bank System

A **Blood Bank System** designed to manage the lifecycle of blood products — from donor registration and collection to testing, inventory, and distribution to hospitals and recipients.

This project provides a simple web‑based interface where users (donors, receivers, and admins) can interact with the system to submit requests, update records, and manage blood inventory.

---

## 🧠 Project Overview

Blood banks require an efficient platform to:

- Record blood donations in multiple blood groups
- Track inventory of blood bags
- Facilitate requests from hospitals and recipients
- Maintain secure donor and recipient records

This system aims to streamline these processes using a classic **PHP + MySQL + HTML/CSS** architecture.

---

## 🛠️ Features

> *List can be expanded based on your actual implemented functionality*

- 🧑‍💻 Donor registration and profile management  
- 🧍 Receiver registration and request submission  
- 🏥 Admin panel to view all donors/receivers  
- 🧪 Blood inventory overview by blood group  
- 🔄 Request handling (view, approve, reject)  
- 📊 Simple dashboards or listing pages

---

## 💻 Technologies & Stack

| Layer | Technology |
|-------|------------|
| Frontend | HTML, CSS |
| Backend | PHP |
| Database | MySQL |
| Environment | XAMPP / LAMP stack |

Languages used (according to repository stats): HTML, PHP, CSS. :contentReference[oaicite:1]{index=1}

---

## 🚀 Setup & Installation

Follow these steps to run the project locally:

1. **Clone the repository**
   ```bash
   git clone https://github.com/mikemwangi047-bit/my-1st-blood-bank-system.git
Install a local web server

Use XAMPP (Windows/Mac) or a similar LAMP stack.

Start Apache and MySQL modules.

Create MySQL database

Open phpMyAdmin (http://localhost/phpmyadmin)

Create a database called blood_bank (or any name you prefer)

Import database schema

Locate the .sql file (if available) under the blood-bank folder

Import it into your new database

Configure database connection

Edit the database config in your PHP files (e.g., in config.php or where applicable)

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'blood_bank';
Run the project

Open your browser and go to:

http://localhost/my-1st-blood-bank-system/
You should see the application homepage.

📁 Folder Structure
Typical structure (actual folders may vary):

/blood-bank
├── css/
├── images/
├── includes/
├── sql/
├── index.php
├── login.php
├── dashboard.php
├── donor.php
├── receiver.php
└── ...
🧪 How to Use
User Type	What You Can Do
Donor	Register, login, update profile
Receiver	Search blood availability, request blood
Admin	Manage donors/receivers, review requests, update inventory
Enhance this section based on your implemented pages and access controls.

🚧 Future Improvements
Here are some features you could add:

✨ User authentication & roles (secure login)

📩 Email notifications on blood requests

📊 Real‑time blood inventory dashboard

📁 REST API endpoints

🧪 Unit tests & validation

🙏 Credits
Created by Mike Mwangi — first major project exploring full stack web development involving database operations, CRUD, and dynamic web pages.

⭐ If you find this project useful, feel free to give it a star!

---

If you want, I can tailor this further based on **your actual file list and functionality** (e.g., specific pages, screenshots, real database schema). Just send the directory structure or list of main files.
::contentReference[oaicite:2]{index=2}
