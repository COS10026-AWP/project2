CREATE DATABASE world_wide_travel_db;
USE world_wide_travel_db;
CREATE TABLE job_listings (
  reference_number CHAR(6) NOT NULL PRIMARY KEY ,
  title VARCHAR(100) NOT NULL ,
  short_description TEXT ,
--   DECIMAL(12,2): $1,234,567,890.12
  salary_min DECIMAL(12,2) NOT NULL ,
  salary_max DECIMAL(12,2) NOT NULL ,
  reporting_line VARCHAR(200) ,
--   Simple arrays that do not need to be normalised
  key_responsibilities JSON ,
  essential_requirements JSON ,
  preferable_requirements JSON ,
  job_status VARCHAR(10) NOT NULL
  );