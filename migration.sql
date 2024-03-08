-- migration.sql

CREATE DATABASE IF NOT EXISTS tickets;

USE tickets;

CREATE TABLE IF NOT EXISTS tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    ticket_code VARCHAR(10) UNIQUE,
    status ENUM('available', 'claimed') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Dummy Data
INSERT INTO tickets (event_id, ticket_code, status) VALUES 
(1, 'LCS01ABC123', 'available'),
(1, 'LCS01DEF456', 'claimed'),
(2, 'LCS02GHI789', 'available'),
(2, 'LCS02JKL012', 'available');
