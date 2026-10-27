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

CREATE DATABASE IF NOT EXISTS world_wide_travel_db;
USE world_wide_travel_db;

DROP TABLE IF EXISTS job_listings;

CREATE TABLE job_listings (
  reference_number CHAR(6) NOT NULL PRIMARY KEY ,
  title VARCHAR(100) NOT NULL ,
  short_description TEXT NOT NULL,
--   DECIMAL(12,2): $1,234,567,890.12
  salary_min DECIMAL(12,2) NOT NULL ,
  salary_max DECIMAL(12,2) NOT NULL ,
  reporting_line VARCHAR(200) ,
--   Simple arrays that do not need to be normalised
  key_responsibilities JSON NOT NULL ,
  essential_requirements JSON NOT NULL ,
  preferable_requirements JSON NOT NULL,
  job_status VARCHAR(10) NOT NULL
  );

-- Job details and descriptions generated using ChatGPT (OpenAI), version GPT-5.6 Luna, Sep 2026.
-- All generated text was reviewed by the author before use.
INSERT INTO job_listings (reference_number, title, short_description, salary_min, salary_max, reporting_line, key_responsibilities, essential_requirements, preferable_requirements, job_status) VALUES
('FS2026',
 'Full-Stack Software Developer',
 'Develop and maintain the web applications that power our destination guides, tour bookings, accommodation services and personalised travel planning tools. You will work across the frontend and backend to deliver reliable, scalable experiences for travellers and tourism partners.',
 90000.00,
 115000.00,
 'Engineering Team Lead',
 '["Design, develop and maintain responsive web applications for travellers and tourism businesses.", "Build and integrate REST APIs for tours, accommodation, destination information and booking services.", "Develop reliable frontend interfaces using modern JavaScript frameworks and accessible HTML/CSS.", "Work with product designers and other developers to plan and implement new platform features.", "Identify and resolve software defects, performance issues and security vulnerabilities.", "Participate in code reviews, automated testing and continuous integration processes."]',
 '["Degree or equivalent experience in computer science, software engineering or a related discipline.", "At least two years of professional experience developing web applications.", "Strong knowledge of HTML, CSS, JavaScript and at least one modern frontend or backend framework.", "Experience working with relational or document-based databases and REST APIs.", "Good understanding of Git, software testing and collaborative development practices."]',
 '["Experience working with travel, tourism, e-commerce or online booking platforms.", "Experience with cloud platforms such as AWS, Microsoft Azure or Google Cloud.", "Knowledge of payment processing, booking systems or third-party travel APIs.", "Experience developing applications with accessibility and internationalisation requirements."]',
 'active'),
('PM2026',
 'Product Manager - Travel Experiences',
 'Lead the development of digital products that help travellers discover, compare and book memorable experiences. You will work across technology, design, marketing and tourism partnerships to turn customer needs into useful and commercially successful platform features.',
 105000.00,
 130000.00,
 'Head of Product',
 '["Define and maintain the product roadmap for destination discovery and travel experience features.", "Research traveller behaviour, market trends and competitor products to identify opportunities.", "Work with engineers and designers to define product requirements, user stories and acceptance criteria.", "Prioritise the product backlog based on customer value, business objectives and technical constraints.", "Monitor product performance using customer feedback, analytics and key performance indicators.", "Coordinate product launches and communicate changes to internal teams and tourism partners."]',
 '["Three or more years of experience in product management, digital products or a related technology role.", "Demonstrated experience taking digital products or features from concept through to launch.", "Strong communication and stakeholder management skills.", "Ability to analyse customer data and use evidence to make product decisions.", "Experience working with Agile or similar product development methodologies."]',
 '["Previous experience in tourism, travel technology, hospitality or online marketplaces.", "Experience with booking engines, accommodation platforms or travel distribution systems.", "Knowledge of personalisation, recommendation systems or artificial intelligence.", "Experience working with international customers and tourism operators."]',
 'active'),
('UX2026',
 'UX/UI Designer - Travel Platforms',
 'Create intuitive and engaging digital experiences that make planning and booking travel simple. You will design interfaces for destination discovery, itinerary planning, tour bookings and accommodation services across desktop and mobile platforms.',
 85000.00,
 105000.00,
 'Design Lead',
 '["Create user flows, wireframes, prototypes and high-fidelity interface designs for travel products.", "Conduct user research and usability testing to understand traveller needs and identify design improvements.", "Develop and maintain reusable components within the company''s design system.", "Collaborate with product managers and developers to ensure designs are practical and technically achievable.", "Design responsive experiences for desktop, tablet and mobile devices.", "Use analytics and user feedback to continuously improve the customer journey from discovery to booking."]',
 '["Degree, diploma or equivalent professional experience in UX design, interaction design, visual design or a related field.", "Demonstrated experience designing digital products or responsive websites.", "Proficiency with modern design and prototyping tools such as Figma.", "Strong understanding of user-centred design, information architecture and usability principles.", "Ability to communicate design decisions clearly and collaborate effectively with developers and stakeholders."]',
 '["Experience designing products in the travel, tourism, hospitality or e-commerce industries.", "Experience designing booking, checkout or payment experiences.", "Knowledge of web accessibility standards and inclusive design practices.", "Experience working with a formal design system or component library."]',
 'active');

 CREATE DATABASE IF NOT EXISTS world_wide_travel_db;
