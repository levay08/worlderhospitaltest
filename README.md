# Worlder Hospital - Vulnerable Healthcare Web App

This is a simple, intentionally vulnerable PHP web application simulating an online healthcare system. It allows patients to register and book appointments, and doctors to manage schedules and patients. Built for security testing exercises.

## Requirements

- PHP 7.3 or later
- MySQL 5.7+ or MariaDB
- Apache2 or any PHP-compatible web server
- Linux (Ubuntu recommended) or Docker

## Setup Instructions (Manual)

1. Clone the repo into your web root  
   `git clone https://github.com/yourusername/worlder-hospital.git`

2. Import the database  
   `mysql -u root -p < worlder_hospital.sql`

3. Make uploads writable  
   `chmod -R 777 uploads/`

4. Update credentials in `db.php` if needed

5. Start Apache and MySQL, then visit  
   `http://localhost/worlder-hospital` or your server IP

## Docker Setup

1. Clone this repo  
   `git clone https://github.com/yourusername/worlder-hospital.git`

2. Run with Docker Compose  
   `docker-compose up --build`

3. Visit  
   `http://localhost:8080`

MySQL root password: `rootpass`  
Database name: `worlder_hospital`

## Default Credentials

**Doctors**  
Email: jcena@whospital.com  
Password: doc123  

**Patients**  
Email: john@jimail.com  
Password: pass123  

## Live Demo

To try the live version, go to:  
`http://13.214.147.130/worlder`

> Note: This is an intentionally vulnerable application. Do not use in production. Use it only in isolated or lab environments.
