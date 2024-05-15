<!DOCTYPE html>
<html>
<head>
    <title>Simple Login System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(221, 229, 244, 0.7);
            z-index: -1;
        }

        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("https://www.plannthat.com/wp-content/uploads/2020/03/plush-design-studio-Bg3qkPDpopY-unsplash-1920x1440.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -2;
        }

        .container {
            max-width: 350px;
            margin: 0 auto;
            background: #f1f7fe;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #3e4684;
            position: relative;
        }

        h2::before, h2::after {
            content: '';
            position: absolute;
            top: 35%;
            width: 28%;
            height: 8px;
            border-radius: 5px;
            background: #3e4684;
        }

        h2::before {
            left: 0;
        }

        h2::after {
            right: 0;
        }

        form, label {
            display: block;
            margin: 10px 0;
            color: #3e4684;
            font-weight: 600;
        }

        input[type="text"], input[type="password"] {
            width: 87%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
        }

        input {
            border: none;
        }

        input[type="submit"] {
            background: #3e4684;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            width: 12rem;
            cursor: pointer;
            font-size: 20px;
            margin-top: 25px;
        }

        input[type="submit"]:hover {
            transition: background-color 0.3s, color 0.3s;
            background: #6b7a94;
            color: white;
        }

        #error-message {
            color: red;
            display: none;
            margin-top: 10px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
        }

        .icon {
            position: relative;
        }

        .icon i {
            position: absolute;
            top: 71%;
            left: 10px;
            transform: translateY(-50%);
        }

        .icon input {
            padding-left: 30px;
        }
    </style>
</head>

<body>

<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $entered_username = $_POST["username"];
    $entered_password = $_POST["password"];
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "demo";

    $conn = new mysqli($servername, $db_username, $db_password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM registration WHERE username = ?");
    $stmt->bind_param("s", $entered_username);
    $stmt->execute();
    $stmt->bind_result($stored_password);
    $stmt->fetch();
    $stmt->close();

    if ($stored_password && password_verify($entered_password, $stored_password)) {
        $success = "Login Successful!";
    } else {
        $error = "Invalid username or password. Please try again.";
    }

    $conn->close();
}
?>

<div class="container">
    <center><h2>Login</h2></center>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="input-container">
            <div class="icon">
                <i class="fa fa-user"></i>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>
        <center><input type="submit" value="Login"></center>
    </form>

    <?php
    if (!empty($error)) {
        echo '<div style="color: red;">' . $error . '</div>';
    }

    if (!empty($success)) {
        echo '<div style="color: green;">' . $success . '</div>';
    }
    ?>
</div>
</body>
</html>
