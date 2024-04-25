<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Profile - CleanIt Services</title>
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
            height: 80vh; /* Adjust height to vertically center the form */
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
        <h1>CleanIt - Profile Management</h1>
    </header>
    <main>
        <form method="post" action="">
            <h2>User profile</h2>
            <p>Do you want to proceed with the deletion of your profile?</p>
            <dl>
            <dt>First name:</dt>
            <dd><?= $data->firstName?></dd>
            <dt>Last name:</dt>
            <dd><?= $data->lastName ?></dd>
            <dt>Email:</dt>
            <dd><?= $data->Email ?></dd>
            <dt>Adress:</dt>
            <dd><?= $data->Address ?></dd>
            </dl>
            <input type="submit" name="action" value="Delete">
            <a href='/Home/index'>Cancel</a>
        </form>
    </main>
    <footer>
        © 2024 All Rights Reserved | CleanIt Services
    </footer>
</body>
</html>
