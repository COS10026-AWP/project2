CREATE DATABASE IF NOT EXISTS world_wide_travel_db;
USE world_wide_travel_db;

DROP TABLE IF EXISTS about;
DROP TABLE IF EXISTS facts;

CREATE TABLE facts (
    student_id VARCHAR(10) NOT NULL PRIMARY KEY,
    fact TEXT NOT NULL
);

CREATE TABLE about (
  student_id VARCHAR(10) NOT NULL PRIMARY KEY,
  contribution TEXT NOT NULL,
  quote_english TEXT NOT NULL,
  quote_native TEXT NOT NULL,
  fact TEXT NOT NULL,
  FOREIGN KEY (student_id) REFERENCES facts(student_id)
);
