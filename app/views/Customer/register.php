<html>
<head>
	<title><?= $name ?> view</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
	<div class='container'>
		<form method='post' action=''>
			<div class="form-group">
				<label>First name:<input type="text" class="form-control" name="firstName" placeholder="Enter your first name" /></label>
			</div>
			<div class="form-group">
				<label>Last name:<input type="text" class="form-control" name="lastName" placeholder="Enter your last name" /></label>
			</div>
			<div class="form-group">
				<label>Email:<input type="email" class="form-control" name="Email" placeholder="Enter your email" /></label>
			</div>
			<div class="form-group">
				<label>Phone number: <input type="tel" class="form-control" name="contactNumber" placeholder="123-456-7890" pattern="[0-9{3}-[0-9]{3}-[0-9]{4}" required /></label>
			</div>
			<div class="form-group">
				<label>Address:<input type="text" class="form-control" name="Address" placeholder="Enter your address" /></label>
			</div>
			<div class="form-group">
				<label>Password:<input type="password" class="form-control" name="passwordHash" placeholder="Enter your password" /></label>
			</div>

			<div class="form-group">
				<input type="submit" name="action" value="Register" /> 
				<a href='/Customer/login'>I have an account, bring me to the login page</a>
			</div>
		</form>
	</div>
</body>
</html>