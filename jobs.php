<!DOCTYPE html>
<html lang="en">

<head>
    <title>Jobs</title>
    <meta charset="UTF-8">
    <meta name="author" content="Nathan Yan">
    <meta name="keywords" content="tourism, travel, jobs, employment, career">
    <meta name="description" content="Short & accurate description of the webpage.">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="styles/styles.css">

    <style>
        body:has(.job-highlight-ref:hover) .job-ref-id {
            /* Highlight on hover inspired by:
                https://stackoverflow.com/a/74816531
                Accessed: 07 Sep 2026 */
            color: var(--color-text-highlight);
            font-weight: bold;
            border: var(--jobs-card-border-highlight);
        }
    </style>
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>

    <main id="job-content">
        <aside id="job-sidebar">
            <nav id="job-available">
                <h2>Jobs available</h2>
                <a href="#job-fs2026">Full-stack Software Dev</a>
                <a href="#job-pm2026">Product Manager</a>
                <a href="#job-ux2026">UX/UI Designer</a>
            </nav>
            <section id="job-apply-note">
                <h2>Before you apply</h2>
                <p>
                    Review the position requirements and make sure you select the correct six-character
                    <span class="job-highlight-ref" style="font-weight: bold;">job reference number</span>.
                </p>
                <a href="apply.php" target="_blank">Start an application</a>
            </section>
            <nav id="jump-to-top">
                <a href="#top">Back to Top</a>
            </nav>
        </aside>
        <article id="job-listings">
            <h1>We're hiring!</h1>
            <!--
                    Job details and descriptions generated using ChatGPT (OpenAI), version GPT-5.6 Luna, Sep 2026.
                    All generated text was reviewed by the author before use.
                -->
            <?php
            // Include the database connection file
            require_once('settings.php');
            $db_conn = mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$db_conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM job_listings";
            $result = mysqli_query($db_conn, $query);
            if (!$result) {
                echo "There are no jobs to display.";
            } else {
                // Fetch and display job listings
            }
            mysqli_close($db_conn);
            ?>
            <section class="job-position" id="job-fs2026">
                <div class="job-header">
                    <h2 class="job-title">Full-Stack Software Developer</h2>
                    <p class="job-ref-id">FS2026</p>
                </div>
                <p class="job-desc">
                    Develop and maintain the web applications that power our destination guides,
                    tour bookings, accommodation services and personalised travel planning tools.
                    You will work across the frontend and backend to deliver reliable, scalable
                    experiences for travellers and tourism partners.
                </p>
                <dl class="job-details">
                    <div class="job-salary">
                        <dt>Salary</dt>
                        <dd>$90,000 - $115,000 + superannuation</dd>
                    </div>
                    <div class="job-rep-line">
                        <dt>Reports to</dt>
                        <dd>Engineering Team Lead</dd>
                    </div>
                </dl>
                <section class="job-resp">
                    <h3>Key responsibilities</h3>
                    <ul>
                        <li>Design, develop and maintain responsive web applications for travellers and tourism
                            businesses.</li>
                        <li>Build and integrate REST APIs for tours, accommodation, destination information and booking
                            services.</li>
                        <li>Develop reliable frontend interfaces using modern JavaScript frameworks and accessible
                            HTML/CSS.</li>
                        <li>Work with product designers and other developers to plan and implement new platform
                            features.</li>
                        <li>Identify and resolve software defects, performance issues and security vulnerabilities.</li>
                        <li>Participate in code reviews, automated testing and continuous integration processes.</li>
                    </ul>
                </section>
                <section class="job-req-ess">
                    <h3>Essential Requirements</h3>
                    <ol>
                        <li>Degree or equivalent experience in computer science, software engineering or a related
                            discipline.</li>
                        <li>At least two years of professional experience developing web applications.</li>
                        <li>Strong knowledge of HTML, CSS, JavaScript and at least one modern frontend or backend
                            framework.</li>
                        <li>Experience working with relational or document-based databases and REST APIs.</li>
                        <li>Good understanding of Git, software testing and collaborative development practices.</li>
                    </ol>
                </section>
                <section class="job-req-pref">
                    <h3>Preferable Requirements</h3>
                    <ol>
                        <li>Experience working with travel, tourism, e-commerce or online booking platforms.</li>
                        <li>Experience with cloud platforms such as AWS, Microsoft Azure or Google Cloud.</li>
                        <li>Knowledge of payment processing, booking systems or third-party travel APIs.</li>
                        <li>Experience developing applications with accessibility and internationalisation requirements.
                        </li>
                    </ol>
                </section>
            </section>

            <section class="job-position" id="job-pm2026">
                <div class="job-header">
                    <h2 class="job-title">Product Manager - Travel Experiences</h2>
                    <p class="job-ref-id">PM2026</p>
                </div>
                <p class="job-desc">
                    Lead the development of digital products that help travellers discover,
                    compare and book memorable experiences. You will work across technology,
                    design, marketing and tourism partnerships to turn customer needs into
                    useful and commercially successful platform features.
                </p>
                <dl class="job-details">
                    <div class="job-salary">
                        <dt>Salary</dt>
                        <dd>$105,000 - $130,000 + superannuation</dd>
                    </div>
                    <div class="job-rep-line">
                        <dt>Reports to</dt>
                        <dd>Head of Product</dd>
                    </div>
                </dl>
                <section class="job-resp">
                    <h3>Key responsibilities</h3>
                    <ul>
                        <li>Define and maintain the product roadmap for destination discovery and travel experience
                            features.</li>
                        <li>Research traveller behaviour, market trends and competitor products to identify
                            opportunities.</li>
                        <li>Work with engineers and designers to define product requirements, user stories and
                            acceptance criteria.</li>
                        <li>Prioritise the product backlog based on customer value, business objectives and technical
                            constraints.</li>
                        <li>Monitor product performance using customer feedback, analytics and key performance
                            indicators.</li>
                        <li>Coordinate product launches and communicate changes to internal teams and tourism partners.
                        </li>
                    </ul>
                </section>
                <section class="job-req-ess">
                    <h3>Essential Requirements</h3>
                    <ol>
                        <li>Three or more years of experience in product management, digital products or a related
                            technology role.</li>
                        <li>Demonstrated experience taking digital products or features from concept through to launch.
                        </li>
                        <li>Strong communication and stakeholder management skills.</li>
                        <li>Ability to analyse customer data and use evidence to make product decisions.</li>
                        <li>Experience working with Agile or similar product development methodologies.</li>
                    </ol>
                </section>
                <section class="job-req-pref">
                    <h3>Preferable Requirements</h3>
                    <ol>
                        <li>Previous experience in tourism, travel technology, hospitality or online marketplaces.</li>
                        <li>Experience with booking engines, accommodation platforms or travel distribution systems.
                        </li>
                        <li>Knowledge of personalisation, recommendation systems or artificial intelligence.</li>
                        <li>Experience working with international customers and tourism operators.</li>
                    </ol>
                </section>
            </section>

            <section class="job-position" id="job-ux2026">
                <div class="job-header">
                    <h2 class="job-title">UX/UI Designer - Travel Platforms</h2>
                    <p class="job-ref-id">UX2026</p>
                </div>
                <p class="job-desc">
                    Create intuitive and engaging digital experiences that make planning and
                    booking travel simple. You will design interfaces for destination discovery,
                    itinerary planning, tour bookings and accommodation services across desktop
                    and mobile platforms.
                </p>
                <dl class="job-details">
                    <div class="job-salary">
                        <dt>Salary</dt>
                        <dd>$85,000 - $105,000 + superannuation</dd>
                    </div>
                    <div class="job-rep-line">
                        <dt>Reports to</dt>
                        <dd>Design Lead</dd>
                    </div>
                </dl>
                <section class="job-resp">
                    <h3>Key responsibilities</h3>
                    <ul>
                        <li>Create user flows, wireframes, prototypes and high-fidelity interface designs for travel
                            products.</li>
                        <li>Conduct user research and usability testing to understand traveller needs and identify
                            design improvements.</li>
                        <li>Develop and maintain reusable components within the company's design system.</li>
                        <li>Collaborate with product managers and developers to ensure designs are practical and
                            technically achievable.</li>
                        <li>Design responsive experiences for desktop, tablet and mobile devices.</li>
                        <li>Use analytics and user feedback to continuously improve the customer journey from discovery
                            to booking.</li>
                    </ul>
                </section>
                <section class="job-req-ess">
                    <h3>Essential Requirements</h3>
                    <ol>
                        <li>Degree, diploma or equivalent professional experience in UX design, interaction design,
                            visual design or a related field.</li>
                        <li>Demonstrated experience designing digital products or responsive websites.</li>
                        <li>Proficiency with modern design and prototyping tools such as Figma.</li>
                        <li>Strong understanding of user-centred design, information architecture and usability
                            principles.</li>
                        <li>Ability to communicate design decisions clearly and collaborate effectively with developers
                            and stakeholders.</li>
                    </ol>
                </section>
                <section class="job-req-pref">
                    <h3>Preferable Requirements</h3>
                    <ol>
                        <li>Experience designing products in the travel, tourism, hospitality or e-commerce industries.
                        </li>
                        <li>Experience designing booking, checkout or payment experiences.</li>
                        <li>Knowledge of web accessibility standards and inclusive design practices.</li>
                        <li>Experience working with a formal design system or component library.</li>
                    </ol>
                </section>
            </section>
        </article>
        <section class="job-signup">
            <h2>Looking for more?</h2>
            <p>Sign up to receive email notifications when new positions are posted.</p>
            <form action="http://mercury.swin.edu.au/it000000/formtest.php" method="post">
                <label for="signup-email">Email address:</label>
                <input type="email" id="signup-email" name="signup-email" required>
                <button type="submit">Sign up</button>
            </form>
        </section>
    </main>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>

</html>