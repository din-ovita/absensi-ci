<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <title>Login Email</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        overflow: hidden;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ebf5f6;
        min-height: 100vh;
    }

    .box {
        background: #a6d5cd;
        padding: 30px 50px;
        border-top-right-radius: 50px;
    }

    .input-group {
        position: relative;
        width: 300px;
        margin-top: 25px;
    }

    .input-group input {
        position: relative;
        width: 100%;
        padding: 15px 10px 10px;
        background: transparent;
        outline: none;
        box-shadow: none;
        color: #fff;
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.5s;
        z-index: 10;
        border: none;
    }

    .input-group span {
        position: absolute;
        left: 0;
        padding: 15px 10px 10px;
        pointer-events: none;
        color: #fff;
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.05s;
    }

    .input-group input:valid~span,
    .input-group input:focus~span {
        color: #fff;
        font-size: 0.85em;
        transform: translateY(-24px);
    }

    .input-group b {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        background: #fff;
        border-radius: 4px;
        height: 2px;
        overflow: hidden;
        pointer-events: none;
    }

    .input-group .password {
        position: absolute;
        right: 10px;
        bottom: 25%;
        color: #fff;
        cursor: pointer;
        z-index: 11;
    }

    .sign-in {
        padding-top: 10px;
        width: 100%;
    }

    .box h2 {
        font-family: 'Marck Script', cursive;
        color: #fff;
        font-size: 2.5em;
        text-align: center;
    }

    .box p {
        color: #fff;
        font-size: 1.2em;
        text-align: center;
    }

    .sign-in button {
        color: #fff;
        font-weight: 600;
        width: 100%;
        padding: 10px 0;
        border-radius: 20px;
        border: 3px solid #fff;
        background: transparent;
        font-size: 1.05em;
    }

    .sign-in button:focus {
        outline: none;
    }

    .box form p {
        font-size: 0.95em;
        text-align: left;
        margin-top: 10px;
    }

    .box form p a {
        color: #fff;
        outline: none;
    }

    .login_username {
        margin-top: 50px;
    }

    .login_username a {
        text-decoration: none;
        color: #fff;
        outline: none;
    }

    .login_username a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <section>
        <div class="box">
            <div class="container">
                <h2>Login</h2>
                <p>Sign in to continue</p>
                <form action="<?php echo base_url('auth/aksi_login_email') ?>" enctype="multipart/form-data" method="post">
                    <div class="input-group">
                        <input type="email" required name="email">
                        <span for="">Email</span>
                        <b></b>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" required name="password">
                        <span for="">Password</span>
                        <b></b>
                        <div class="password">
                            <i class="fas fa-eye-slash" onclick="togglePassword()" id="icon"></i>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password2" required name="confirm_password">
                        <span for="">Confirm Password</span>
                        <b></b>
                        <div class="password">
                            <i class="fas fa-eye-slash" onclick="togglePassword2()" id="icon2"></i>
                        </div>
                    </div>
                    <div class="login_username">
                        <a href="<?php echo base_url('auth/login_username') ?>">Login with username</a>
                    </div>
                    <div class="sign-in">
                        <button type="submit">Sign In</button>
                    </div>
                    <p>Don't have account? <a href="<?php echo base_url('auth/register') ?>">Register</a></p>
                </form>
            </div>
        </div>
    </section>
    <script>
        function togglePassword() {
            var passwordType = document.getElementById("password");
            var icon = document.getElementById("icon");
            if (passwordType.type === "password") {
                passwordType.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordType.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }

        function togglePassword2() {
            var passwordType = document.getElementById("password2");
            var icon = document.getElementById("icon2");
            if (passwordType.type === "password") {
                passwordType.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordType.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>

</body>

</html>