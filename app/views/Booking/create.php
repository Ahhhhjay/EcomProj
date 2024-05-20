<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Booking Page - CleanIt Services') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-34NcOtnLZVfE7CjMlax4KbtvNNgz51oBwkzKQzIof6qBMXaQjJt+VcckF3gkmhPLPV1aMmAwOeq3XGAnK57VDw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        textarea,
        #cancel {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="submit"],
        #cancel {
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        #cancel:hover {
            background-color: #66afe9;
        }

        .radio-group {
            display: flex;
            align-items: center;
        }

        .radio-group label {
            margin-right: 10px;
            margin-bottom: 0;
        }

        .radio-group input[type="radio"] {
            vertical-align: middle;
            margin-bottom: 0;
        }

        #frequencyMessage {
            display: none;
            /* Hidden by default */
        }

        @media (max-width: 600px) {
            form {
                width: 90%;
                margin: 0 auto;
            }
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
        <form action="/Booking/create" method="post">
            <h1><?= __('Book Your Cleaning Service') ?></h1>
            <label for="description"><?= __('Description of the type of cleaning:') ?></label>
            <input type="text" id="description" name="description" required />

            <label for="area"><?= __('Enter area of residence (square feet):') ?></label>
            <input type="number" id="area" name="area" step="0.01" required>

            <label for="category"><?= __('The type of residence:') ?></label>
            <div class="radio-group">
                <label for="commercial"><i class="fas fa-building"></i> <?= __('Commercial(x20.75)') ?></label>
                <input type="radio" id="commercial" name="category" value="Commercial">
                <label for="residential">
                    <i class="fas fa-home"></i> <?= __('Residential(x15.75)') ?>
                </label>
                <input type="radio" id="residential" name="category" value="Residential" checked>
            </div><br>



            <label for="bookingDate"><?= __('Booking Date:') ?></label>
            <input type="date" id="bookingDate" name="bookingDate" required>

            <label for="bookingTime"><?= __('Booking Time:') ?></label>
            <input type="time" id="bookingTime" name="bookingTime" required step="7200" min="8:00" max="22:00">

            <label for="frequency"><?= __('Frequency:') ?></label>
            <select id="frequency" name="frequency">
                <option value=""><?= __('Please Select') ?></option>
                <option value="One-time"><?= __('One-time') ?></option>
                <option value="Weekly"><?= __('Weekly') ?></option>
                <option value="Bi-Weekly"><?= __('Bi-Weekly') ?></option>
                <option value="Monthly"><?= __('Monthly') ?></option>
            </select>
            <textarea id="frequencyMessage" name="frequencyMessage" rows="3" placeholder=<?= __('Please confirm your availability for all scheduled dates."') ?>></textarea>

            <input type="submit" value="<?= __('Proceed to Payment') ?>" name="submit">
            <button id="cancel" onclick="location.href='/'"><?= __('Cancel') ?></button>
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

    <script>
        document.getElementById('frequency').addEventListener('change', function () {
            var textarea = document.getElementById('frequencyMessage');
            if (['Weekly', 'Bi-Weekly', 'Monthly'].includes(this.value)) {
                textarea.style.display = 'block';
            } else {
                textarea.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var year = today.getFullYear();
            var todayDate = year + '-' + month + '-' + day;

            document.getElementById('bookingDate').setAttribute('min', todayDate);
        });
    </script>
</body>

</html>