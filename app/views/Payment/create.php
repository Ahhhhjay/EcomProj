<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Payment Page - CleanIt Services') ?></title>
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
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input,
        select,
        .form {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="submit"],
        .form {
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        .form:hover {
            background-color: #66afe9;
        }

        @media (max-width: 600px) {
            form {
                width: 90%;
                margin: 0 auto;
            }
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4faff;
        }

        .promo-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .promo-row input,
        .promo-row button {
            flex: 1;
            margin-right: 10px;
        }

        .promo-row button {
            flex: none;
            width: auto;
            padding: 8px 15px;
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
        <form action="" method="POST">
            <h1><?= __('Payment Details') ?></h1>

            <label for="cardName"><?= __('Cardholder Name:') ?></label>
            <input type="text" id="cardName" name="cardName" required
                value="<?= htmlspecialchars($_SESSION['formData']['cardName'] ?? '') ?>" />

            <label for="cardNumber"><?= __('Card Number:') ?></label>
            <input type="text" id="cardNumber" name="cardNumber" required
                value="<?= htmlspecialchars($_SESSION['formData']['cardNumber'] ?? '') ?>" />

            <label for="expirationDate"><?= __('Expiration Date (MM/YY):') ?></label>
            <input type="text" id="expirationDate" name="expirationDate" required
                value="<?= htmlspecialchars($_SESSION['formData']['expirationDate'] ?? '') ?>" />

            <label for="cvv"><?= __('CVV:') ?></label>
            <input type="text" id="cvv" name="cvv" required
                value="<?= htmlspecialchars($_SESSION['formData']['cvv'] ?? '') ?>" />

            <label for="postalCode"><?= __('Postal Code:') ?></label>
            <input type="text" id="postalCode" name="postalCode" required
                value="<?= htmlspecialchars($_SESSION['formData']['postalCode'] ?? '') ?>" />

            <label for="billingAddress"><?= __('Billing Address:') ?></label>
            <input type="text" id="billingAddress" name="billingAddress" required
                value="<?= htmlspecialchars($_SESSION['formData']['billingAddress'] ?? '') ?>" />

            <section>
                <h2><?= __('Price Summary') ?></h2>
                <table>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <th><?= __('Amount') ?></th>
                    </tr>
                    <tr>
                        <td><?= __('Base Price:') ?></td>
                        <td>$<?= htmlspecialchars(number_format($booking['basePrice'], 2)) ?></td>
                    </tr>
                    <tr>
                        <td><?= __('Rate per Square Foot:') ?></td>
                        <td>$<?= htmlspecialchars(number_format($booking['ratePerSquareFoot'], 2)) ?></td>
                    </tr>
                    <tr>
                        <td><?= __('Original Price:') ?></td>
                        <td>$<?= htmlspecialchars(number_format($_SESSION['bookingData']['basePrice'] + $_SESSION['bookingData']['ratePerSquareFoot'], 2)) ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= __('Discount Applied:') ?></td>
                        <td>$<?= htmlspecialchars(number_format((($_SESSION['bookingData']['basePrice'] + $_SESSION['bookingData']['ratePerSquareFoot']) - $_SESSION['finalPrice']) ?? 0, 2)) ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?= __('Total Price:') ?></strong></td>
                        <td>$<?= htmlspecialchars(number_format($_SESSION['finalPrice'] ?? 0, 2)) ?></td>
                    </tr>
                </table>

            </section>
            <input type="submit" value="<?= __('Submit Payment') ?>">
            <button class="form" onclick="window.location.href='?action=cancel'"
                type="button"><?= __('Cancel') ?></button>
        </form>
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
<script>
    function formatExpirationDate() {
        const expirationInput = document.getElementById('expirationDate');
        const expirationValue = expirationInput.value;

        const [month, year] = expirationValue.split('/');

        if (month.length === 2 && year.length === 2) {
            const formattedDate = `20${year}-${month}-01`;
            expirationInput.value = formattedDate;
        }
    }
</script>

</html>