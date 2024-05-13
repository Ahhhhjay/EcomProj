<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Delete Review - MKCleaners MTL') ?></title>
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

        /* Updated nav styles from Reviews/index */
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

        footer h3 {
            color: #ffffff;
            margin-bottom: 10px;
        }

        footer p,
        footer a {
            color: #d0e8f2;
        }

        .button {
            padding: 10px 20px;
            color: white;
            background-color: #f44336;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #da190b;
        }

        .cancel-button {
            background-color: #ccc;
            margin-left: 20px;
        }

        .cancel-button:hover {
            background-color: #bbb;
        }

        .review-item {
            background-color: #ffffff;
            padding: 15px;
            margin: 10px auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
            min-width: 250px;
            max-width: 30%;
        }

        .star-rating .filled-star {
            color: #ffd700;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <header>
        <img src="/Images/MKCleaningLogo.png" alt="<?= __('CleanIt Logo') ?>">
    </header>

    <nav>
        <a href="/"><?= __('Home') ?></a>
        <a href="/About_Us/"><?= __('About Us') ?></a>
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
        <h2><?= __('Are you sure you want to delete this review?') ?></h2>
        <div class="review-item">
            <h4><?= htmlspecialchars($data->firstName) . ' ' . htmlspecialchars($data->lastName) ?></h4>
            <div class="star-rating">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <span class="<?= $i <= $data->rating ? 'filled-star' : 'empty-star' ?>">&#9733;</span>
                <?php endfor; ?>
            </div>
            <p><?= htmlspecialchars($data->text) ?></p>
            <small><?= __('Posted on: ') ?><?= date('M d, Y', strtotime($data->datePosted)) ?></small>
        </div>
        <form action="/Reviews/delete/<?= $data->reviewID ?>" method="POST">
            <button type="submit" class="button"><?= __('Confirm Delete') ?></button>
            <a href="/Reviews/" class="button cancel-button"><?= __('Cancel') ?></a>
        </form>
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