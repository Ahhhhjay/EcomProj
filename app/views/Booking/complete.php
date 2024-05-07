<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Booking - CleanIt Services</title>
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
        <h1>Confirm Booking</h1>
    </header>
    <main>
        <dl>
            <dt>Booking Date:</dt>
            <dd><?= htmlspecialchars($data->bookingDate) ?></dd>
            <dt>Booking Time:</dt>
            <dd><?= htmlspecialchars($data->bookingTime) ?></dd>
            <dt>Frequency:</dt>
            <dd><?= htmlspecialchars($data->Frequency) ?></dd>
            <dt>Address:</dt>
            <dd><?= htmlspecialchars($data->Address) ?></dd>
            <dt>Description:</dt>
            <dd><?= htmlspecialchars($data->description) ?></dd>
            <dt>Category:</dt>
            <dd><?= htmlspecialchars($data->Category) ?></dd>
        </dl>
        <div class="links">
            <a href='/Booking/modify?bookingID=<?= htmlspecialchars($data->bookingID) ?>'
                style="background-color: #4CAF50;">Modify my booking</a> |
            <a href='/Booking/delete?bookingID=<?= htmlspecialchars($data->bookingID) ?>'
                style="background-color: #f44336;"
                onclick="return confirm('Are you sure you want to delete this booking?');">Delete my booking</a> |
            <a href='/Home/index' style="background-color: #555;">Finish Booking</a>
        </div>
    </main>
    <footer>
        © 2024 All Rights Reserved | Totally not fake website
    </footer>
</body>

</html>