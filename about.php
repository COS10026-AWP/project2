<?php 
$config = require 'settings.php';
$dbconn = mysqli_connect($config['host'], $config['user'], $config['pwd'], $config['sql_db']);

if (!$dbconn) {
    die("Error: Could not fetch data from database!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    <meta charset="UTF-8">
    <meta name="author" content="Nguyen Son Khoi">
    <meta name="keywords" content="HTML, about_page, team_members">
    <meta name="description" content="The introduction page to the members behind the webpage.">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/styles.css">
    <style>
        h1 {
            color: #12343B;
            text-align: center;
            font-size: 30px;
        }

        h2 {
            color: #12343B;
            font-size: 23px;
        }

        dt { font-size: 18px; }

        dd { font-size: 15px; }

        .student-id {
            color: #12343B;
            font-weight: bold;
            display: inline-block;
        }

        .student-id:hover {
            background-color: #12343B;
            color: white;
        }

        table { 
            border-collapse: collapse;
            color: #12343B;
        }

        th {
            text-align: center;
            background-color: #12343B;
            color: white;
        }

        td:hover { background-color: #e0f1f5; }

        caption { font-size: 20px; }

        .travel-tips { border-left: 4px solid #12343B ;}

        .heading-background {
            display: inline-block;
            color: #12343B;
            background: #e0f1f5;
            padding: 5px 25px;
            border-radius: 20px;
        }

        .heading-background:hover {
            color: #ffffff;
            background: #12343B;
        }

        .image-style {
            width: 4000px;
            max-width: 80%;
            margin: 30px auto;
            padding: 15px;
            background-color: #e0f1f5;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgb(0 0 0 / 8%);
            text-align: center;
            box-sizing: border-box;
        }

        .image-style img {
            border-radius: 12px;
            display: block;
            margin: 0 auto;
            width: 90%;
            height: 90%; 
        }

        .image-style figcaption {
            color: #12343B;
        }
    </style>
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>

    <h1>About Us</h1>

    <h2 class="heading-background">The Group</h2>
    
    <ul>
        <?php
            $result_group = mysqli_query($dbconn, "SELECT * FROM group_section LIMIT 1");
            if ($result_group) {
                while ($row = mysqli_fetch_assoc($result_group)) {
                    echo "<li> Group name: " . $row['group_name'] . " (Code: " . $row['group_code'] . ")</li>";
                    echo "<li> Course: " . $row['course'] . "</li>";
                    echo "<li> Schedule: " .$row['schedule'] . "</li>";
                    echo "<li> Tutor: " .$row['tutor'] . "</li>";
                }
            } else echo "Error: Could not fetch data from database!";
        ?>
    </ul>

    <h2 class="heading-background">Our Contributions</h2>
    
    <?php
        $result_contribution = mysqli_query($dbconn, "SELECT * FROM contribution_section ORDER BY contribution_index");

        if ($result_contribution) {
            $contributions = [];

            while ($contribution = mysqli_fetch_assoc($result_contribution)) {
                $contributions[] = $contribution;
            }

            foreach ($contributions as $contribution) {
                echo "<dl class=\"travel-tips\">";
                echo "<dt>" . $contribution['name'] . " <p class=\"student-id\">(" . $contribution['student_id'] . ")</p></dt>";
                echo "<dd>" . $contribution['contribution_1'] . "</dd>";
                echo "<dd>" . $contribution['contribution_2'] . "</dd>";
                echo "</dl>";
            }
        } else echo "Error: Could not fetch data from database!";
    ?>

    <h2 class="heading-background">Our Favorite Quotes!</h2>
    
    <?php
        $result_quote = mysqli_query($dbconn, "SELECT * FROM quote_section ORDER BY quote_index");
        if($result_quote) {
            $quotes = [];

            while ($quote = mysqli_fetch_assoc($result_quote)) {
                $quotes[] = $quote;
            }

            foreach ($quotes as $quote) {
                echo "<dl class=\"travel-tips\">";
                echo "<dt>" . $quote['name'] . ": " . $quote['quote'] . "</dt>";
                echo "<dd>" . $quote['translation'] . "</dd>";
                echo "</dl>";
            }
        } else echo "Error: Could not fetch data from database!";
    ?>

    <h2 class="heading-background">Our Team</h2>

    <figure class="image-style">
    <?php
        $result_img = mysqli_query($dbconn, "SELECT * FROM image_section LIMIT 1");
        if ($result_img) {
            while ($row = mysqli_fetch_assoc($result_img)) {
                echo "<img src=\"" . $row['img_location'] . "\"";
                echo " alt=\"" . $row['img_alt_description'] . "\" title=\"" . $row['img_title'];
                echo "\" width=\"" . $row['width'] . "\" height=\"" . $row['height'] . "\">";
                echo " <figcaption>" . $row['img_figcaption'] . "</figcaption>";
            }
        } else echo "Error: Could not fetch data from database!";
    ?> 
    </figure>

    <?php

    if($dbconn) {
        $result_fun_facts = mysqli_query($dbconn, "SELECT * FROM fun_fact_section ORDER BY fun_facts");
        if($result_fun_facts) {
            echo "<table> <caption>Fun Facts About Our Team Member</caption>
            <thead> <tr>
            <th>Fun Facts</th>
            <th>Nathan</th>
            <th>Harper</th>
            <th>Tiffany</th>
            <th>Khoi</th>
            </tr> </thead>
            <tbody>";
            while ($row = mysqli_fetch_assoc($result_fun_facts)) {
                echo "<tr>";
                echo "<td>" . $row['fun_facts'] . "</td>";
                echo "<td>" . $row['nathan'] . "</td>";
                echo "<td>" . $row['harper'] . "</td>";
                echo "<td>" . $row['tiffany'] . "</td>";
                echo "<td>" . $row['khoi'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody> </table>";
        }
    } else echo "<p>Error: Could not fetch data from database!</p>";
    
    ?>

    <br>

    <p style="color: #12343B; text-align: center;">We hope you have a good experience at our website!</p>

    <br>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>


</html>