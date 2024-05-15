<!DOCTYPE html>
<html lang="en">
<!-- hi -->
<head>
    <meta charset="UTF-8">
    <title><?= __('Create Review') ?></title>
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        h1,
        h2 {
            color: #2a587a;
            text-align: center;
        }

        footer {
            background-color: #89CFF0;
            color: white;
            padding: 20px 0;
        }

        footer h3,
        footer p,
        footer a {
            margin: 0;
            padding: 0;
        }

        footer div {
            display: flex;
            justify-content: space-around;
            align-items: start;
            flex-wrap: wrap;
            padding: 0 10%;
        }

        .review-form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .review-form label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }

        .review-form input[type="text"],
        .review-form input[type="number"],
        .review-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .review-form button.submit-review-button {
            background-color: #89CFF0;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
        }

        .review-form button.submit-review-button:hover {
            background-color: #66afe9;
        }

        .star-rating {
            display: inline-flex;
            justify-content: center;
            direction: rtl;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #ccc;/ cursor: pointer;
            padding: 5px;
        }

        .star-rating input[type="radio"]:checked~label {
            color: #f5b301;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #f5b301;
        }
    </style>
</head>

<body>
    <header>
        <img src="/Images/MKCleaningLogo.png" alt="<?= __('CleanIt Logo') ?>">
    </header>
    <nav>
        <a href="/"><?= __('Home') ?></a>
        <a href="#about-us"><?= __('About Us') ?></a>
        <a href="#promotions"><?= __('Promotions') ?></a>
        <a href="/Reviews/"><?= __('Leave a Review') ?></a>
        <a href="/Customer/"><?= __('My Profile') ?></a>
    </nav>
    <h1><?= __('Post a New Review') ?></h1>
    <main>
        <form action="" method="post" class="review-form">
            <input type="hidden" id="customerID" name="customerID" value="<?= $_SESSION['customerID'] ?>">

            <label for="rating"><?= __('Rating:') ?>:</label>
            <div class="star-rating">
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5">&#9734;</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4">&#9734;</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3">&#9734;</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2">&#9734;</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1">&#9734;</label>
            </div>

            <label for="text"><?= __('Review Text:') ?>:</label>
            <textarea id="text" name="text" required></textarea>

            <button type="submit" class="submit-review-button"><?= __('Submit Review') ?></button>
        </form>
    </main>
    <footer style="background-color: #89CFF0; color: white; padding: 20px 0; font-family: 'Roboto', sans-serif;">
        <div style="display: flex; justify-content: space-around; align-items: start; flex-wrap: wrap; padding: 0 10%;">
            <div style="flex: 1; min-width: 200px; margin: 10px;">
                <h3>MKCleaners MTL</h3>
                <p><?= __('Discover our cleaning company, where your home is your best friend! Enjoy a spotless home without lifting a finger!') ?>
                </p>
            </div>
            <div style="flex: 1; min-width: 250px; margin: 10px;">
                <h3><?= __('Contact info.') ?></h3>
                <p> <?= __('Phone Number: (514) 799-4881') ?> <br>
                    <?= __('Email: MKCleanersMTL@gmail.com') ?> <br>
                    <?= __('Instagram: mkcleanersmtl') ?></p>
            </div>
        </div>
        <div style="text-align: center; padding-top: 20px;">
            <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
        </div>
    </footer>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star-rating input[type="radio"]');
        stars.forEach(star => {
            star.addEventListener('change', function () {
                let currentRating = this.value;
                stars.forEach(star => {
                    if (star.value <= currentRating) {
                        star.nextElementSibling.style.color = '#f5b301'; // Filled star color
                    } else {
                        star.nextElementSibling.style.color = '#ccc'; // Empty star color
                    }
                });
            });
        });
    });
</script>

</html>