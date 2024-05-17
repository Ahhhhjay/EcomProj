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
            /* Adjust height to vertically center the form */
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
            padding: 10px 20px;
        }

        input[type="submit"]:hover,
        .cancel[type="button"]:hover {
            background-color: #66afe9;
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
        <form method="post" action="">
            <div class="form-group">
                <label><?= __('First Name') ?>:
                    <input type="text" class="form-control" name="firstName"
                        placeholder="<?= __('Enter your First Name') ?>"
                        value="<?= htmlspecialchars($data->firstName) ?>" required>
                </label>
                <label><?= __('Last Name') ?>:
                    <input type="text" class="form-control" name="lastName"
                        placeholder="<?= __('Enter your Last Name') ?>" value="<?= htmlspecialchars($data->lastName) ?>"
                        required>
                </label>

                <label><?= __('Email') ?>:
                    <input type="email" class="form-control" name="Email" placeholder="<?= __('Enter your email') ?>"
                        value="<?= htmlspecialchars($data->Email) ?>" required>
                </label>
            </div>

            <div class="form-group">
                <label><?= __('Contact Number') ?>:
                    <input type="tel" class="form-control" name="contactNumber"
                        placeholder="<?= __('Enter your contact number') ?>"
                        value="<?= htmlspecialchars($data->contactNumber) ?>" required>
                </label>
            </div>

            <div class="form-group">
                <label><?= __('Address') ?>:
                    <input type="text" class="form-control" name="Address" placeholder="<?= __('Enter your address') ?>"
                        value="<?= htmlspecialchars($data->Address) ?>" required>
                </label>
            </div>

            <div class="form-group">
                <label><?= __('Password') ?> (<?= __('leave blank if you do not wish to change it') ?>):
                    <input type="password" class="form-control" name="passwordHash"
                        placeholder="<?= __('Enter new password') ?>">
                </label>
            </div>

            <input type="submit" name="update" value="<?= __('Update') ?>">
            <button class="cancel" type="button" onclick="location.href='/Customer/';"><?= __('Cancel') ?></button>
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
</body>

</html>