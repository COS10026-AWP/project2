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
            font-size: 25px;
        }

        h2 {
            color: #12343B;
            font-size: 20px;
        }

        p { color: #12343B }

        dd { font-size: 14px; }

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
    </style>
</head>

<body>
    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>

    <h1>About Us</h1>

    <aside class="travel-tips">
        <h2>The Group</h2>
    </aside>
    
    <ul>
        <li>We are Group 2!</li>
        <li>We are currently studying a class in the 10026 Web Technology course</li>
        <li>Weekly on Thursday, from 4:30 to 6:30</li>
        <li>Led by our handsome tutor Rahul!</li>
    </ul>

    <aside class="travel-tips">
        <h2>Our Contributions</h2>
    </aside>
    
    <dl>
        <dt><p class="student-id">106696764</p> Harper</dt>
        <dd>Leader in project planning, responsible for HTML, CSS, and the home page.</dd>

        <dt><p class="student-id">106565482</p> Nathan</dt>
        <dd>Co-leader, responsible for the job info page.</dd>

        <dt><p class="student-id">105996858</p> Tiffany</dt>
        <dd>Responsible for the job application page.</dd>

        <dt><p class="student-id">106379243</p> Khoi</dt>
        <dd>Responsible for the about page.</dd>
    </dl>

    <aside class="travel-tips">
        <h2>Cool Quotes!</h2>
    </aside>
    
    <dl>
        <dt>好好学习，天天向上</dt>
        <dd>Translation (from Mandarin): Study hard and make progress every day.</dd>

        <dt>Tương lai thay đổi từng khoảnh khắc. Vậy nên, thay vì phiền não bởi những điều phía trước, tốt hơn
            là nên cố gắng cho hiện tại.</dt>
        <dd>Translation (from Vietnamese): The future changes from moment to moment. Therefore, instead
            of worrying about what lies ahead, it is better to focus on the present.</dd>

        <dt>Hidup adalah jalan, tak tahu apa yang ada di sepanjang jalan.</dt>
        <dd>Translation (from Indonesian): Life is a road, don't know what's along the way</dd>

        <dt>Chúng ta không có gì là lười biếng cả, chỉ là chúng ta đang dành thời gian cho việc khác thay vì
            việc chúng ta đang làm mà thôi.</dt>
        <dd>Translation (from Vietnamese): There's no such thing as being lazy, we're simply just focus
            on something else other than what we're doing.</dd>
    </dl>

    <aside class="travel-tips">
        <h2>Our Team</h2>
    </aside>
    
    <figure>
        <img style="display: block; margin: 0 auto; width: 90%; height: 90%;" src="images/group.png"
            alt="A picture of us!" title="Group Photo" width="1200" height="900">
        <figcaption>From left to right: Harper, Nathan, Khoi, Tiffany</figcaption>
    </figure>

    <table>
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
    </table>

    <br>

    <p style="color: #12343B; text-align: center;">We hope you have a good experience at our website!</p>

    <br>

    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>
</body>


</html>