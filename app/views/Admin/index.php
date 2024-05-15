<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('User Profile') ?></title>
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
            background-color: #89CFF0;
        }

        button:hover {
            background-color: #66afe9;
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

        tbody {
            text-align: center;
        }

        tbody td:nth-child(4) {
            text-align: left;
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
    </style>
</head>

<body>
    <header>
        <!-- Optional Header Content -->
    </header>
    <nav>
        <a href="/Admin/"><?= __('Bookings') ?></a>
        <a href="/Promotions/index"><?= __('Promotions') ?></a>
    </nav>
    <main>
        <h2><?= __('Bookings') ?></h2>
        <form action="/Admin/index" method="get" style="margin-bottom: 20px;">
            <input type="text" name="firstName" placeholder="First Name" value="<?= $_GET['firstName'] ?? '' ?>">
            <input type="text" name="lastName" placeholder="Last Name" value="<?= $_GET['lastName'] ?? '' ?>">
            <input type="text" name="email" placeholder="Email" value="<?= $_GET['email'] ?? '' ?>">
            <input type="date" name="date" value="<?= $_GET['date'] ?? '' ?>">
            <select name="category">
                <option value="">All Categories</option>
                <option value="Residential" <?= isset($_GET['category']) && $_GET['category'] == 'Residential' ? 'selected' : '' ?>>Residential</option>
                <option value="Commercial" <?= isset($_GET['category']) && $_GET['category'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
            </select>
            <select name="frequency">
                <option value="">Any Frequency</option>
                <option value="One-time" <?= isset($_GET['frequency']) && $_GET['frequency'] == 'One-time' ? 'selected' : '' ?>>One-time</option>
                <option value="Weekly" <?= isset($_GET['frequency']) && $_GET['frequency'] == 'Weekly' ? 'selected' : '' ?>>Weekly</option>
                <option value="Monthly" <?= isset($_GET['frequency']) && $_GET['frequency'] == 'Monthly' ? 'selected' : '' ?>>Monthly</option>
            </select>
            <select name="status">
                <option value="">Any Status</option>
                <option value="Scheduled" <?= isset($_GET['status']) && $_GET['status'] == 'Scheduled' ? 'selected' : '' ?>>Scheduled</option>
                <option value="Completed" <?= isset($_GET['status']) && $_GET['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select>
            <button type="submit">Search</button>
        </form>

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th><?= __('First Name') ?></th>
                    <th><?= __('Last Name') ?></th>
                    <th><?= __('Email') ?></th>
                    <th><?= __('Date') ?></th>
                    <th><?= __('Time') ?></th>
                    <th><?= __('Description') ?></th>
                    <th><?= __('Total Price') ?></th>
                    <th><?= __('Category') ?></th>
                    <th><?= __('Frequency') ?></th>
                    <th><?= __('Status') ?></th>
                    <th><?= __('Message') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $booking): ?>
                    <tr>
                        <td><?= htmlspecialchars($booking['firstName']) ?></td>
                        <td><?= htmlspecialchars($booking['lastName']) ?></td>
                        <td><?= htmlspecialchars($booking['Email']) ?></td>
                        <td><?= htmlspecialchars($booking['bookingDate']) ?></td>
                        <td><?= htmlspecialchars($booking['bookingTime']) ?></td>
                        <td><?= htmlspecialchars($booking['description']) ?></td>
                        <td>$<?= htmlspecialchars(number_format($booking['basePrice'] + $booking['ratePerSquareFoot'], 2)) ?>
                        </td>
                        <td><?= htmlspecialchars($booking['Category']) ?></td>
                        <td><?= htmlspecialchars($booking['Frequency']) ?></td>
                        <td><?= htmlspecialchars($booking['Status']) ?></td>
                        <td><?= htmlspecialchars($booking['message']) ?></td>
                        <td>
                            <button onclick="location.href='/Admin/modify/<?= $booking['bookingID'] ?>'"
                                style="margin-right: 5px; padding: 5px 10px; background-color: #4CAF50; color: white; border: none; border-radius: 4px;"><?= __('Edit') ?></button>
                            <button
                                onclick="location.href='/Admin/delete/<?= $booking['bookingID'] ?>';"
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