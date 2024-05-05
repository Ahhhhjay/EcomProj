<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Review - MKCleaners MTL</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            color: #333;
            background-color: #f4faff;
        }
        header, footer {
            background-color: #89CFF0;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        nav {
            background-color: #ffffff;
            text-align: center;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav a {
            margin: 0 20px;
            text-decoration: none;
            color: #89CFF0;
            font-weight: 500;
            font-size: 20px;
        }
        nav a:hover {
            color: #66afe9;
        }
        main {
            padding: 40px 20px;
            text-align: center;
        }
        .button {
            padding: 10px 20px;
            color: white;
            background-color: #f44336; /* Red for delete action */
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #da190b; /* Darker red on hover */
        }
        .cancel-button {
            background-color: #ccc; /* Grey for cancel action */
            margin-left: 20px;
        }
        .cancel-button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <header>
        <h1>MKCleaners MTL - Delete Review</h1>
    </header>
    <nav>
        <a href="/Home/index">Home</a>
        <a href="/Reviews/index">Reviews</a>
        <a href="/Customer/index">Profile</a>
    </nav>
    <main>
        <h2>Are you sure you want to delete this review?</h2>
        <form action="/Reviews/delete/<?= $reviewID ?>" method="POST">
            <button type="submit" class="button">Confirm Delete</button>
            <a href="/Reviews/index" class="button cancel-button">Cancel</a>
        </form>
    </main>
    <footer>
        <p>© 2024 All Rights Reserved | MKCleaners MTL</p>
    </footer>
</body>
</html>
