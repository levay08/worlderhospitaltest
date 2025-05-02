CREATE DATABASE IF NOT EXISTS worlder_hospital;
USE worlder_hospital;

CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    record_file VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    title VARCHAR(10),
    specialty VARCHAR(100),
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    appointment_date DATE,
    appointment_time TIME,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

INSERT INTO doctors (name, specialty, title, email, password) VALUES
('Dr. John Cena', 'Cardiology', 'MD', 'jcena@whospital.com', 'doc123'),
('Dr. Tirta Cipeng', 'Neurology', 'MD', 'tcipeng@whospital.com', 'doc123'),
('Dr. Vanessa Wu', 'Pediatrics', 'MD', 'vwu@whospital.com', 'doc123');

INSERT INTO patients (name, email, password, record_file) VALUES
('John Doe', 'john@jimail.com', 'pass123', 'card1.jpg'),
('Jane Smith', 'jane@jimail.com', 'pass456', 'card2.jpg');
