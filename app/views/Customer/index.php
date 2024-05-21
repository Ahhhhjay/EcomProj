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

        table {
            width: 100%;
            max-width: 1000px;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .actions .delete-btn {
            background-color: #f44336;
            color: white;
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

        <table>
            <thead>
                <tr>
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
                        <td class="actions">
                            <button onclick="location.href='/Booking/modify/<?= $booking->bookingID ?>'"
                                class="edit-btn"><?= __('Edit') ?></button>
                            <button onclick="location.href='/Booking/delete/<?= $booking->bookingID ?>';"
                                class="delete-btn"><?= __('Delete') ?></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

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