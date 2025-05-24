CREATE DATABASE IF NOT EXISTS otel;

USE otel;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    room_number INT,
    check_in DATE,
    check_out DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);