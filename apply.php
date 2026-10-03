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
            <!-- This is to make the forms stand out from the background-->
        <style>
            form {
                margin-left: 20px;
                margin-right: 20px;
            }
        form p {
                color:#12343B
            }
        </style>
    </head>
    <body>
        <header id="site-header">
            <?php include 'header.inc'; ?>
        </header>
        
        <h1 style=" text-align: center; color: #12343B; background-color: #E0F1F5; padding: 20px; margin-left: 20px; margin-right: 20px;">Job Application Page</h1>

        <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">
            <fieldset>
                <p>
                    <label for="reference">Job reference number</label> <input type="text" name="reference" id="reference" pattern="[a-zA-Z0-9]{6}" title="Exactly 6 alphanumeric characters" required="required">
                </p>

                <p style="display: flex; align-items: center; gap:15px;">
                    <label for="first_name">First name</label> <input type="text" name="first_name" id="first_name" pattern="[a-zA-Z]{1,20}" required="required">
                    <label for="surname">Last name</label> <input type="text" name="surname" id="surname" pattern="[a-zA-Z]{1,20}" required="required">
                </p>
                <p>
                    <label for="dob"> Date of birth</label> <input type="date" name="dob" id="dob" required="required">
                </p>

                <fieldset>
                    <legend>Gender</legend>
                    <p>
                        <label for="male">Male</label>    
                        <input type="radio" name="gender"
                        id="male" value="male">        
                        <label for="female">Female</label>    
                        <input type="radio" name="gender"
                        id="female" value="female">      
                    </p>  
                </fieldset>
                <p style="display: grid; grid-template-columns: auto 1fr auto 1fr; align-items:center; gap:10px">
                    <label for="address">Street address</label> <input type="text" name="address" id="address" pattern="{1,40}" required="required">
                    
                    <label for="suburb">Suburb/Town</label> <input type="text" name="suburb" id="suburb" pattern="{1,40}" required="required">
                    
                    <label for="state">State</label>
                    <select name="state" id="state">
                        <option value=" ">Please select</option>
                        <option value="vic">VIC</option>
                        <option value="nsw">NSW</option>
                        <option value="qld">QLD</option>
                        <option value="nt">NT</option>
                        <option value="wa">WA</option>
                        <option value="sa">SA</option>
                        <option value="tas">TAS</option>
                        <option value="act">ACT</option>
                    </select>
    
                    <label for="postcode">Postcode</label> <input type="text" name="postcode" id="postcode" pattern="[0-9]{4}" required="required">

                    <label for="email">Email</label> <input type ="email" name="email" id="email" required="required">
                    <label for="number">Phone number</label> <input type="tel" name="number" id="number" pattern="[0-9]{8,12}" required="required">
                </p>
                
                <fieldset>
                    <!--
                        Skills in skill list generated using ChatGPT (OpenAI) based on jobs.php, version GPT-5.6 Luna, Sep 2026.
                        All generated text was reviewed by the AI user before addition.
                        Skill list checkbox structure was added by the original author.
                    -->
                    <legend>Skill list</legend>
                    <p> <label for="skill-html">HTML5</label>
                        <input type="checkbox" id="skill-html" name="category[]" value="html">
                    </p>
                    <p> <label for="skill-css">CSS3</label>
                        <input type="checkbox" id="skill-css" name="category[]" value="css">
                    </p>
                    <p> <label for="skill-javascript">JavaScript</label>
                        <input type="checkbox" id="skill-javascript" name="category[]" value="javascript">
                    </p>
                    <p> <label for="skill-git">Git and GitHub</label>
                        <input type="checkbox" id="skill-git" name="category[]" value="git">
                    </p>
                    <p> <label for="skill-figma">Figma and Prototyping</label>
                        <input type="checkbox" id="skill-figma" name="category[]" value="figma">
                    </p>
                    <p> <label for="skill-resp-design">Responsive Web Design</label>
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
                    <p> <label for="skill-database">Database Management</label>
                        <input type="checkbox" id="skill-database" name="category[]" value="database">
                    </p>
                    <p> <label for="skill-data">Data Analysis</label>
                        <input type="checkbox" id="skill-data" name="category[]" value="data-analysis">
                    </p>
                    <p> <label for="skill-project">Project Management</label>
                        <input type="checkbox" id="skill-project" name="category[]" value="project-management">
                    </p>
                    <p> <label for="skill-agile">Agile Development</label>
                        <input type="checkbox" id="skill-agile" name="category[]" value="agile">
                    </p>
                    <p> <label for="skill-communication">Communication</label>
                        <input type="checkbox" id="skill-communication" name="category[]" value="communication">
                    </p>
                    <p> <label for="skill-teamwork">Teamwork and Collaboration</label>
                        <input type="checkbox" id="skill-teamwork" name="category[]" value="teamwork">
                    </p>
                    <p> <label for="skill-problem-solving">Problem Solving</label>
                        <input type="checkbox" id="skill-problem-solving" name="category[]" value="problem-solving">
                    </p>
                    <p> <label for="skill-tourism">Travel and Tourism Knowledge</label>
                        <input type="checkbox" id="skill-tourism" name="category[]" value="tourism">
                    </p>
                    <p> <label for="skill-booking">Online Booking Systems</label>
                        <input type="checkbox" id="skill-booking" name="category[]" value="booking-systems">
                    </p>
                    <p> <label for="other">Other skills</label>
                        <textarea id="other" name="other" rows="4" cols="40"></textarea>
                    </p>
                </fieldset>
            </fieldset>
            <input type= "submit" value="Apply">
        </form>

        <footer id="site-footer">
            <?php include 'footer.inc'; ?>
        </footer>
    </body>
</html> 