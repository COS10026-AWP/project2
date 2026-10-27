<?php 
$config = require "settings.php";
$dbconn = mysqli_connect(
    $config['host'],
    $config['user'],
    $config['pwd'],
    $config['sql_db']
);

if (!$dbconn) {
    echo "<p>Sorry, the database is not available right now.</p>";
    exit();
}

$query = "SELECT student_id, name, description FROM contributions "
    . "ORDER BY member_order, item_order";

$result = mysqli_query($dbconn, $query);

$quote_query = "SELECT student_id, quote_native, quote_english, "
    . "quote_language FROM about";

$quote_result = mysqli_query($dbconn, $quote_query);

if (!$result || !$quote_result) {
    echo "<p>Sorry, the information could not be loaded.</p>";
    mysqli_close($dbconn);
    exit();
}

$quotes = array();

while ($row = mysqli_fetch_assoc($quote_result)) {
    $quotes[$row['student_id']] = $row;
}

if (!$result) {
    echo "<p>Sorry, contributions could not be loaded.</p>";
    mysqli_close($dbconn);
    exit();
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
        <li>Group name: Group 2 (Code: G02)</li>
        <li>Course: COS10026 - Web Technology Project</li>
        <li>Schedule: Thursday, 4:30 - 6:30 PM</li>
        <li>Tutor: Rahul Raghavan</li>
    </ul>

    <h2 class="heading-background">Our Contributions</h2>
             <div class="member-list">
                <?php
                $current = "";

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['student_id'] != $current) {

                        if ($current != "") {
                            echo "</ul></div>";
                        }

                        echo "<div class='member'>";
                        echo "<h3>" . htmlspecialchars($row['name'])
                            . " (" . htmlspecialchars($row['student_id'])
                            . ")</h3>";

                        echo "<ul>";

                        $current = $row['student_id'];
                    }

                    echo "<li>" . htmlspecialchars($row['description'])
                        . "</li>";
                }

                if ($current != "") {
                    echo "</ul></div>";
                }
                ?>
            </div>

    <h2 class="heading-background">Our Favorite Quotes!</h2>
    
    <?php
        echo "<h3>" . htmlspecialchars($row['name'])
        . " (" . htmlspecialchars($row['student_id']) . ")</h3>";

        if (isset($quotes[$row['student_id']])) {
            echo "<blockquote>";
            echo "<p>" . htmlspecialchars(
                $quotes[$row['student_id']]['quote_native']
            ) . "</p>";

            echo "<p>" . htmlspecialchars(
                $quotes[$row['student_id']]['quote_english']
            ) . "</p>";

            echo "<p><em>" . htmlspecialchars(
                $quotes[$row['student_id']]['quote_language']
            ) . "</em></p>";
            echo "</blockquote>";
        }
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