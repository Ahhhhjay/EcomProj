<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - MKCleaners MTL</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            color: #333;
            background-color: #f4faff;
            /* Adjust min-height to ensure footer stays at bottom */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header,
        nav {
            background-color: #89CFF0;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: auto;
            /* Push footer to the bottom */
        }

        nav a {
            color: white;
            margin: 0 15px;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #66afe9;
        }

        main {
            padding: 20px;
            text-align: center;
            flex: 1;
            /* Allow content to grow to fill available space */
        }

        .content-section {
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        h1,
        h2 {
            color: #2a587a;
        }

        p {
            line-height: 1.6;
        }

        footer {
            background-color: #89CFF0;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <img src="/Images/MKCleaningLogo.png" alt="CleanIt Logo">
    </header>
    <nav>
        <a href="/">Home</a>
        <a href="/About_Us/">About Us</a>
        <a href="#promotions">Promotions</a>
        <a href="/Reviews/">Leave a Review</a>
        <a href="/Customer/">My Profile</a>
        <!-- Dynamic button rendering based on login state -->
        <?php if (isset($_SESSION['customerID'])): ?>
            <button onclick="location.href='/Customer/logout'">Logout</button>
        <?php else: ?>
            <button onclick="location.href='/Customer/login'">Login</button>
            <button onclick="location.href='/Customer/register'">Sign Up</button>
        <?php endif; ?>
    </nav>
    <main>
        <section class="content-section">
            <h2>Who We Are</h2>
            <p>At MKCleaners MTL, we are dedicated to providing top-notch home cleaning services. Our team is committed
                to ensuring every corner of your home sparkles, using eco-friendly cleaning solutions that are safe for
                your family and pets.</p>
        </section>
        <section class="content-section">
            <h2>Our Mission</h2>
            <p>Our mission is to improve the quality of life for our customers by delivering exceptional cleaning and
                customer service. We aim to create clean, healthy, and happy environments through our professional
                services.</p>
        </section>
        <section class="content-section">
            <h2>Our Team</h2>
            <p>Our team consists of experienced and trained professionals who are passionate about cleanliness. We
                conduct thorough background checks to ensure trustworthy and reliable service for every customer.</p>
        </section>
        <section class="content-section">
            <h2>Contact Us</h2>
            <p>For bookings or more information:</p>
            <p>Phone: (514) 799-4881</p>
            <p>Email: MKCleanersMTL@gmail.com</p>
            <p>Instagram: @mkcleanersmtl</p>
        </section>
    </main>
    <footer>
        <div style="display: flex; justify-content: space-around; align-items: start; flex-wrap: wrap; padding: 0 10%;">
            <div style="flex: 1; min-width: 200px; margin: 10px;">
                <h3>MKCleaners MTL</h3>
                <p>Discover our cleaning company, where your home is your best friend! Enjoy a spotless home without
                    lifting a finger!</p>
            </div>
            <div style="flex: 1; min-width: 250px; margin: 10px;">
                <h3>Contact info.</h3>
                <p>Phone Number: (514) 799-4881 <br>
                    Email: MKCleanersMTL@gmail.com <br>
                    Instagram: mkcleanersmtl</p>
            </div>
        </div>
        <div style="text-align: center; padding-top: 20px;">
            &copy; 2024 All Rights Reserved | Totally not fake website
        </div>
    </footer>
</body>

</html>