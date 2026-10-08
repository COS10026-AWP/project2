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
                <?php
                require_once('settings.php');
                $db_conn = mysqli_connect($host, $user, $pwd, $sql_db);
                if (!$db_conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT reference_number, title FROM job_listings WHERE job_status = 'active' ORDER BY title ASC";
                $result = mysqli_query($db_conn, $query);
                if (!$result) {
                    echo "There are no jobs to display.";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<a href='#job-" . strtolower($row['reference_number']) . "'>" . $row['title'] . "</a>";
                    }
                }
                mysqli_close($db_conn);
                ?>
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

            $query = "SELECT * FROM job_listings WHERE job_status = 'active' ORDER BY title ASC";
            $result = mysqli_query($db_conn, $query);
            if (!$result) {
                echo "There are no jobs to display.";
            } else {
                function toListItems($text) {
                    $lines = json_decode($text, true);
                    $listItems = '';
                    foreach ($lines as $line) {
                        if (!empty(trim($line))) {
                            $listItems .= '<li>' . htmlspecialchars(trim($line)) . '</li>';
                        }
                    }
                    return $listItems;
                }
                function toSalary($min, $max) {
                    return '$' . number_format($min) . ' - $' . number_format($max);
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<section class='job-position' id='job-" . strtolower($row['reference_number']) . "'>";

                    echo "<div class='job-header'>";
                    echo "<h2 class='job-title'>" . $row['title'] . "</h2>";
                    echo "<p class='job-ref-id'>" . $row['reference_number'] . "</p>";
                    echo "</div>";

                    echo "<p class='job-desc'>" . $row['short_description'] . "</p>";

                    echo "<dl class='job-details'>";
                    echo "<div class='job-salary'> <dt>Salary</dt> <dd>" . toSalary($row['salary_min'], $row['salary_max']) . "</dd> </div>";
                    echo "<div class='job-rep-line'> <dt>Reports to</dt> <dd>" . $row['reporting_line'] . "</dd> </div>";
                    echo "</dl>";

                    echo "<section class='job-resp'> <h3>Key responsibilities</h3> <ul> " . toListItems($row['key_responsibilities']) . "</ul> </section>";
                    echo "<section class='job-req-ess'> <h3>Essential requirements</h3> <ol> " . toListItems($row['essential_requirements']) . "</ol> </section>";
                    echo "<section class='job-req-pref'> <h3>Preferable requirements</h3> <ol> " . toListItems($row['preferable_requirements']) . "</ol> </section>";

                    echo "</section>";
                }
            }
            mysqli_close($db_conn);
            ?>
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