
<style>
        /* Custom Styles */
        body, html {
            height: 100vh;
            width: 100vw;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url("/assets/images/login_bg.png");
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            max-width: 350px;
            width: 100%;
        }
        .login-box h1 {
            font-family: 'Arial Black', sans-serif;
            font-size: 32px;
            color: #333;
            margin-bottom: 0;
            text-align: center;
        }
        .login-box h1 span {
            color: #7986cb; /* Light blue color for IMS */
        }
        .login-box p {
            font-size: 14px;
            color: #777;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-control {
            height: 45px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #333;
            border-color: #333;
            width: 100%;
            height: 45px;
            font-size: 16px;
            border-radius: 5px;
        }
        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
    </style>

<!--
<div class="login-container">
    <div class="login-box text-center">
        <h1>RISE <span>IMS</span></h1>
        <p>Internal Management System</p>
        <form action="/admin/authenticate" method="POST">
            <div class="form-group">
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
        <a href="#" class="forgot-password">Forgot Password?</a>
    </div>
</div>
    -->
<div class="login-box text-center">
    <h1>RISE <span>IMS</span></h1>
    <p>Internal Management System</p>
    <form action="/admin/authenticate" method="POST">
        <div class="form-group">
            <!-- <input type="email" class="form-control" placeholder="Email" required> -->
            <input class="form-control" type="text" id="username" name="username" placeholder="Username" required>
            </div>
        <div class="form-group">
            <!-- <input type="password" class="form-control" placeholder="Password" required> -->
            <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
            </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
    <a href="#" class="forgot-password">Forgot Password?</a>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
