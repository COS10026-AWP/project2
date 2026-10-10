CREATE DATABASE world_wide_travel_db;
USE world_wide_travel_db;

DROP TABLE IF EXISTS job_listings;

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