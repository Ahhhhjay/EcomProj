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
        textarea,
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
        }

        input[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #66afe9;
        }

        a {
            color: #89CFF0;
            text-decoration: none;
            display: block;
            margin-top: 15px;
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
        #frequencyMessage {
            display: none; /* Hidden by default */
        }
    </style>
</head>

<body>
    <header>
        <h1><?= __('CleanIt Services - Update Profile') ?></h1>
    </header>
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
                <textarea id="frequencyMessage" name="frequencyMessage" rows="3" placeholder="Please confirm your availability for all scheduled dates."></textarea>
            </label>
            <input type="submit" value="<?= __('Update') ?>">
            <button type="button" onclick="location.href='/Customer/';"><?= __('Cancel') ?></button>
        </form>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
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
    </script>
</body>

</html>