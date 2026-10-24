<!DOCTYPE html>
<html lang="en">

<head>
    <title>Job Application</title>
    <meta charset="UTF-8">
    <meta name="author" content="Anastasia Tiffany">
    <meta name="keywords" content="Job, application,contact ">
    <meta name="description" content="A job application form for WWT.">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/styles.css">
    
    <style>
        .apply-page h1 {
            margin-top: 15px;
            margin-bottom: 25px;
            display: flex;   
            justify-content: center;
            color: #12343B;
        }

        .apply-forms legend {
            font-weight: bold;
        }

        /* buttons made by Harper */
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 1em;
            font-weight: bold;
            color: white;
            background-color: #12343B;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .apply-page .button:hover {
            background-color: #F9C74F;
            color: black;
        }
    </style>
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>
    <section class="apply-page">
        <h1>Job Application Page</h1>

        <form method="post" action="process_eoi.php" novalidate>
            <fieldset class="apply-forms">
                <p>
                    <label for="reference">Job reference number</label>
                    <input type="text" name="reference" id="reference"
                    <label for="reference">Job reference number</label>
                    <input type="text" name="reference" id="reference"
                        pattern="[a-zA-Z0-9]{6}" title="Exactly 6 alphanumeric characters" required="required">
                </p>

                <fieldset>
                    <legend>Personal information</legend>
                    <p class="personal-info">
                        <label for="first_name">First name</label> 
                        <input type="text" name="first_name" id="first_name"
                            pattern="[a-zA-Z]{1,20}" required="required">
                        <label for="surname">Last name</label> 
                        <input type="text" name="surname" id="surname"
                            pattern="[a-zA-Z]{1,20}" required="required">
                    </p>
                    <p>
                        <label for="dob"> Date of birth</label> 
                        <input type="text" name= "dob" id="dob" 
                        placeholder="dd/mm/yyyy" 
                        pattern="(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[12])\/(\d{4})" 
                        maxlength="10" size="10" required="required">
                        <input type="text" name= "dob" id="dob" 
                        placeholder="dd/mm/yyyy" 
                        pattern="(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[12])\/(\d{4})" 
                        maxlength="10" size="10" required="required">
                    </p>

                <fieldset style="display: flex; align-items: center; gap:15px;">
                    <legend>Gender</legend>
                    <p>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="male" value="male" required="required">
                    </p>
                    <p>
                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="female" value="female">
                    </p>
                </fieldset>

            </fieldset>

            <fieldset>
                <legend>Address and Contact details</legend>
                <p style="display: grid; grid-template-columns: auto 1fr auto 1fr; align-items:center; gap:10px">
                    <label for="street">Street address</label> 
                    <input type="text" name="street" id="street"
                        maxlength="40" required="required">

                        <label for="suburb">Suburb/Town</label> 
                        <input type="text" name="suburb" id="suburb" maxlength="40"
                            required="required">

                        <label for="state">State</label>
                        <select name="state" id="state" required="required">
                            <option value="">Please select</option>
                            <option value="vic">VIC</option>
                            <option value="nsw">NSW</option>
                            <option value="qld">QLD</option>
                            <option value="nt">NT</option>
                            <option value="wa">WA</option>
                            <option value="sa">SA</option>
                            <option value="tas">TAS</option>
                            <option value="act">ACT</option>
                        </select>

                        <label for="postcode">Postcode</label> 
                        <input type="text" name="postcode" id="postcode"
                        <label for="postcode">Postcode</label> 
                        <input type="text" name="postcode" id="postcode"
                            pattern="[0-9]{4}" required="required">

                        <label for="email">Email</label> 
                        <input type="email" name="email" id="email" required="required">
                        <label for="phone">Phone number</label> <input type="tel" name="phone" id="phone"
                            pattern="[0-9]{8,12}" required="required">
                    </p>
                </fieldset>


                <fieldset>
                    <!--
                            Skills generated using ChatGPT (OpenAI) based on jobs.php, version GPT-5.6 Luna, Sep 2026.
                            All generated text was reviewed by the AI user before addition.
                            Skill list checkbox structure was added by the original author.
                        -->
                    <legend>Skill list</legend>
                    <fieldset style="display: flex; align-items: center; gap:15px;">
                        <legend>Programming languages</legend>
                        <p> <label for="skill-html">HTML5</label>
                            <input type="checkbox" id="skill-html" name="category[]" value="html">
                        </p>
                        <p> <label for="skill-css">CSS3</label>
                            <input type="checkbox" id="skill-css" name="category[]" value="css">
                        </p>
                        <p> <label for="skill-javascript">JavaScript</label>
                            <input type="checkbox" id="skill-javascript" name="category[]" value="javascript">
                        </p>
                    </fieldset>

                    <fieldset class="skill-lists">
                        <legend>Technical and Design Skills</legend>
                        <p> <label for="skill-git">Git and GitHub</label>
                            <input type="checkbox" id="skill-git" name="category[]" value="git">
                        </p>
                        <p> <label for="skill-figma">Figma and Prototyping</label>
                            <input type="checkbox" id="skill-figma" name="category[]" value="figma">
                        </p>
                        <p> <label for="skill-resp-design">
                            Responsive Web Design and Web Accessibility</label>
                            <input type="checkbox" id="skill-resp-design" name="category[]" value="responsive-design">
                        </p>
                        <p> <label for="skill-accessibility">Web Accessibility</label>
                            <input type="checkbox" id="skill-accessibility" name="category[]" value="accessibility">
                        </p>
                        <p> <label for="skill-ux">UX/UI Design</label>
                            <input type="checkbox" id="skill-ux" name="category[]" value="ux-ui">
                        </p>
                        <p> <label for="skill-user-research">User Research</label>
                            <input type="checkbox" id="skill-user-research" name="category[]" value="user-research">
                        </p>
                        <p> <label for="skill-api">API Development and Integration</label>
                            <input type="checkbox" id="skill-api" name="category[]" value="api">
                        </p>
                        <p> <label for="skill-database-data-analysis">
                            Database Management and Data Analysis</label>
                            <input type="checkbox" id="skill-database-data-analysis" 
                            name="category[]" value="database-data">
                        </p>
                    </fieldset>
                    
                    <fieldset class="skill-lists">
                        <legend>Professional Skills</legend>
                        <p> <label for="skill-project">Project Management</label>
                            <input type="checkbox" id="skill-project" 
                            name="category[]" value="project-management">
                        </p>
                        <p> <label for="skill-agile">Agile Development</label>
                            <input type="checkbox" id="skill-agile" name="category[]" value="agile">
                        </p>
                        <p> <label for="skill-teamwork">Teamwork and Collaboration</label>
                        <input type="checkbox" id="skill-teamwork" name="category[]" value="teamwork">
                        </p>
                        <p> <label for="skill-problem-solving">Problem Solving</label>
                        <input type="checkbox" id="skill-problem-solving" name="category[]" value="problem-solving">
                        </p>
                    </fieldset>

                    <fieldset class="skill-lists">
                        <legend>Tourism skills</legend>
                        <p> <label for="skill-tourism">Travel and Tourism Knowledge</label>
                            <input type="checkbox" id="skill-tourism" name="category[]" value="tourism">
                        </p>
                        <p> <label for="skill-booking">Online Booking Systems</label>
                            <input type="checkbox" id="skill-booking" name="category[]" value="booking-systems">
                        </p>
                    </fieldset>

                    <p> <label for="other">Other skills</label>
                        <textarea id="other" name="other" rows="4" cols="40"></textarea>
                    </p>
                </fieldset>
            </fieldset>
            <input type="submit" value="Apply" class="button">
            <input type= "reset" value="Reset" class="button">
        </form>
    </section>
    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>

</html>