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
            color: #f9c74fff;
            text-align: center;
            font-size: 25px;
        }

        h2 {
            color: #895053ff;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>

    <h1>About the Team</h1>

    <ol>
        <li>
            <h2>The Group</h2>
            <ul>
                <li>We are Group 2!</li>
                <li>We are currently studying a class in the 10026 Web Technology course</li>
                <li>Weekly on Thursday, from 4:30 to 6:30</li>
                <li>Led by our handsome tutor Rahul!</li>
            </ul>
        </li>

        <li>
            <h2>Our Contributions</h2>
            <ul>
                <li>Nathan: Co-leader, responsible for the job info page. </li>
                <li>Harper: Leader in project planning, responsible for HTML, CSS, and the home page.</li>
                <li>Tiffany: Responsible for the job application page.</li>
                <li>Khoi: Responsible for the about page.</li>
            </ul>
        </li>

        <li>
            <h2>Cool Quotes!</h2>
            <ul>
                <li>好好学习，天天向上
                    <ul>
                        <li>Translation (from Mandarin): Study hard and make progress every day.</li>
                    </ul>
                </li>
                <li>Tương lai thay đổi từng khoảnh khắc. Vậy nên, thay vì phiền não bởi những điều phía trước, tốt hơn
                    là nên cố gắng cho hiện tại.
                    <ul>
                        <li>Translation (from Vietnamese): The future changes from moment to moment. Therefore, instead
                            of worrying about what lies ahead, it is better to focus on the present.</li>
                    </ul>
                </li>
                <li>Hidup adalah jalan, tak tahu apa yang ada di sepanjang jalan.
                    <ul>
                        <li>Translation (from Indonesian): Life is a road, don't know what's along the way</li>
                    </ul>
                </li>
                <li>Chúng ta không có gì là lười biếng cả, chỉ là chúng ta đang dành thời gian cho việc khác thay vì
                    việc chúng ta đang làm mà thôi.
                    <ul>
                        <li>Translation (from Vietnamese): There's no such thing as being lazy, we're simply just focus
                            on something else other than what we're doing.</li>
                    </ul>
                </li>
            </ul>
        </li>

        <li>
            <h2>A Picture Of Us!</h2>
            <figure>
                <img style="display: block; margin: 0 auto; width: 90%; height: 90%;" src="images/group.png"
                    alt="A picture of us!" title="Group Photo" width="1200" height="900">
            </figure>
        </li>

        <li>
            <h2>Our fun facts!</h2>
            <table>
                <caption><strong>A Table Listing Our Fun Facts!</strong></caption>

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Fun Fact 1</th>
                        <th>Fun Fact 2</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Nathan</th>
                        <th>Used to dream of becoming a ski instructor to travel the world, but never found the time to
                            stack up enough experience</th>
                        <th>Runs around in circles for eight hours a week, and spends around the same time doing
                            flashcards (both as hobbies)</th>
                    </tr>

                    <tr>
                        <th>Harper</th>
                        <th>Nearly drown as a kid</th>
                        <th>Had 8 stiches on her foot as a kid</th>
                    </tr>

                    <tr>
                        <th>Tiffany</th>
                        <th>Can recognize 85% of Asian countries by their flags most of the times</th>
                        <th>Have a Spotify playlist that is over 75 hours</th>
                    </tr>

                    <tr>
                        <th>Khoi</th>
                        <th>Have ungodly skills to play rhythm games, along with a neverending hyperfixation on them
                        </th>
                        <th>Have met multiple popular celebrities in person and had their autographs</th>
                    </tr>
                </tbody>
            </table>
        </li>
    </ol>

    <br>

    <p style="color: #895053ff; text-align: center;">We hope you have a good experience at our website!</p>

    <br>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>


</html>