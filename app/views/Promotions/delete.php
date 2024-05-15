<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Delete Profile - CleanIt Services') ?></title>
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

        dl {
            margin-top: 20px;
        }

        dt {
            color: #555;
        }

        dd {
            margin: 0 0 20px 0;
            color: #666;
        }

        input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #66afe9;
        }

        a {
            color: #89CFF0;
            text-decoration: none;
            margin-left: 10px;
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
        <h1><?= __('Delete Promotion') ?></h1>
    </header>
    <main>
        <form method="post" action="">
            <h2><?= __('Promotions Information') ?></h2>
            <dt><?= __('Description:') ?></dt>
            <dd><?= htmlspecialchars($data->description) ?></dd>
            <dt><?= __('Promotion Code:') ?></dt>
            <dd><?= htmlspecialchars($data->code) ?></dd>
            <dt><?= __('Discount Rate:') ?></dt>
            <dd><?= htmlspecialchars($data->discountRate) ?></dd>
            <dt><?= __('Start Date:') ?></dt>
            <dd><?= htmlspecialchars($data->validFrom) ?></dd>
            <dt><?= __('End Date:') ?></dt>
            <dd><?= htmlspecialchars($data->validTo) ?></dd>
            <p><?= __('Do you want to proceed with the deletion of the promotion?') ?></p>
            <input type="submit" name="action" value="<?= __('Delete') ?>">
            <a href='/Promotions/index'><?= __('Cancel') ?></a>
        </form>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | CleanIt Services') ?>
    </footer>
</body>

</html>