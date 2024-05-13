<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Complete Booking - CleanIt Services') ?></title>
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
            padding: 10px 20px;
            text-align: center;
            color: white;
        }

        main {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #2a587a;
        }

        dl {
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        dt {
            font-weight: bold;
            color: #555;
        }

        dd {
            margin-bottom: 20px;
            color: #666;
        }

        .links a {
            padding: 10px 20px;
            color: white;
            background-color: #89CFF0;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .links a:hover {
            background-color: #66afe9;
            color: white;
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
        <h1><?= __('CleanIt Services - Booking Completed') ?></h1>
    </header>
    <main>
        <dl>
            <dt><?= __('Booking Date:') ?></dt>
            <dd><?= htmlspecialchars($data->bookingDate) ?></dd>
            <dt><?= __('Booking Time:') ?></dt>
            <dd><?= htmlspecialchars($data->bookingTime) ?></dd>
            <dt><?= __('Frequency:') ?></dt>
            <dd><?= htmlspecialchars($data->Frequency) ?></dd>
            <dt><?= __('Address:') ?></dt>
            <dd><?= htmlspecialchars($data->Address) ?></dd>
            <dt><?= __('Description:') ?></dt>
            <dd><?= htmlspecialchars($data->description) ?></dd>
            <dt><?= __('Category:') ?></dt>
            <dd><?= htmlspecialchars($data->Category) ?></dd>
        </dl>
        <div class="links">
            <a href='/Booking/modify/<?= htmlspecialchars($data->bookingID) ?>'
                style="background-color: #4CAF50;"><?= __('Modify my booking') ?></a> |
            <a href='/Booking/delete/<?= htmlspecialchars($data->bookingID) ?>' style="background-color: #f44336;"
                onclick="location.href='/Booking/delete/<?= $data->bookingID ?>';"><?= __('Delete my booking') ?></a>
            |
            <a href='/' style="background-color: #555;"><?= __('Finish Booking') ?></a>
        </div>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Totally not fake website') ?>
    </footer>
</body>

</html>