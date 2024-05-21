<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Update Profile - CleanIt Services') ?></title>
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
            height: 80vh;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input,
        select,
        textarea,
        .cancel {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="submit"],
        .cancel[type="button"] {
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        .cancel[type="button"]:hover {
            background-color: #66afe9;
        }

        #frequencyMessage {
            display: none; /* Hidden by default */
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
        <form method="post" action="">
            <input type="hidden" name="bookingID" value="<?= htmlspecialchars($data->bookingID) ?>">
            <label><?= __('Booking Date:') ?>
                <input type="date" class="form-control" name="bookingDate"
                    value="<?= htmlspecialchars($data->bookingDate) ?>" required>
            </label>
            <label><?= __('Booking Time:') ?>
                <input type="time" class="form-control" name="bookingTime"
                    value="<?= htmlspecialchars($data->bookingTime) ?>" required>
            </label>
            <label><?= __('Frequency:') ?>
                <select id="frequency" name="Frequency">
                    <option value=""><?= __('Please Select') ?></option>
                    <option value="One-time" <?= $data->frequency == 'One-time' ? 'selected' : '' ?>><?= __('One-time') ?>
                    </option>
                    <option value="Weekly" <?= $data->frequency == 'Weekly' ? 'selected' : '' ?>><?= __('Weekly') ?></option>
                    <option value="Bi-Weekly" <?= $data->frequency == 'Bi-Weekly' ? 'selected' : '' ?>><?= __('Bi-Weekly') ?>
                    </option>
                    <option value="Monthly" <?= $data->frequency == 'Monthly' ? 'selected' : '' ?>><?= __('Monthly') ?>
                    </option>
                </select>
                <textarea id="frequencyMessage" name="frequencyMessage" rows="3" placeholder=<?= __('Please confirm your availability for all scheduled dates.') ?>></textarea>
            </label>
            <input type="submit" value="<?= __('Update') ?>">
            <button class="cancel"type="button" onclick="location.href='/Customer/';"><?= __('Cancel') ?></button>
        </form>
    </main>
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
    <script>
        document.getElementById('frequency').addEventListener('change', function() {
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