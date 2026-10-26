CREATE DATABASE IF NOT EXISTS world_wide_travel_db;
USE world_wide_travel_db;

DROP TABLE IF EXISTS about;
DROP TABLE IF EXISTS facts;

CREATE TABLE facts (
    student_id VARCHAR(10) NOT NULL PRIMARY KEY,
    fact TEXT NOT NULL
) CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

CREATE TABLE about (
  student_id VARCHAR(10) NOT NULL PRIMARY KEY,
  contribution TEXT NOT NULL,
  quote_english TEXT NOT NULL,
  quote_native TEXT NOT NULL,
  fact TEXT NOT NULL,
  FOREIGN KEY (student_id) REFERENCES facts(student_id)
) CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

INSERT INTO facts (student_id, fact) VALUES
('106565482', 'Used to dream of becoming a ski instructor to travel the world, but never found the time to stack up enough experience. Runs around in circles for eight hours a week, and spends around the same time doing flashcards (both as hobbies).'),
('106696764', 'Nearly drown as a kid. Had 8 stiches on her foot as a kid.'),
('105996858', 'Can recognize 85% of Asian countries by their flags most of the times. Have a Spotify playlist that is over 75 hours.'),
('106379243', 'Have ungodly skills to play rhythm games, along with a neverending hyperfixation on them. Have met multiple popular celebrities in person and had their autographs.');

INSERT INTO about (student_id, contribution, quote_english, quote_native, fact) VALUES
('106565482',
 'Co-leader, responsible for the job info page.',
 'Study hard and make progress every day.',
 N'好好学习，天天向上',
 'Used to dream of becoming a ski instructor to travel the world, but never found the time to stack up enough experience. Runs around in circles for eight hours a week, and spends around the same time doing flashcards (both as hobbies).'),
('106696764',
 'Leader in project planning, responsible for HTML, CSS, and the home page.',
 'The future changes from moment to moment. Therefore, instead of worrying about what lies ahead, it is better to focus on the present.',
 N'Tương lai thay đổi từng khoảnh khắc. Vậy nên, thay vì phiền não bởi những điều phía trước, tốt hơn là nên cố gắng cho hiện tại.',
 'Nearly drown as a kid. Had 8 stiches on her foot as a kid.'),
('105996858',
 'Responsible for the job application page.',
 'Life is a road, don''t know what''s along the way',
 N'Hidup adalah jalan, tak tahu apa yang ada di sepanjang jalan.',
 'Can recognize 85% of Asian countries by their flags most of the times. Have a Spotify playlist that is over 75 hours.'),
('106379243',
 'Responsible for the about page.',
 'There''s no such thing as being lazy, we''re simply just focus on something else other than what we''re doing.',
 N'Chúng ta không có gì là lười biếng cả, chỉ là chúng ta đang dành thời gian cho việc khác thay vì việc chúng ta đang làm mà thôi.',
 'Have ungodly skills to play rhythm games, along with a neverending hyperfixation on them. Have met multiple popular celebrities in person and had their autographs.');
 