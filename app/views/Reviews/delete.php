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
        footer h3 {
        color: #ffffff; 
        margin-bottom: 10px;
        }

        footer p, footer a {
            color: #d0e8f2;
        }
        .button {
            padding: 10px 20px;
            color: white;
            background-color: #f44336; 
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #da190b; 
        }
        .cancel-button {
            background-color: #ccc; 
            margin-left: 20px;
        }
        .cancel-button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <<header>
        <img src="/Images/MKCleaningLogo.png" alt="CleanIt Logo">
    </header>
    <nav>
        <a href="/Home/index">Home</a>
        <a href="#about-us">About Us</a>
        <a href="#promotions">Promotions</a>
        <a href="/Reviews/index">Leave a Review</a>
        <a href="/Customer/index">My Profile</a>
    </nav>
    <main>
        <h2>Are you sure you want to delete this review?</h2>
        <form action="/Reviews/delete/<?= $reviewID ?>" method="POST">
            <button type="submit" class="button">Confirm Delete</button>
            <a href="/Reviews/index" class="button cancel-button">Cancel</a>
        </form>
    </main>
    <footer style="background-color: #89CFF0; color: white; padding: 20px 0; font-family: 'Roboto', sans-serif;">
    <div style="display: flex; justify-content: space-around; align-items: start; flex-wrap: wrap; padding: 0 10%;">
        <div style="flex: 1; min-width: 200px; margin: 10px;">
            <h3>MKCleaners MTL</h3>
            <p>Discover our cleaning company, where your home is your best friend! Enjoy a spotless home without lifting a finger!</p>
        </div>
        <div style="flex: 1; min-width: 250px; margin: 10px;">
            <h3>Contact info.</h3>
            <p> Phone Number: (514) 799-4881 <br>
            Email: MKCleanersMTL@gmail.com <br>
            Instagram: mkcleanersmtl</p>
        </div>
    </div>
    <div style="text-align: center; padding-top: 20px;">
        © 2024 All Rights Reserved | MKCleaning
    </div>
</footer>
</body>
</html>




