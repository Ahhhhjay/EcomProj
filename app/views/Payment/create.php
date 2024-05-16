<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Payment Page - CleanIt Services') ?></title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #f4faff;
            color: #333;
        }

        header {
            background-color: #89CFF0;
            padding: 10px;
            text-align: center;
            color: white;
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
        button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="submit"],
        button {
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #66afe9;
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

        @media (max-width: 600px) {
            form {
                width: 90%;
                margin: 0 auto;
            }

            header,
            footer {
                text-align: center;
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

        th, td {
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

    .promo-row input, .promo-row button {
        flex: 1; /* Adjust flex value to manage width proportionally */
        margin-right: 10px; /* Space between the input and the button */
    }

    .promo-row button {
        flex: none; /* Prevent the button from growing */
        width: auto; /* Adjust width as needed */
        padding: 8px 15px; /* Smaller padding */
    }

    /* Specific adjustments to decrease overall form size and align left */
    form {
        width: 75%; /* Smaller form width */
        margin-left: 0; /* Align to the left */
    }
    </style>
</head>
<body>
    <header>
        <h1><?= __('CleanIt - Enter Your Payment Details') ?></h1>
    </header>
    <main>
        <form action="" method="post">
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
                    <label for="promoCode"><?= __('Promo Code:') ?></label>

                    <tr>
                        <td><strong><?= __('Total Price:') ?></strong></td>
                        <td id="totalPrice">$<?= htmlspecialchars(number_format($_SESSION['bookingData']['basePrice'] + $_SESSION['bookingData']['ratePerSquareFoot'], 2)) ?></td>
                    </tr>
                </table>
                <div class="promo-row">
                    <input type="text" id="promoCode" name="promoCode" placeholder="Enter promo code" required />
                    <button type="button" onclick="applyPromoCode()">Apply Promo Code</button>
                </div>
            </section>
            <input type="submit" value="<?= __('Submit Payment') ?>">
            <button id="cancel" onclick="location.href='/'" type="button"><?= __('Cancel') ?></button>
        </form>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
    </footer>
</body>
<script>
        function formatExpirationDate() {
            const expirationInput = document.getElementById('expirationDate');
            const expirationValue = expirationInput.value;

            const [month, year] = expirationValue.split('/');

            if (month.length === 2 && year.length === 2) {
                // Convert to YYYY-MM-DD format
                const formattedDate = `20${year}-${month}-01`;
                expirationInput.value = formattedDate;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            form.addEventListener('submit', formatExpirationDate);
        });

        function applyPromoCode() {
            var promoCode = document.getElementById('promoCode').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/Promotions/applyPromoCode', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    if (response.isValid) {
                        // Update the total price display
                        document.getElementById('totalPrice').textContent = '$' + response.newTotal.toFixed(2);
                    } else {
                        alert('Invalid or expired promo code.');
                    }
                }
            };
            xhr.send('promoCode=' + encodeURIComponent(promoCode));
        }
    </script>
</html>