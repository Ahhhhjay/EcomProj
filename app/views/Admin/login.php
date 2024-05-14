<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=__('Login - CleanIt Services')?></title>
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
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
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
            display: block;
            margin-top: 15px;
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
        <h1><?=__('MKCleaners -Admin Login')?></h1>
    </header>
    <main>
        <form method="post" action="">
            <div class="form-group">
                <label><?=__('Email:')?>
                    <input type="text" class="form-control" name="Email" placeholder="<?=__('Enter your email')?>" required>
                </label>
            </div>
            <div class="form-group">
                <label><?=__('Password:')?>
                    <input type="password" class="form-control" name="password" placeholder="<?=__('Enter your password')?>" required>
                </label>
            </div>
            <div class="form-group">
                <input type="submit" name="action" value="<?=__('Login')?>">
               
            </div>
        </form>
    </main>
    <footer>
    <?=__('&copy; 2024 All Rights Reserved | Totally not fake website')?>
    </footer>
</body>
</html>
