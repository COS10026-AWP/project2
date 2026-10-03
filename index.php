<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Harper Lam">
        <meta name="keywords" content="tourism, travel, technology, booking, accommodation, transportation, attractions, personalised, travel planning, job">
        <meta name="description" content="A website that provides destination information, tour bookings, accommodation services and personalised travel planning.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>World Wide Travel</title>
        <link rel="stylesheet" href="styles/styles.css">

        <style>
            .services td[rowspan] {
                font-weight: bold;
                text-align: left;
            }
        </style>

    </head>

    
    <body>
        <header id="site-header">
            <?php include 'header.inc.php'; ?>
        </header>
    <br>
        <main>
            <section class="destinations">
                <h3>Explore Our Popular Destinations</h3>

                <div class="destination-box">

                    <article class="destination-card">
                        <img src="images/australia.png"
                            alt="Uluru Rock, Australia">
                        <h4>Australia</h4>
                        <p>
                            From the Great Barrier Reef to the Outback,
                            Australia offers a diverse range of experiences
                            for every traveller.
                        </p>
                        <p><i>Photo Credit: WorldStrides Australia</i></p>
                    </article>

                    <article class="destination-card">
                        <img src="images/japan.png"
                            alt="Temple and cherry blossom, Japan">
                        <h4>Japan</h4>
                        <p>
                            Experience the culture and attractions of Japan
                            on your next trip.
                        </p>
                        <p><i>Photo Credit: Daily Sabah</i></p>
                    </article>

                    <article class="destination-card">
                        <img src="images/france.png"
                            alt="Eiffel Tower, France">
                        <h4>France</h4>
                        <p>
                            Explore the scenic landscapes and adventures
                            that France has to offer.
                        </p>
                        <p><i>Photo Credit: Yogue India</i></p>
                    </article>
                </div>
            </section>
               
            <section class="services" style="background-color: #E0F1F5; padding: 100px 30px;">
                <h3 style="text-align: center; font-size: 30px; color: #12343B;">Our Services</h3>
                <table>
                    <tr>
                        <th style="background-color: #FAFAF7;">Service</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td class="sers">Destination Information</td>
                        <td>Comprehensive guides and insights on various travel destinations.</td>
                    </tr>
                    <tr>
                        <td class="sers">Tour Bookings</td>
                        <td>Easy and convenient booking options for your tours and excursions.</td>
                    </tr>
                    <tr>
                        <td class="sers">Accommodation Services</td>
                        <td>Assisted you in finding and booking suitable accommodations.</td>
                    </tr>
                    <tr>
                        <td class="sers">Personalised Travel Planning</td>
                        <td>Customised travel itineraries tailored to your preferences.</td>
                    </tr>
                </table>
            </section>
        </main>

        <footer id="site-footer">
            <?php include 'footer.inc.php'; ?>
        </footer>
      
    </body>



</html> 