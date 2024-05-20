<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Complete Booking - CleanIt Services') ?></title>
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
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #2a587a;
        }

        dl {
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        dt {
            font-weight: bold;
            color: #555;
        }

        dd {
            margin-bottom: 20px;
            color: #666;
        }

        .links a {
            padding: 10px 20px;
            color: white;
            background-color: #89CFF0;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .links a:hover {
            background-color: #66afe9;
            color: white;
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
        <a href="/Promotions/"><?= __('Promotions') ?></a>
        <a href="/Reviews/"><?= __('Leave a Review') ?></a>
        <a href="/Customer/"><?= __('My Profile') ?></a>
        <?php if (isset($_SESSION['customerID'])): ?>
            <button onclick="location.href='/Customer/logout'"><?= __('Logout') ?></button>
        <?php else: ?>
            <button onclick="location.href='/Customer/login'"><?= __('Login') ?></button>
            <button onclick="location.href='/Customer/register'"><?= __('Sign Up') ?></button>
        <?php endif; ?>
    </nav>
    <main>
        <h2><?= __('Booking Details') ?></h2>
        <dl>
        <dt><?= __('Booking Date:') ?></dt>
        <dd><?= htmlspecialchars($booking->bookingDate) ?></dd>
            <dt><?= __('Booking Time:') ?></dt>
            <dd><?= htmlspecialchars($booking->bookingTime) ?> -
                <?= date('H:i', strtotime($booking->bookingTime . ' +2 hour')) ?></dd>
            <dt><?= __('Frequency:') ?></dt>
            <dd><?= htmlspecialchars($data['booking']->Frequency) ?></dd>
            <dt><?= __('Address:') ?></dt>
            <dd><?= htmlspecialchars($booking->Address) ?></dd>
            <dt><?= __('Description:') ?></dt>
            <dd><?= htmlspecialchars($booking->description) ?></dd>
            <dt><?= __('Category:') ?></dt>
            <dd><?= htmlspecialchars($booking->Category) ?></dd>
            <dt><?= __('Price:') ?></dt>
            <dd><?= htmlspecialchars('$'.$payment->total_price) ?></dd>
        </dl>

        <h2><?= __('Payment Details') ?></h2>
        <dl>
            <dt><?= __('Cardholder Name:') ?></dt>
            <dd><?= htmlspecialchars($payment->cardName) ?></dd>
            <dt><?= __('Card Number:') ?></dt>
            <dd><?= htmlspecialchars($payment->cardNumber) ?></dd>
            <dt><?= __('Expiration Date:') ?></dt>
            <dd><?= htmlspecialchars($payment->expirationDate) ?></dd>
            <dt><?= __('Postal Code:') ?></dt>
            <dd><?= htmlspecialchars($payment->postalCode) ?></dd>
            <dt><?= __('Billing Address:') ?></dt>
            <dd><?= htmlspecialchars($payment->billingAddress) ?></dd>
            <dt><?= __('Payment Date:') ?></dt>
            <dd><?= htmlspecialchars($payment->paymentDate) ?></dd>
        </dl>
        <div class="links">
            <a href='/Booking/modify/<?= htmlspecialchars($booking->bookingID) ?>'
                style="background-color: #4CAF50;"><?= __('Modify my booking') ?></a> |
            <a href='/Booking/delete/<?= htmlspecialchars($booking->bookingID) ?>'
                style="background-color: #f44336;"><?= __('Delete my booking') ?></a> |
            <a href='/' style="background-color: #555;"><?= __('Finish Booking') ?></a>
        </div>
    </main>
</body>
<footer style="background-color: #89CFF0; color: white; padding: 20px 0; font-family: 'Roboto', sans-serif; padding-top: 10px;">
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
        <?=__('&copy; 2024 All Rights Reserved')?>
        </div>
    </footer>
</html>
