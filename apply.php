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
            color: #12343B
        }

        .skill-align {}
    </style>
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>

    <h1 style="text-align: center; color: #12343B; background-color: #E0F1F5; padding: 20px; margin: 0 20px;">
        Job Application Page</h1>

    <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">
        <fieldset>
            <p>
                <label for="reference">Job reference number</label> <input type="text" name="reference" id="reference"
                    pattern="[a-zA-Z0-9]{6}" title="Exactly 6 alphanumeric characters" required="required">
            </p>

            <fieldset>
                <legend>Personal information</legend>
                <p style="display: flex; align-items: center; gap:15px;">
                    <label for="first_name">First name</label> <input type="text" name="first_name" id="first_name"
                        pattern="[a-zA-Z]{1,20}" required="required">
                    <label for="surname">Last name</label> <input type="text" name="surname" id="surname"
                        pattern="[a-zA-Z]{1,20}" required="required">
                </p>
                <p>
                    <label for="dob"> Date of birth</label> <input type="text" name="dob" id="dob"
                        placeholder="dd/mm/yyyy" pattern="(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[12])\/(\d{4})"
                        maxlength="10" size="10" required="required">
                </p>
            </fieldset>

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

            <fieldset>
                <legend>Address and Contact information </legend>
                <p style="display: grid; grid-template-columns: auto 1fr auto 1fr; align-items:center; gap:10px">
                    <label for="address">Street address</label> <input type="text" name="address" id="address"
                        maxlength="40" required="required">

                    <label for="suburb">Suburb/Town</label> <input type="text" name="suburb" id="suburb" maxlength="40"
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

                    <label for="postcode">Postcode</label> <input type="text" name="postcode" id="postcode"
                        pattern="[0-9]{4}" required="required">

                    <label for="email">Email</label> <input type="email" name="email" id="email" required="required">
                    <label for="number">Phone number</label> <input type="tel" name="number" id="number"
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
                <p> <label for="skill-technology">At least one year experience with the technologies required for your
                        position</label>
                    <input type="checkbox" id="skill-technology" name="category[]" value="technology" required="required">
                </p>
                <p> <label for="skill-teamwork">Be able to effectively work in a team</label>
                    <input type="checkbox" id="skill-teamwork" name="category[]" value="teamwork" required="required">
                </p>
                <p> <label for="skill-industry-exp">Be familiar with the travel and tourism industry</label>
                    <input type="checkbox" id="skill-industry-exp" name="category[]" value="industry-exp" required="required">
                </p>
                <p> <label for="other">Other skills</label>
                    <textarea id="other" name="other" rows="4" cols="40"></textarea>
                </p>
            </fieldset>

            <p> <label for="other">Other skills</label>
                <textarea id="other" name="other" rows="4" cols="40"></textarea>
            </p>
        </fieldset>
        </fieldset>
        <input type="submit" value="Apply">
        <input type="reset" value="Reset">
    </form>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>

</html>