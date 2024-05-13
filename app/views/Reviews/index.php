<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Reviews - MKCleaners MTL') ?></title>
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

        .review-item {
            background-color: #ffffff;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .review-item h3 {
            color: #333;
        }

        .create-review-button {
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

        .create-review-button:hover {
            background-color: #66afe9;
        }

        .star-rating {
            color: #ccc;
            font-size: 20px;
        }

        .star-rating .filled {
            color: #f5b301;
        }

        .button {
            padding: 8px 15px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-button {
            background-color: #4CAF50;
        }

        .edit-button:hover {
            background-color: #45a049;
        }

        .delete-button {
            background-color: #f44336;
        }

        .delete-button:hover {
            background-color: #da190b;
        }

        .review-item {
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .review-item h3 {
            margin-top: 0;
            color: #333;
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
        <!-- Dynamic button rendering based on login state -->
        <?php if (isset($_SESSION['customerID'])): ?>
            <button onclick="location.href='/Customer/logout'"><?= __('Logout') ?></button>
        <?php else: ?>
            <button onclick="location.href='/Customer/login'"><?= __('Login') ?></button>
            <button onclick="location.href='/Customer/register'"><?= __('Sign Up') ?></button>
        <?php endif; ?>
    </nav>

    <main>
        <h1><?= __('Customer Reviews') ?></h1>
        <a href="/Reviews/create" class="create-review-button"><?= __('Post a Review') ?></a>
        <section id="reviews">
            <?php if (empty($data['reviews'])): ?>
                <p><?= __('No reviews at the moment.') ?></p>
                
            <?php else: ?>
                <?php foreach ($data['reviews'] as $review): ?>
                    <div class="review-item">
                        <h3><?= htmlspecialchars($review->firstName) ?>         <?= htmlspecialchars($review->lastName) ?></h3>

                        <div class="star-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="<?= $i <= $review->rating ? 'filled' : '' ?>">&#9733;</span>
                            <?php endfor; ?>
                        </div>

                        <p><?= nl2br(htmlspecialchars($review->text)) ?></p>

                        <small><?= __('Posted on:') ?>         <?= htmlspecialchars($review->datePosted) ?></small>
                        
                        <?php if (isset($_SESSION['customerID']) && $_SESSION['customerID'] == $review->customerID): ?>
                            <a href="/Reviews/edit/<?= $review->reviewID ?>" class="button edit-button"><?= __('Edit') ?></a>
                            <a href="/Reviews/delete/<?= $review->reviewID ?>" class="button delete-button"><?= __('Delete') ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
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
                <p> <?= __('Phone Number:') ?> (514) 799-4881 <br>
                    <?= __('Email:') ?> MKCleanersMTL@gmail.com <br>
                    <?= __('Instagram:') ?> mkcleanersmtl</p>
            </div>
        </div>

        <div style="text-align: center; padding-top: 20px;">
            <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
        </div>
    </footer>
</body>

</html>