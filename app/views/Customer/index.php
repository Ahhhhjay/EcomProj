<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Customer Profile') ?></title>
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

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        main {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1,
        h2 {
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

        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .modify-btn {
            background-color: #4CAF50;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .main-btn {
            background-color: #555;
        }

        footer {
            background-color: #89CFF0;
            color: white;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>
    <header>
        <h1><?= __('CleanIt Services - Customer Profile') ?></h1>
    </header>

    <main>
        <dl>
            <dt><?= __('First name:') ?></dt>
            <dd><?= $customer->firstName ?></dd>
            <dt><?= __('Last name:') ?></dt>
            <dd><?= $customer->lastName ?></dd>
            <dt><?= __('Email:') ?></dt>
            <dd><?= $customer->Email ?></dd>
            <dt><?= __('Address:') ?></dt>
            <dd><?= $customer->Address ?></dd>
        </dl>

        <div>
            <button onclick="location.href='/Customer/update'"
                class="modify-btn"><?= __('Update my profile') ?></button>
            <button onclick="location.href='/Customer/delete';"
                class="delete-btn"><?= __('Delete my profile') ?></button>
            <button onclick="location.href='/'" class="main-btn"><?= __('Return to main') ?></button>
        </div>

        <h2><?= __('Bookings') ?></h2>

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th><?= __('Date') ?></th>
                    <th><?= __('Time') ?></th>
                    <th><?= __('Description') ?></th>
                    <th><?= __('Total Price') ?></th>
                    <th><?= __('Category') ?></th>
                    <th><?= __('Frequency') ?></th>
                    <th><?= __('Status') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= htmlspecialchars($booking->bookingDate) ?></td>
                        <td><?= htmlspecialchars($booking->bookingTime) ?></td>
                        <td><?= htmlspecialchars($booking->description) ?></td>
                        <td>$<?= htmlspecialchars(number_format($booking->totalPrice, 2)) ?></td>
                        <td><?= htmlspecialchars($booking->category) ?></td>
                        <td><?= htmlspecialchars($booking->frequency) ?></td>
                        <td><?= htmlspecialchars($booking->status) ?></td>
                        <td>
                            <button onclick="location.href='/Booking/modify/<?= $booking->bookingID ?>'"
                                style="margin-right: 5px; padding: 5px 10px; background-color: #4CAF50; color: white; border: none; border-radius: 4px;"><?= __('Edit') ?></button>
                            <button onclick="location.href='/Booking/delete/<?= $booking->bookingID ?>';"
                                style="padding: 5px 10px; background-color: #f44336; color: white; border: none; border-radius: 4px;"><?= __('Delete') ?></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
    </footer>
</body>

</html>