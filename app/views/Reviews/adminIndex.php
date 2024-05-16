<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Review Management - Admin Panel') ?></title>
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

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        main {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1,
        h2 {
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

        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            background-color: #89CFF0;
        }

        button:hover {
            background-color: #66afe9;
        }


        .modify-btn {
            background-color: #4CAF50;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .main-btn {
            background-color: #555;
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

        tbody {
            text-align: center;
        }

        tbody td:nth-child(4) {
            text-align: left;
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
        .star-rating .filled-star {
            color: #f5b301;
            font-size: 20px; 
        }

        .star-rating .empty-star {
            color: #ccc; 
            font-size: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1><?= __('Review Management') ?></h1>
    </header>
    <nav>
        <a href="/Admin/"><?= __('Dashboard') ?></a>
        <a href="/Customer/adminIndex"><?= __('Customers') ?></a>
        <a href="/Promotions/index"><?= __('Promotions') ?></a>
        <a href="/Reviews/adminIndex"><?= __('Reviews') ?></a>
        <button onclick="location.href='/Customer/logout'"><?= __('Logout') ?></button>
    </nav>
    <main>
        <h2><?= __('Reviews') ?></h2>
        <table>
            <thead>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <th><?= __('Rating') ?></th>
                    <th><?= __('Review Text') ?></th>
                    <th><?= __('Date Posted') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= htmlspecialchars($review->firstName . ' ' . $review->lastName) ?></td>
                    <td>
                        <div class="star-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="<?= $i <= $review->rating ? 'filled-star' : 'empty-star' ?>">&#9733;</span>
                            <?php endfor; ?>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($review->text) ?></td>
                    <td><?= htmlspecialchars($review->datePosted) ?></td>
                    <td>
                    <button
                        onclick="location.href='/Admin/reviewDelete/<?= $review->reviewID ?>';"
                        style="padding: 5px 10px; background-color: #f44336; color: white; border: none; border-radius: 4px;"><?= __('Delete') ?></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <?= __('&copy; 2024 All Rights Reserved | Admin Panel') ?>
    </footer>
</body>
</html>
