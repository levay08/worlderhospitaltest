# Worlder Hospital - Vulnerable Healthcare Web App

This is a simple, intentionally vulnerable PHP web application simulating an online healthcare system. It allows patients to register and book appointments, and doctors to manage schedules and patients.

## Requirements

- PHP 7.3 or later
- MySQL 5.7+ or MariaDB
- Apache2 or any web server with PHP support
- Linux (Ubuntu recommended)

## Setup Instructions

1. Clone the repo into your web root directory  
   `git clone https://github.com/yourusername/worlder-hospital.git`

2. Create a MySQL database:  
   `mysql -u root -p < worlder_hospital.sql`

3. Make sure the uploads folder is writable:  
   `chmod -R 777 uploads/`

4. Update database credentials in `db.php` if needed.

5. Start Apache and MySQL, then open your browser:  
   `http://localhost/worlder-hospital` or your server IP

## Default Credentials

**Doctors**  
- Email: jcena@whospital.com  
- Password: doc123  

**Patients**  
- Email: john@jimail.com  
- Password: pass123  

This app is for educational/testing use only. Do not deploy to production without hardening.