USE world_wide_travel_db;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  username VARCHAR(50) NOT NULL PRIMARY KEY ,
  -- With php password_hash(), the PASSWORD_DEFAULT algorithm produces a 60-character hash,
  -- however 255 allows for future changes in the algorithm that may produce longer hashes.
  password_hash VARCHAR(255) NOT NULL ,
  user_role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
  );

INSERT INTO users (username, password_hash, user_role) VALUES
  ('admin', '$2a$12$/gi4vNftyma4L855cGIUqOK5U791ste5VfK8u0PAotkVu6WRunJkK', 'admin');

--about page for facts and quotes
CREATE DATABASE IF NOT EXISTS world_wide_travel_db;
USE world_wide_travel_db;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS facts;
DROP TABLE IF EXISTS about;
DROP TABLE IF EXISTS contributions;

CREATE TABLE contributions (
    contribution_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id      VARCHAR(10) NOT NULL,
    name            VARCHAR(50) NOT NULL,
    description     VARCHAR(255) NOT NULL,
    member_order    INT NOT NULL DEFAULT 0,
    item_order      INT NOT NULL DEFAULT 0
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE about (
    student_id     VARCHAR(10) NOT NULL PRIMARY KEY,
    name           VARCHAR(50) NOT NULL,
    quote_native   TEXT NOT NULL,
    quote_english  TEXT NOT NULL,
    quote_language VARCHAR(30) NOT NULL
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE facts (
    fact_id    INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(10) NOT NULL,
    fact       TEXT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES about(student_id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO contributions (student_id, name, description, member_order, item_order) VALUES
('106696764', 'Harper',  'Leader in project planning, responsible for HTML, CSS, and the home page.', 1, 1),
('106696764', 'Harper',  'Created the manage page (manage.php).', 1, 2),
('106696764', 'Harper',  'Added a dynamic menu for mobile.', 1, 3),
('106696764', 'Harper',  'Wrote the CSS for the manage page.', 1, 4),
('106565482', 'Nathan',  'Co-leader, responsible for the job info page.', 2, 1),
('106565482', 'Nathan',  'Created the login page (login.php).', 2, 2),
('106565482', 'Nathan',  'Created the search page (search.php).', 2, 3),
('106565482', 'Nathan',  'Created the settings file (settings.php).', 2, 4),
('106565482', 'Nathan',  'Wrote the CSS for the login, search and about pages.', 2, 5),
('105996858', 'Tiffany', 'Responsible for the job application page.', 3, 1),
('105996858', 'Tiffany', 'Created the process EOI page (process_eoi.php).', 3, 2),
('105996858', 'Tiffany', 'Wrote the CSS for the apply and process EOI pages.', 3, 3),
('106379243', 'Khoi',    'Responsible for the about page and its CSS.', 4, 1);

INSERT INTO about (student_id, name, quote_native, quote_english, quote_language) VALUES
('106696764', 'Harper',
 'Tương lai thay đổi từng khoảnh khắc. Vậy nên, thay vì phiền não bởi những điều phía trước, tốt hơn là nên cố gắng cho hiện tại.',
 'The future changes from moment to moment. Therefore, instead of worrying about what lies ahead, it is better to focus on the present.', 'Vietnamese'),
('106565482', 'Nathan',
'好好学习，天天向上',
 'Study hard and make progress every day.', 'Mandarin'),
('105996858', 'Tiffany',
 'Hidup adalah jalan, tak tahu apa yang ada di sepanjang jalan.',
 'Life is a road, don''t know what''s along the way', 'Indonesian'),
('106379243', 'Khoi',
 'Chúng ta không có gì là lười biếng cả, chỉ là chúng ta đang dành thời gian cho việc khác thay vì việc chúng ta đang làm mà thôi.',
 'There''s no such thing as being lazy, we''re simply just focus on something else other than what we''re doing.', 'Vietnamese');

INSERT INTO facts (student_id, fact) VALUES
('106565482', 'Used to dream of becoming a ski instructor to travel the world, but never found the time to stack up enough experience'),
('106565482', 'Runs around in circles for eight hours a week, and spends around the same time doing flashcards (both as hobbies)'),
('106696764', 'Nearly drowned as a kid'),
('106696764', 'Had 8 stitches on her foot as a kid'),
('105996858', 'Can recognize 85% of Asian countries by their flags most of the times'),
('105996858', 'Have a Spotify playlist that is over 75 hours'),
('106379243', 'Have ungodly skills to play rhythm games, along with a neverending hyperfixation on them'),
('106379243', 'Have met multiple popular celebrities in person and had their autographs');

CREATE TABLE `image_section` (
  `img_index` int(11) NOT NULL,
  `img_location` text NOT NULL,
  `img_alt_description` text NOT NULL,
  `img_title` text NOT NULL,
  `img_figcaption` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `image_section` (`img_index`, `img_location`, `img_alt_description`, `img_title`, `img_figcaption`, `width`, `height`) VALUES
(1, 'images/group.png', 'A picture of us!', 'Group Photo', 'From left to right: Harper, Nathan, Khoi, Tiffany', 1200, 900);