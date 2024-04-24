<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanIt - Cleaning Services Booking</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            color: #333;
            background-color: #f4faff;
        }
        header {
            background-color: #89CFF0;
            padding: 0;
        }
        header img {
            width: 100%;
            height: 250px;
            display: block;
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
        footer {
            background-color: #89CFF0;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            margin: auto;
            width: 80%;
            max-width: 600px;
        }
        label {
            margin-right: 20px;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            width: 95%;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #89CFF0;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #66afe9;
        }
        .book-now {
            background-color: #89CFF0;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            display: inline-block; /* Allows for margin and alignment */
            margin-top: 20px;
        }

        .book-now:hover {
            background-color: #66afe9;
        }
    </style>
</head>
<body>
    <header>
        <img src="/Images/MKCleaningLogo.png" alt="CleanIt Logo">
    </header>
    <nav>
        <a href="/Home/index">Home</a>
        <a href="#about-us">About Us</a>
        <a href="#promotions">Promotions</a>
        <a href="#reviews">Leave a Review</a>
    </nav>
    <main>
        <div class="form-section">
            <h1>Book Your Cleaning Service</h1>
            <form action="/submit-your-booking" method="post">
                <label for="Description">Description of the type of cleaning:</label>
                <input type="text" id="Description" name="Description" required>
                <br>
                <label for="type">The type of residence:</label>
                <br>
                <br>
                <label for="commercial">Commercial</label>
                <input type="radio" id="commercial" name="type" value="250">
                <label for="residential">Residential</label>
                <input type="radio" id="residential" name="type" value="100" checked>
                <br>
                <a href="/Home/Complete" class="book-now">Continue</a>
            </form>
        </div>
    </main>
    <footer>
        © 2024 All Rights Reserved | MKCleaning
    </footer>
</body>
</html>
