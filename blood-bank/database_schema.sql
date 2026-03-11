-- Blood Bank Management System Database Schema
-- Created for Homa Bay County Teaching & Referral Hospital

USE hbctrh_bloodbank;

-- Donors table
CREATE TABLE IF NOT EXISTS donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-') NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    address TEXT,
    last_donation DATE,
    total_donations INT DEFAULT 0,
    status ENUM('Active', 'Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Blood inventory table
CREATE TABLE IF NOT EXISTS blood_inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-') NOT NULL UNIQUE,
    units_available INT DEFAULT 0,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Blood donations table
CREATE TABLE IF NOT EXISTS blood_donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_id INT NOT NULL,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-') NOT NULL,
    units_donated INT DEFAULT 1,
    donation_date DATE NOT NULL,
    hemoglobin_level DECIMAL(4,1),
    blood_pressure VARCHAR(20),
    weight DECIMAL(5,1),
    staff_id INT,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (donor_id) REFERENCES donors(id) ON DELETE CASCADE
);

-- Blood requests table
CREATE TABLE IF NOT EXISTS blood_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hospital_name VARCHAR(100) NOT NULL,
    department VARCHAR(100),
    patient_name VARCHAR(100),
    patient_age INT,
    patient_gender ENUM('Male', 'Female'),
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-') NOT NULL,
    units_required INT NOT NULL,
    urgency ENUM('Normal', 'Urgent', 'Critical') DEFAULT 'Normal',
    request_date DATE NOT NULL,
    required_date DATE,
    status ENUM('Pending', 'Approved', 'Rejected', 'Fulfilled') DEFAULT 'Pending',
    approved_by INT,
    fulfilled_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Staff table
CREATE TABLE IF NOT EXISTS staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Doctor', 'Nurse', 'Technician') NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    status ENUM('Active', 'Inactive') DEFAULT 'Active',
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Blood issue/transaction table
CREATE TABLE IF NOT EXISTS blood_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    request_id INT NOT NULL,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-') NOT NULL,
    units_issued INT NOT NULL,
    issue_date DATE NOT NULL,
    issued_by INT NOT NULL,
    received_by VARCHAR(100),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (request_id) REFERENCES blood_requests(id) ON DELETE CASCADE,
    FOREIGN KEY (issued_by) REFERENCES staff(id) ON DELETE RESTRICT
);

-- Insert default blood inventory records
INSERT IGNORE INTO blood_inventory (blood_group, units_available) VALUES
('A+', 0), ('A-', 0), ('B+', 0), ('B-', 0), ('O+', 0), ('O-', 0), ('AB+', 0), ('AB-', 0);

-- Insert default admin staff (password: admin123)
INSERT IGNORE INTO staff (full_name, username, password, role, email) VALUES
('System Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'admin@hbctrh.go.ke');

-- Create indexes for better performance
CREATE INDEX idx_donors_blood_group ON donors(blood_group);
CREATE INDEX idx_donors_status ON donors(status);
CREATE INDEX idx_donations_donor_id ON blood_donations(donor_id);
CREATE INDEX idx_donations_date ON blood_donations(donation_date);
CREATE INDEX idx_requests_status ON blood_requests(status);
CREATE INDEX idx_requests_blood_group ON blood_requests(blood_group);
CREATE INDEX idx_requests_date ON blood_requests(request_date);
CREATE INDEX idx_transactions_request_id ON blood_transactions(request_id);
CREATE INDEX idx_transactions_date ON blood_transactions(issue_date);
