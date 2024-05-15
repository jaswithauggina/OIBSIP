<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
         body {
    font-family: Arial, sans-serif;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    position: relative; }

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 123%;
    background-color: rgba(221, 229, 244, 0.7); 
    z-index: -1; }

body::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 123%;
    background-image: url("https://www.plannthat.com/wp-content/uploads/2020/03/plush-design-studio-Bg3qkPDpopY-unsplash-1920x1440.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    z-index: -2; }
        .container
        {
            max-width: 500px;
            margin: 170px auto 0;;
            background:#f1f7fe;
            padding: 33px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h2
        {
            color: #3e4684;
            position: relative;
        }
        h2::before, h2::after
        {
            content: '';
            position: absolute;
            top: 35%;
            width: 33%; 
            height: 8.5px;
            background: #3e4684;
            border-radius: 5px;
        }

        h2::before
        {
            left: 0;
        }

        h2::after 
        {
            right: 0;
        }
        form 
        {
         margin-top: 20px;
        }
        label 
        {
            display: block;
            margin: 10px 0;
            color: #3e4684;
            font-weight: 600;
        }

        .password-container input[type="password"] 
        {
            width: 48%; 
        }
        input[type="name"],input[type="username"],input[type="confirmPassword"],input[type="phone"],input[type="bdate"]
        input[type="password"],
        input[type="email"] 
        {
            width: 100px;
            margin: 5px 0;
            font-size:30px;
            border: 6px solid gray;
            border-radius: 7px;
        }
        input
        {
            height:2em;
            width:28.5rem;
            border:none;
            border-radius: 10px;
        }
        input[type="submit"]
        {
            background: #3e4684;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            width:30.8rem;
            cursor: pointer;
            font-size: 20px;
            margin-top: 25px;
        }
        input
        {
            padding:0.5rem;
            padding-right: 30px;
        
        }
        input[type="submit"]:hover 
        {
            transition: background-color 0.3s, color 0.3s;
            background: #6b7a94; 
            color: white; 
        }
        input[type="checkbox"] 
        {
            margin: 7px 0;
            font-size: 7px;
            border: 1px solid gray;
            border-radius: 3px;
            width: 5%;
}

        </style>
</head>
<body>
    <div class="container">
        <h2 align="center">Sign Up</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $bdate = $_POST['bdate'];
            if ($password === $confirmPassword) 
            {
                header("Location: oibsip_task4_code3?username=$username&password=$password");
                exit;
            }
            else 
            {
                echo '<div style="color: red;">Passwords do not match. Please try again.</div>';
            }
        }
        ?>
<form>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required pattern="[A-Za-z ]+" title="Please enter a valid name with alphabets only">
    </div>
    <div>
		<label for="username">Username</label>
		<input type="text" id="username" name="username" placeholder="Enter a username" required>
    </div>
    <div>
        <label for="password">Create Password</label>
        <input type="password" id="pass" name="password" maxlength="8" placeholder="Enter your password" required>
    </div>
    <div>
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" maxlength="8" placeholder="Confirm your password" required>
    </div>
    <div>
        <label for="email">Email address</label>
        <input type="text" id="email" name="email" placeholder="sfdh@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@gmail.com" title="Please enter a valid email address">
    </div>
    <div>
        <label for="phone">Phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="1234567890" required pattern="\d{10}" title="Please enter a 10-digit phone number">
    </div>
    <div>
		<label for="bdate">Date of birth</label>
		<input type="date" id="bdate" name="bdate" >
    </div>
    <div>
    <label for="terms-and-conditions">
        <input id="terms-and-conditions" type="checkbox" required name="terms-and-conditions" /> I accept the terms and conditions</a>
    </label>
    </div>

    <div>
		<center><input type="submit" value="Register" ></center>
    </div>
</form>
</div>
</body>
</html>