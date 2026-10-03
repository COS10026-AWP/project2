<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="author" content="Harper Lam">

    <meta name="keywords"
          content="tourism, travel, technology, booking, accommodation,
          transportation, attractions, personalised, travel planning, job">

    <meta name="description"
          content="A website that provides destination information,
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
        <?php include 'header.inc'; ?>
    </header>


    <!--MAIN-->

    <main>

        <!-- Main heading for this page -->
        <h1>World Wide Travel</h1>


        <!--DESTINATIONS-->

        <section class="destinations">

            <h2>Explore Our Popular Destinations</h2>

            <div class="destination-box">


                <!-- Australia -->

                <article class="destination-card">

                    <img src="images/australia.png"
                         alt="Uluru Rock, Australia">

                    <h3>Australia</h3>

                    <p>
                        From the Great Barrier Reef to the Outback,
                        Australia offers a diverse range of experiences
                        for every traveller.
                    </p>

                    <p>
                        <i>Photo Credit: WorldStrides Australia</i>
                    </p>

                </article>


                <!-- Japan -->

                <article class="destination-card">

                    <img src="images/japan.png"
                         alt="Temple and cherry blossom, Japan">

                    <h3>Japan</h3>

                    <p>
                        Experience the culture and attractions of Japan
                        on your next trip.
                    </p>

                    <p>
                        <i>Photo Credit: Daily Sabah</i>
                    </p>

                </article>


                <!-- France -->

                <article class="destination-card">

                    <img src="images/france.png"
                         alt="Eiffel Tower, France">

                    <h3>France</h3>

                    <p>
                        Explore the scenic landscapes and adventures
                        that France has to offer.
                    </p>

                    <p>
                        <i>Photo Credit: Yogue India</i>
                    </p>

                </article>

            </div>

        </section>


        <!--TRAVEL TIPS-->

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


        <!--SERVICES-->
        <section class="services"
                 style="background-color: #E0F1F5; padding: 100px 30px;">

            <h2>Our Services</h2>


            <table>

                <tr>
                    <th>Category</th>
                    <th>Service</th>
                    <th>Description</th>
                </tr>


                <!-- Travel Planning -->

                <tr>

                    <td rowspan="2">
                        Travel Planning
                    </td>

                    <td>
                        Destination Information
                    </td>

                    <td>
                        Comprehensive guides and insights on various
                        travel destinations.
                    </td>

                </tr>


                <tr>

                    <td>
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

                    <td>
                        Tour Bookings
                    </td>

                    <td>
                        Easy and convenient booking options for your
                        tours and excursions.
                    </td>

                </tr>


                <tr>

                    <td>
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
        <?php include 'footer.inc'; ?>
    </footer>

</body>

</html>