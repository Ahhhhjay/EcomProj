<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Booking Page - CleanIt Services') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-34NcOtnLZVfE7CjMlax4KbtvNNgz51oBwkzKQzIof6qBMXaQjJt+VcckF3gkmhPLPV1aMmAwOeq3XGAnK57VDw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        input, select, textarea, button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="submit"], button {
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover, button:hover {
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
            display: none; /* Hidden by default */
        }

        @media (max-width: 600px) {
            form {
                width: 90%;
                margin: 0 auto;
            }

            header, footer {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1><?= __('CleanIt - Book Your Service') ?></h1>
    </header>
    <main>
        <form action="/Booking/create" method="post">
            <h1><?= __('Book Your Cleaning Service') ?></h1>
            <label for="description"><?= __('Description of the type of cleaning:') ?></label>
            <input type="text" id="description" name="description" required />

            <label for="area"><?= __('Enter area of residence (square feet):') ?></label>
            <input type="number" id="area" name="area" step="0.01" required>

            <label for="category"><?= __('The type of residence:') ?></label>
            <div class="radio-group">
                <label for="commercial"><i class="fas fa-building"></i> <?= __('Commercial') ?></label>
                <input type="radio" id="commercial" name="category" value="Commercial">
<<<<<<< HEAD
                <label for="residential"><i class="fas fa-home"></i> <?= __('Residential') ?></label>
=======
                <label for="residential">
                    <i class="fas fa-home"></i> <?= __('Residential') ?>
                </label>
>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296
                <input type="radio" id="residential" name="category" value="Residential" checked>
            </div><br>

            <label for="bookingDate"><?= __('Booking Date:') ?></label>
            <input type="date" id="bookingDate" name="bookingDate" required>

            <label for="bookingTime"><?= __('Booking Time:') ?></label>
            <input type="time" id="bookingTime" name="bookingTime" required step="7200" min="00:00" max="22:00">

            <label for="frequency"><?= __('Frequency:') ?></label>
            <select id="frequency" name="frequency">
                <option value=""><?= __('Please Select') ?></option>
                <option value="One-time"><?= __('One-time') ?></option>
                <option value="Weekly"><?= __('Weekly') ?></option>
                <option value="Bi-Weekly"><?= __('Bi-Weekly') ?></option>
                <option value="Monthly"><?= __('Monthly') ?></option>
            </select>
            <textarea id="frequencyMessage" name="frequencyMessage" rows="3" placeholder="Please confirm your availability for all scheduled dates."></textarea>

<<<<<<< HEAD
            <input type="submit" value="<?= __('Proceed to Payment') ?>">
=======
            <input type="submit" value="<?= __('Submit Booking') ?>">
>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296
            <button id="cancel" onclick="location.href='/'"><?= __('Cancel') ?></button>
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
