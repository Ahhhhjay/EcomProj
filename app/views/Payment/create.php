<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Payment Page - CleanIt Services') ?></title>
    <style>
        body { 
            font-family: 'Roboto', sans-serif; margin: 0; background-color: #f4faff; color: #333; 
        }
        header { 
            background-color: #89CFF0; padding: 10px; text-align: center; color: white; 
        }
        main { 
            padding: 20px; display: flex; justify-content: center; align-items: center; 
        }
        form { 
            background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 100%; max-width: 500px; margin: auto; 
        }
        label { 
            display: block; margin-top: 10px; color: #555;
        }
        input, select, button { 
            width: calc(100% - 22px); padding: 10px; margin-top: 5px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ddd; box-sizing: border-box; 
        }
        input[type="submit"], button { 
            background-color: #89CFF0; color: white; border: none; cursor: pointer; transition: background-color 0.3s; 
        }
        input[type="submit"]:hover, button:hover { 
            background-color: #66afe9; }

        footer { 
            background-color: #89CFF0; color: white; padding: 10px; text-align: center; width: 100%; position: fixed; bottom: 0; 
        }
        @media (max-width: 600px) { 
            form { width: 90%; margin: 0 auto; } header, footer { text-align: center; } 
        }
    </style>
</head>
<body>
    <header>
        <h1><?= __('CleanIt - Enter Your Payment Details') ?></h1>
    </header>
    <main>
        <form action="/Payment/create" method="post">
            <h1><?= __('Payment Details') ?></h1>
            <label for="cardName"><?= __('Cardholder Name:') ?></label>
            <input type="text" id="cardName" name="cardName" required />

            <label for="cardNumber"><?= __('Card Number:') ?></label>
            <input type="text" id="cardNumber" name="cardNumber" required />

            <label for="expirationDate"><?= __('Expiration Date (MM/YY):') ?></label>
            <input type="text" id="expirationDate" name="expirationDate" required />

            <label for="cvv"><?= __('CVV:') ?></label>
            <input type="text" id="cvv" name="cvv" required />

            <label for="postalCode"><?= __('Postal Code:') ?></label>
            <input type="text" id="postalCode" name="postalCode" required />

            <label for="billingAddress"><?= __('Billing Address:') ?></label>
            <input type="text" id="billingAddress" name="billingAddress" required />

            <input type="submit" value="<?= __('Submit Payment') ?>">
            <button id="cancel" onclick="location.href='/'"><?= __('Cancel') ?></button>
        </form>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
    </footer>
</body>
</html>
