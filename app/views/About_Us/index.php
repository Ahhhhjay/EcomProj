<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('CleanIt - Cleaning Services') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            color: #333;
            background-color: #f4faff;
        }

        header {
            background-color: #C7E2F5;
            padding: 0;
        }

        header img {
            width: 100%;
            height: auto;
            display: block;
            max-height: 300px;
            object-fit: contain;
        }

        nav {
            background-color: #ffffff;
            text-align: center;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a,
        nav button {
            margin: 0 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: #89CFF0;
            font-weight: 500;
            font-size: 16px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        nav a:hover,
        nav button:hover {
            color: #66afe9;
        }

        nav button {
            background-color: #89CFF0;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav button:hover {
            background-color: #66afe9;
        }

        main {
            padding: 40px 20px;
            text-align: center;
        }

        section {
            margin-bottom: 40px;
        }

        h1,
        h2 {
            color: #2a587a;
        }

        footer h3 {
            color: #ffffff;
            margin-bottom: 10px;
        }

        footer p,
        footer a {
            color: #d0e8f2;
        }

        .book-now {
            background-color: #89CFF0;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: inline-block;
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

        .star-rating .filled-star {
            color: #f5b301;
            /* Gold color for filled stars */
            font-size: 20px;
        }

        .star-rating .empty-star {
            color: #ccc;
            /* Light gray for empty stars */
            font-size: 20px;
        }

        .reviews-row {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            flex-wrap: wrap;
            /* Ensures responsiveness */
        }

        .review-item {
            background-color: #ffffff;
            padding: 15px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
            /* Ensures that each review item takes equal space */
            text-align: left;
            min-width: 250px;
            /* Ensures that items do not become too narrow */
            max-width: 30%;
            /* Prevents items from being too wide on larger screens */
        }

        .content-section {
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
    </style>
</head>

<body>
    <header>
        <img src="/Images/MKCleaningLogo.png" alt="<?= __('CleanIt Logo') ?>">
    </header>

    <nav>
        <a href="/<?= isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en' ?>"><?= __('Home') ?></a>
        <a
            href="/About_Us/<?= isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en' ?>"><?= __('About Us') ?></a>
        <a
            href="/Promotions/<?= isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en' ?>"><?= __('Promotions') ?></a>
        <a
            href="/Reviews/<?= isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en' ?>"><?= __('Leave a Review') ?></a>
        <a
            href="/Customer/<?= isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '?lang=fr' : '?lang=en' ?>"><?= __('My Profile') ?></a>
        <?php if (isset($_SESSION['customerID'])): ?>
            <button onclick="location.href='/Customer/logout'"><?= __('Logout') ?></button>
        <?php else: ?>
            <button onclick="location.href='/Customer/login'"><?= __('Login') ?></button>
            <button onclick="location.href='/Customer/register'"><?= __('Sign Up') ?></button>
        <?php endif; ?>
        <!-- Language selection buttons -->
        <?php if (isset($_GET['lang']) && $_GET['lang'] === 'fr'): ?>
            <button onclick="location.href='/?lang=en'">English</button>
        <?php else: ?>
            <button onclick="location.href='/?lang=fr'">Français</button>
        <?php endif; ?>
    </nav>

    <main>
        <section class="content-section">
            <h2><?= __('Who We Are') ?></h2>
            <p><?= __('At MKCleaners MTL, we are dedicated to providing top-notch home cleaning services. Our team is committed to ensuring every corner of your home sparkles, using eco-friendly cleaning solutions that are safe for your family and pets.') ?>
            </p>
        </section>
        <section class="content-section">
            <h2><?= __('Booking information') ?></h2>
            <p><?= __('At MKCleaners MTL, all cleaning sessions are scheduled in two-hour intervals, ensuring each part of your home receives the attention it needs.If you require adjustments to the scheduling or have specific requirements, please do not hesitate to reach out to us for further information. We are here to accommodate your unique needs and ensure your satisfaction.') ?>
            </p>
        </section>
        <section class="content-section">
            <h2><?= __('Our Mission') ?></h2>
            <p><?= __('Our mission is to improve the quality of life for our customers by delivering exceptional cleaning and customer service. We aim to create clean, healthy, and happy environments through our professional services.') ?>
            </p>
        </section>
        <section class="content-section">
            <h2><?= __('Our Team') ?></h2>
            <p><?= __('Our team consists of experienced and trained professionals who are passionate about cleanliness. We conduct thorough background checks to ensure trustworthy and reliable service for every customer.') ?>
            </p>
        </section>
        <section class="content-section">
            <h2><?= __('Contact Us') ?></h2>
            <p><?= __('For bookings or more information:') ?></p>
            <p><?= __('Phone: (514) 799-4881') ?></p>
            <p><?= __('Email: MKCleanersMTL@gmail.com') ?></p>
            <p><?= __('Instagram: @mkcleanersmt') ?>l</p>
        </section>
    </main>

    <footer
        style="background-color: #89CFF0; color: white; padding: 20px 0; font-family: 'Roboto', sans-serif; padding-top: 10px;">
        <div style="display: flex; justify-content: space-around; align-items: start; flex-wrap: wrap; padding: 0 10%;">
            <div style="flex: 1; min-width: 200px; margin: 10px;">
                <h3><?= __('MKCleaners MTL') ?></h3>
                <p><?= __('Discover our cleaning company, where your home is your best friend! Enjoy a spotless home without lifting a finger!') ?>
                </p>
            </div>
            <div style="flex: 1; min-width: 250px; margin: 10px;">
                <h3><?= __('Contact info.') ?></h3>
                <p><?= __('Phone Number: (514) 799-4881') ?> <br>
                    <?= __('Email: MKCleanersMTL@gmail.com') ?> <br>
                    <?= __('Instagram: mkcleanersmtl') ?></p>
            </div>
        </div>
        <div style="text-align: center; padding-top: 20px;">
            <?= __('&copy; 2024 All Rights Reserved') ?>
        </div>
    </footer>
</body>

</html>