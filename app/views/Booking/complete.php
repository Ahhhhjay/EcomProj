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
            background-color: #f4faff;
            color: #333;
        }

        header {
            background-color: #89CFF0;
            padding: 10px 20px;
            text-align: center;
            color: white;
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

        footer {
            background-color: #89CFF0;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1><?= __('CleanIt Services - Booking Completed') ?></h1>
    </header>
    <main>
        <h2><?= __('Booking Details') ?></h2>
        <dl>
            <dt><?= __('Booking Date:') ?></dt>
            <dd><?= htmlspecialchars($data['booking']->bookingDate) ?></dd>
            <dt><?= __('Booking Time:') ?></dt>
<<<<<<< HEAD
            <dd><?= htmlspecialchars($data['booking']->bookingTime) ?></dd>
=======
            <dd><?= htmlspecialchars($data->bookingTime) ?> - <?= date('H:i', strtotime($data->bookingTime . ' +2 hour')) ?></dd>
>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296
            <dt><?= __('Frequency:') ?></dt>
            <dd><?= htmlspecialchars($data['booking']->frequency) ?></dd>
            <dt><?= __('Address:') ?></dt>
            <dd><?= htmlspecialchars($data['booking']->Address) ?></dd>
            <dt><?= __('Description:') ?></dt>
            <dd><?= htmlspecialchars($data['booking']->description) ?></dd>
            <dt><?= __('Category:') ?></dt>
            <dd><?= htmlspecialchars($data['booking']->category) ?></dd>
        </dl>

        <h2><?= __('Payment Details') ?></h2>
        <dl>

            <dt><?= __('Cardholder Name:') ?></dt>
            <dd><?= htmlspecialchars($data['payment']->cardName) ?></dd>
            <dt><?= __('Card Number:') ?></dt>
            <dd><?= htmlspecialchars($data['payment']->cardNumber) ?></dd>
            <dt><?= __('Expiration Date:') ?></dt>
            <dd><?= htmlspecialchars($data['payment']->expirationDate) ?></dd>
            <dt><?= __('Postal Code:') ?></dt>
            <dd><?= htmlspecialchars($data['payment']->postalCode) ?></dd>
            <dt><?= __('Billing Address:') ?></dt>
            <dd><?= htmlspecialchars($data['payment']->billingAddress) ?></dd>
            <dt><?= __('Payment Date:') ?></dt>
            <dd><?= htmlspecialchars($data['payment']->paymentDate) ?></dd>
        </dl>
        <div class="links">
<<<<<<< HEAD
            <a href='/Booking/modify/<?= htmlspecialchars($data->bookingID) ?>'
                style="background-color: #4CAF50;"><?= __('Modify my booking') ?></a> |
            <a href='/Booking/delete/<?= htmlspecialchars($data['booking']->bookingID) ?>' style="background-color: #f44336;"><?= __('Delete my booking') ?></a>
            <a href='/' style="background-color: #555;"><?= __('Finish Booking') ?></a>
=======
            <a href='/Booking/modify/<?= htmlspecialchars($data->bookingID) ?>' style="background-color: #4CAF50;">
                <?= __('Modify my booking') ?></a> |
            <a href='/Booking/delete/<?= htmlspecialchars($data->bookingID) ?>' style="background-color: #f44336;"
                onclick="return confirm('Are you sure you want to delete this booking?');">
                <?= __('Delete my booking') ?></a> |
            <a href='/' style="background-color: #555;">
                <?= __('Finish Booking') ?></a>
>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296
        </div>
    </main>
</body>
</html>
