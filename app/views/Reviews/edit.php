<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Edit Review') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            color: #333;
            background-color: #f4faff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            flex-grow: 1;
            padding: 40px 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 20px;
        }

        footer h3 {
            color: #ffffff;
            margin-bottom: 10px;
        }

        footer p,
        footer a {
            color: #d0e8f2;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #89CFF0;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #66afe9;
        }

        a {
            color: #89CFF0;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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
            color: #ccc;
            cursor: pointer;
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
        <img src="/Images/MKCleaningLogo.png" alt="<?= __('MKCleaners MTL Logo') ?>">
    </header>
    <nav>
        <a href="/"><?= __('Home') ?></a>
        <a href="#about-us"><?= __('About Us') ?></a>
        <a href="#promotions"><?= __('Promotions') ?></a>
        <a href="/Reviews/"><?= __('Leave a Review') ?></a>
        <a href="/Customer/"><?= __('My Profile') ?></a>
    </nav>
    <main>
        <h1><?= __('Edit Review') ?></h1>

        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?= $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); endif; ?>

        <form action="/Reviews/edit/<?= htmlspecialchars($review->reviewID) ?>" method="POST">

            <label for="rating"><?= __('Rating:') ?>:</label>

            <div class="star-rating">
                <!-- Reverse order so that higher numbers are on the right side -->
                <input type="radio" id="star5" name="rating" value="5" <?= $review->rating == 5 ? 'checked' : '' ?>><label
                    for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4" <?= $review->rating == 4 ? 'checked' : '' ?>><label
                    for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3" <?= $review->rating == 3 ? 'checked' : '' ?>><label
                    for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2" <?= $review->rating == 2 ? 'checked' : '' ?>><label
                    for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1" <?= $review->rating == 1 ? 'checked' : '' ?>><label
                    for="star1">&#9733;</label>
            </div>

            <label for="text"><?= __('Review Text:') ?>:</label>

            <textarea id="text" name="text"><?= htmlspecialchars($review->text) ?></textarea>

            <button type="submit"><?= __('Update Review') ?></button>

        </form>

        <a href="/Reviews/"><?= __('Cancel') ?></a>

    </main>

    <footer style="background-color: #89CFF0; color: white; padding: 20px 0; font-family: 'Roboto', sans-serif;">

        <div style="display: flex; justify-content: space-around; align-items: start; flex-wrap: wrap; padding: 0 10%;">

            <div style="flex: 1; min-width: 200px; margin: 10px;">
                <h3><?= __('MKCleaners MTL') ?></h3>
                <p><?= __('Discover our cleaning company, where your home is your best friend! Enjoy a spotless home without lifting a finger!') ?>
                </p>
            </div>

            <div style="flex: 1; min-width: 250px; margin: 10px;">
                <h3><?= __('Contact info.') ?></h3>
                <p><?= __('Phone Number: (514) 799-4881') ?><br>
                    <?= __('Email: MKCleanersMTL@gmail.com') ?><br>
                    <?= __('Instagram: mkcleanersmtl') ?></p>
            </div>

        </div>

        <div style="text-align: center; padding-top: 20px;">
            <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
        </div>

    </footer>

</body>

</html>