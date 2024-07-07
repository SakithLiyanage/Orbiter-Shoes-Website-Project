    <!DOCTYPE html>
    <html>

    <head>
        <title>Log in</title>
        <link rel="icon" href="images/fav-01-01.png" type="image/x-icon">
        <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
        <script>
            function validateForm() {
                var password = document.getElementById("password").value;
                var reenterPassword = document.getElementById("reenterpassword").value;
                if (password != reenterPassword) {
                    alert("Passwords do not match");
                    return false;
                }
                return true;
            }
        </script>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .container {
                margin:100px 100px 100px 100px;
                background-color: #ffffff;
                padding: 20px 40px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 500px;
                width: 200%;
                text-align: center;
                
            }

            .container h1.title {
                margin-bottom: 10px;
                color: orange;
            }

            .container label {
                display: block;
                margin-bottom: 5px;
                color: #333;
                text-align: left;
            }

            .container input[type="text"],
            .container input[type="email"],
            .container input[type="password"],
            .container select {
                width: calc(100% - 20px);
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            .container button[type="submit"] {
                background-color: orange;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            .container button[type="submit"]:hover {
                background-color: orange;
            }

            .container a {
                color: orange;
                text-decoration: none;
            }

            .container a:hover {
                text-decoration: underline;
            }

            .logo {
                display: block;
                margin: 0 10px;
            }
        </style>
    </head>

    <body>
        <img class="logo" src="images/logo1.png" width="20% " alt="logo of the web site">
        <form action="login.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            <div class="container">
                <h1 class="title">Log in</h1>
                <br>
                
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>
            
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Password" name="password" id="password" required>
            
                <button type="submit" style= "width:100%">Log in</button>
                <br><br>
                <b>Don't have an account </b><a href="registerform.php">Register Now</a>
            </div>
        </form>
    </body>

    </html>
