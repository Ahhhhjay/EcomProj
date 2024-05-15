<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Apply Promotion - CleanIt Services') ?></title>
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
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input, button {
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
    </style>
</head>

<body>
    <header>
        <h1><?= __('Enter Your Promotion Code') ?></h1>
    </header>
    <main>
        <form action="/Payment" method="get"> <!-- Make sure to update the form action to the correct route -->
            <h1><?= __('Promotion Code') ?></h1>
            <label for="promoCode"><?= __('Promotion Code:') ?></label>
            <input type="text" id="promoCode" name="promoCode" placeholder="Enter code here" required />

            <button type="submit"><?= __('Apply Code and Proceed') ?></button>
            <button id="cancel" onclick="location.href='/Payment/create'"><?= __('No Thanks') ?></button>
        </form>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | CleanIt Services') ?>
    </footer>
</body>

</html>
