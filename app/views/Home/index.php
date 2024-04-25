<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanIt - Cleaning Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            color: #333;
            background-color: #f4faff;
        }
        header {
            background-color: #89CFF0;
            padding: 0; 
        }
        header img {
            width: 100%;
            height: 250px;
            display: block; 
        }
        nav {
            background-color: #ffffff; 
            text-align: center;
            padding: 10px 0; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav a {
            margin: 0 20px;
            text-decoration: none;
            color: #89CFF0; 
            font-weight: 500;
            font-size: 20px;
        }
        nav a:hover {
            color: #66afe9;
        }
        main {
            padding: 40px 20px;
            text-align: center;
        }
        section {
            margin-bottom: 40px;
        }
        h1, h2 {
            color: #2a587a;
        }
        footer h3 {
        color: #ffffff; 
        margin-bottom: 10px;
        }

        footer p, footer a {
            color: #d0e8f2;
        }
        .book-now {
            background-color: #89CFF0;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            display: inline-block; /* Allows for margin and alignment */
            margin-top: 20px;
        }

        .book-now:hover {
            background-color: #66afe9;
        }

        .service-image {
            width: 100%;
            height: 150px;
            margin-top: 20px;
            display: block;
        }

    </style>
</head>
<body>
    <header>
        <img src="/Images/MKCleaningLogo.png" alt="CleanIt Logo">
    </header>
    <nav>
        <a href="/Home/index">Home</a>
        <a href="#about-us">About Us</a>
        <a href="#promotions">Promotions</a>
        <a href="#reviews">Leave a Review</a>
        <a href="/Customer/index">My Profile</a>
    </nav>
    <main>
        <h1>Welcome to MKCleaners MTL!</h1>
        <a href="/Home/Service" class="book-now">Book Now</a>
        <section id="about-us">
            <h2>About Us</h2>
            <div class="about-description">
                <p>At MKCleaners MTL, we offer comprehensive cleaning services designed to keep your space sparkling clean and hygienic. From residential homes to commercial offices, our team of skilled professionals is equipped to handle all aspects of cleaning with utmost precision and care. We utilize eco-friendly cleaning products and state-of-the-art equipment to deliver exceptional results.</p>
                <img src="/Images/cleaning-service-image.jpg" alt="Cleaning Service" class="service-image">
            </div>
        </section>
        <section id="reviews">
            <h2>Leave a Review</h2>
            <p>Show like 3 reviews or sum.</p>
        </section>
    </main>
    <footer style="background-color: #89CFF0; color: white; padding: 20px 0; font-family: 'Roboto', sans-serif;">
    <div style="display: flex; justify-content: space-around; align-items: start; flex-wrap: wrap; padding: 0 10%;">
        <div style="flex: 1; min-width: 200px; margin: 10px;">
            <h3>MKCleaners MTL</h3>
            <p>Discover our cleaning company, where your home is your best friend! Enjoy a spotless home without lifting a finger!</p>
        </div>
        <div style="flex: 1; min-width: 250px; margin: 10px;">
            <h3>Contact info.</h3>
            <p> Phone Number: (514) 799-4881 <br>
            Email: MKCleanersMTL@gmail.com <br>
            Instagram: mkcleanersmtl</p>
        </div>
    </div>
    <div style="text-align: center; padding-top: 20px;">
        © 2024 All Rights Reserved | MKCleaning
    </div>
</footer>
</body>
</html>
