<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Register Admin</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #e0ceff;
        min-height: 100vh;
    }

    .box {
        background: #593f86
;
        padding: 30px;
        border-top-left-radius: 50px;
        margin: 1rem;
    }

    .input-group {
        position: relative;
        width: 250px;
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

    .sign-up {
        padding-top: 30px;
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

    .sign-up button {
        color: #fff;
        font-weight: 600;
        width: 100%;
        padding: 10px 0;
        border-radius: 20px;
        border: 3px solid #fff;
        background: transparent;
        font-size: 1.05em;
    }

    .sign-up button:focus {
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

    @media (min-width: 1200px) {
        section {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #e0ceff;
            min-height: 100vh;
        }

        .box {
            background: #593f86
;
            padding: 30px 50px;
            margin: auto;
            border-top-left-radius: 50px;
        }

        .input-group {
            position: relative;
            width: 300px;
            margin-top: 25px;
        }
    }
</style>

<body>
    <section>
        <div class="box">
            <div class="container">
                <h2>Register Admin</h2>
                <p>Create an Account</p>
                <form action="<?php echo base_url('auth/aksi_register_admin') ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                    <div class="input-group">
                        <input type="text" required name="username">
                        <span for="">Username</span>
                        <b></b>
                    </div>
                    <div class="input-group">
                        <input type="email" required name="email">
                        <span for="">Email</span>
                        <b></b>
                    </div>
                    <div class="input-group">
                        <input type="text" required name="nama_depan">
                        <span for="">First Name</span>
                        <b></b>
                    </div>
                    <div class="input-group">
                        <input type="text" required name="nama_belakang">
                        <span for="">Last Name</span>
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
                    <p>*Password minimal 8 charakter</p>
                    <div class="sign-up">
                        <button type="submit">Sign Up</button>
                    </div>
                    <p>Already have an account? <a href="<?php echo base_url('auth/login') ?>">Login</a></p>
                </form>
            </div>
        </div>
    </section>

    <?php if ($this->session->flashdata('error_message')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('error_message') ?>',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    <?php endif; ?>

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
    </script>

</body>

</html>