CREATE DATABASE IF NOT EXISTS world_wide_travel_db;
USE world_wide_travel_db;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  username VARCHAR(50) NOT NULL PRIMARY KEY ,
  -- With php password_hash(), the PASSWORD_DEFAULT algorithm produces a 60-character hash,
  -- however 255 allows for future changes in the algorithm that may produce longer hashes.
  password_hash VARCHAR(255) NOT NULL ,
  user_role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
  );