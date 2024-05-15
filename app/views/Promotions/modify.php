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
        <h1><?= __('Modify Promotion') ?></h1>
    </header>
    <main>
        <form method="post" action="">
            <input type="hidden" name="promotionID" value="<?= htmlspecialchars($data->promotionID) ?>">
            <label><?= __('Description:') ?>
                <input type="text" class="form-control" name="description"
                    value="<?= htmlspecialchars($data->description) ?>" required>
            </label>
            <label><?= __('Code:') ?>
                <input type="text" class="form-control" name="code"
                    value="<?= htmlspecialchars($data->code) ?>" required>
            </label>
            <label><?= __('Discount Rate:') ?>
                <input type="number" class="form-control" name="discountRate"
                    value="<?= htmlspecialchars($data->discountRate) ?>" required>
            </label>
            <label><?= __('Start Date:') ?>
                <input type="date" class="form-control" name="validFrom"
                    value="<?= htmlspecialchars($data->validFrom) ?>" required>
            </label>
            <label><?= __('End Date:') ?>
                <input type="date" class="form-control" name="validTo"
                    value="<?= htmlspecialchars($data->validTo) ?>" required>
            </label>
          
            <input type="submit" value="<?= __('Update') ?>">
            <button type="button" onclick="location.href='/Promotions/index';"><?= __('Cancel') ?></button>
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