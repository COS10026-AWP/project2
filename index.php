<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Harper Lam">
    <meta name="keywords" content="tourism, travel, technology, booking, accommodation,
          transportation, attractions, personalised, travel planning, job">
    <meta name="description" content="A website that provides destination information,
          tour bookings, accommodation services and personalised travel planning.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Wide Travel</title>

    <!--External CSS-->
    <link rel="stylesheet" href="styles/styles.css">

    <!--Embedded CSS-->
    <style>
        .services td[rowspan] {
            font-weight: bold;
            text-align: left;
        }
    </style>
</head>
 


    <body>
   <!--HEADER-->

    <header id="site-header">
        <?php include 'header.inc.php'; ?>
    </header>


        <!--CONTENT-->
        <main>
              <section class="hiring">
                <h1>We're Hiring!</h1>
                    <p>
                        Join our team and be part of a dynamic and innovative
                        travel company. We are looking for passionate individuals
                        who are eager to contribute to our mission of providing
                        exceptional travel experiences.
                    </p>
                    <p>
                        Check out our current job openings and apply today!
                        <a href="jobs.php">View Job Openings</a>
                    </p>
                </section>

            <section class="content">
                <h1 id="slogan">Taking You Around the World</h1>
                <br>
                <p id="description"> The best online platforms for destination information,
                    tour bookings, accommodation services and personalised travel planning.</p>
            </section>

            <!--DESTINATIONS-->
            <section class="destinations">
                <h2>Explore Our Popular Destinations</h2>
                <div class="destination-box">
                    <!-- China -->

                    <article class="destination-card">
                        <img src="images/china.jpg" alt="Great Wall of China">
                        <h3>China</h3>
                        <p>
                            From the Great Wall to the Forbidden City,
                            China offers a rich cultural experience
                            for every traveller.
                        </p>
                        <p>
                            <i>Photo Credit: WorldStrides Australia</i>
                        </p>
                    </article>


                    <!-- Indonesia -->

                    <article class="destination-card">

                        <img src="images/indonesia.jpg" alt="Beach and palm trees, Indonesia">
                        <h3>Indonesia</h3>
                        <p>
                            Experience the culture and natural beauty of Indonesia
                            on your next trip.
                        </p>
                        <p>
                            <i>Photo Credit: Daily Sabah</i>
                        </p>
                    </article>


                    <!-- Vietnam -->

                    <article class="destination-card">

                        <img src="images/vietnam.jpg" alt="Ha Long Bay, Vietnam">
                        <h3>Vietnam</h3>
                        <p>
                            Explore the scenic landscapes and adventures
                            that Vietnam has to offer.
                        </p>
                        <p>
                            <i>Photo Credit: Yogue India</i>
                        </p>
                    </article>
                </div>
                    <aside class="travel-tips">
                        <h2>Travel Tips</h2>
                        <p>
                            Before travelling internationally, remember to check
                            passport validity, visa requirements and local travel
                            advice for your destination.
                        </p>
                        <p>
                            Planning ahead can help make your journey safer,
                            easier and more enjoyable.
                        </p>
                    </aside>
        </section>
          
                        
                <!--SERVICES-->
                <section class="services" style="background-color: #E0F1F5; padding: 100px 30px;">

                    <h2 style="text-align: center; font-size: 30px; color: #12343B;">Our Services</h2>


                    <table>

                        <tr>
                            <th>Category</th>
                            <th>Service</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td rowspan="2">
                                Travel Planning
                            </td>
                            <td class="services-hover">
                                Destination Information
                            </td>
                            <td>
                                Comprehensive guides and insights on various
                                travel destinations.
                            </td>
                        </tr>


                        <tr>
                            <td class="services-hover">
                                Personalised Travel Planning
                            </td>
                            <td>
                                Customised travel itineraries tailored to
                                your preferences.
                            </td>
                        </tr>


                        <!-- Booking Services -->
                        <tr>
                            <td rowspan="2">
                                Booking Services
                            </td>
                            <td class="services-hover">
                                Tour Bookings
                            </td>
                            <td>
                                Easy and convenient booking options for your
                                tours and excursions.
                            </td>
                        </tr>


                        <tr>
                            <td class="services-hover">
                                Accommodation Services
                            </td>
                            <td>
                                Assistance in finding and booking suitable
                                accommodations.
                            </td>
                        </tr>
                    </table>
                </section>

        </main>

    <!-- FOOTER -->
    <footer id="site-footer">
        <?php include 'footer.inc.php'; ?>
    </footer>

</body>

</html>