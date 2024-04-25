<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?> - Profile View</title>
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
        h1 {
            color: #2a587a;
        }
        dl {
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
            color: #89CFF0;
            text-decoration: none;
            margin: 0 10px;
        }
        .links a:hover {
            color: #66afe9;
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
    
    </header>
    <main>
        <h1>User profile</h1>
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
        <div class="links">
            <a href='/Customer/update'>Modify my profile</a> |
            <a href='/Customer/delete'>Delete my profile</a> |
            <a href='/Home/index'>Return to main</a>
        </div>
        <h2>Appointments</h2>
        
    </main>
    <footer>
        © 2024 All Rights Reserved | Totally not fake website
    </footer>
</body>
</html>
