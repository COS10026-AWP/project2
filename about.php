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
        <!-- <li>Group name: </li>
        <li>We are currently studying a class in the 10026 Web Technology course</li>
        <li>Weekly on Thursday, from 4:30 to 6:30</li>
        <li>Led by our handsome tutor Rahul!</li> -->
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
        <!-- <dd>Leader in project planning, responsible for HTML, CSS, and the home page.</dd>
        <dd>Lorem ipsum dolor sit amat</dd>
        <dd>Lorem ipsum dolor sit amat</dd> -->
    <!-- </dl>

    <dl class="travel-tips">
        <dt>Nathan <p class="student-id">(106565482)</p></dt>
        <dd>Co-leader, responsible for the job info page.</dd>
        <dd>Lorem ipsum dolor sit amat</dd>
        <dd>Lorem ipsum dolor sit amat</dd>
    </dl>

    <dl class="travel-tips">
        <dt>Tiffany <p class="student-id">(105996858)</p></dt>
        <dd>Responsible for the job application page.</dd>
        <dd>Lorem ipsum dolor sit amat</dd>
        <dd>Lorem ipsum dolor sit amat</dd>
    </dl>

    <dl class="travel-tips">
        <dt>Khoi <p class="student-id">(106379243)</p></dt>
        <dd>Responsible for the about page.</dd>
        <dd>Lorem ipsum dolor sit amat</dd>
        <dd>Lorem ipsum dolor sit amat</dd>
    </dl> -->

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
                echo "<dt>" . $quote['name'] . ": " . $quote['quote'] . "</p></dt>";
                echo "<dd>" . $quote['translation'] . "</dd>";
                echo "</dl>";
            }
        } else echo "Error: Could not fetch data from database!";
    ?>

    <!-- <dl class="travel-tips">
        <dt>好好学习，天天向上</dt>
        <dd>Translation (from Mandarin): Study hard and make progress every day.</dd>
    </dl>

    <dl class="travel-tips">
        <dt>Tương lai thay đổi từng khoảnh khắc. Vậy nên, thay vì phiền não bởi những điều phía trước, tốt hơn
            là nên cố gắng cho hiện tại.</dt>
        <dd>Translation (from Vietnamese): The future changes from moment to moment. Therefore, instead
            of worrying about what lies ahead, it is better to focus on the present.</dd>
    </dl>

    <dl class="travel-tips">
        <dt>Hidup adalah jalan, tak tahu apa yang ada di sepanjang jalan.</dt>
        <dd>Translation (from Indonesian): Life is a road, don't know what's along the way</dd>
    </dl>

    <dl class="travel-tips">
        <dt>Chúng ta không có gì là lười biếng cả, chỉ là chúng ta đang dành thời gian cho việc khác thay vì
            việc chúng ta đang làm mà thôi.</dt>
        <dd>Translation (from Vietnamese): There's no such thing as being lazy, we're simply just focus
            on something else other than what we're doing.</dd>
    </dl> -->

    <h2 class="heading-background">Our Team</h2>

    <figure>
    <?php
        $result_img = mysqli_query($dbconn, "SELECT * FROM image_section LIMIT 1");
        if ($result_img) {
            while ($row = mysqli_fetch_assoc($result_img)) {
                echo "<img style=\"display: block; margin: 0 auto; width: 90%; height: 90%;\" src=\"" . $row['img_location'] . "\"";
                echo "alt=\"" . $row['img_alt_description'] . "\" title=\"" . $row['img_title'];
                echo "\" width=\"" . $row['width'] . "\" height=\"" . $row['height'] . "\"";
                echo "<figcaption>" . $row['img_figcaption'] . "</figcaption>";
            }
        } else echo "Error: Could not fetch data from database!";
    ?> 
        <!-- <img style="display: block; margin: 0 auto; width: 90%; height: 90%;" src="images/group.png"
            alt="A picture of us!" title="Group Photo" width="1200" height="900">
        <figcaption>From left to right: Harper, Nathan, Khoi, Tiffany</figcaption> -->
    </figure>

    <!-- <table>
        <caption>Fun Facts About Our Team Member</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Fun Fact 1</th>
                <th>Fun Fact 2</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Nathan</td>
                <td>Used to dream of becoming a ski instructor to travel the world, but never found the time to
                    stack up enough experience</td>
                <td>Runs around in circles for eight hours a week, and spends around the same time doing
                    flashcards (both as hobbies)</td>
            </tr>

            <tr>
                <td>Harper</td>
                <td>Nearly drown as a kid</td>
                <td>Had 8 stiches on her foot as a kid</td>
            </tr>

            <tr>
                <td>Tiffany</td>
                <td>Can recognize 85% of Asian countries by their flags most of the times</td>
                <td>Have a Spotify playlist that is over 75 hours</td>
            </tr>

            <tr>
                <td>Khoi</td>
                <td>Have ungodly skills to play rhythm games, along with a neverending hyperfixation on them
                </td>
                <td>Have met multiple popular celebrities in person and had their autographs</td>
            </tr>
        </tbody>
    </table> -->

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