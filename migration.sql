-- Create table for ticket status
CREATE TABLE ticket_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_code VARCHAR(10) NOT NULL,
    status VARCHAR(20) NOT NULL
);

-- Insert dummy data
INSERT INTO ticket_status (ticket_code, status) VALUES 
('LCS01AHB89', 'valid'),
('LCS02XYZ77', 'valid'),
('LCS03JKL12', 'redeemed');
