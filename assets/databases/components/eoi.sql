CREATE DATABASE IF NOT EXISTS world_wide_travel_db;
USE world_wide_travel_db;

DROP TABLE IF EXISTS eoi;

CREATE TABLE eoi (
  EOInumber INT AUTO_INCREMENT PRIMARY KEY,
  reference VARCHAR(6),
  first_name VARCHAR(20),
  surname VARCHAR(20),
  dob VARCHAR(10),
  gender VARCHAR(10),
  street VARCHAR(40),
  suburb VARCHAR(40),
  state VARCHAR(3),
  postcode VARCHAR(4),
  email VARCHAR(100),
  phone VARCHAR(12),
  skills TEXT,
  other TEXT,
  status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);