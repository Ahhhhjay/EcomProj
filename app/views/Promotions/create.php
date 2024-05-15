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

        input,
        select,
        textarea,
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

            header,
            footer {
                text-align: center;
            }
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
    </style>
</head>

<body>
    <header>
        <h1><?= __('Create Promotions') ?></h1>
    </header>
    <main>
        <form action="/Promotions/create" method="post">
            <h1><?= __('Book Your Cleaning Service') ?></h1>
            <label for="description"><?= __('Description of Promotion:') ?></label>
            <input type="text" id="description" name="description" required />

            <label for="code"><?= __('Promotion Code:') ?></label>
            <input type="text" id="code" name="code" required />

            <label for="discountRate"><?= __('Enter the discount rate:') ?></label>
            <input type="number" id="discountRate" name="discountRate" step="0.01" required>


            <label for="validFrom"><?= __('Start Date:') ?></label>
            <input type="date" id="validFrom" name="validFrom" required>

           
            <label for="validTo"><?= __('End Date:') ?></label>
            <input type="date" id="validTo" name="validTo" required>

        

            <input type="submit" value="<?= __('Create Promotion') ?>">
            <button id="cancel" onclick="location.href='Admin/'"><?= __('Cancel') ?></button>
        </form>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
    </footer>
</body>

</html>