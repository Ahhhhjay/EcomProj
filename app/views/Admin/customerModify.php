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
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="submit"],
        button[type="button"] {
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            padding: 10px 20px;
        }

        input[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #66afe9;
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
        <h1><?= __('CleanIt Services - Profile Management') ?></h1>
    </header>

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
            <button type="button" onclick="location.href='/Customer/';"><?= __('Cancel') ?></button>
        </form>
    </main>

    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
    </footer>
</body>

</html>