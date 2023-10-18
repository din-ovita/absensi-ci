<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <title><?php echo $title ?></title>
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
        background: white;
        min-height: 100vh;
        background: #ebf5f6;
        padding: 5rem 0;
    }

    section .color {
        position: absolute;
        z-index: 0;
    }

    .home {
        z-index: 1;
        margin: 0 20px;
    }

    .home img {
        width: 26rem;
        height: 22rem;
        margin: 0 30px;
    }

    .home .card {
        width: 100%;
        padding: 10px;
        text-align: center;
    }

    .home .card h2 {
        padding: 10px 0;
        font-size: 1.2em;
    }

    .home .card h1 {
        text-transform: capitalize;
        font-size: 2.3em;
        padding: 10px 0;
    }

    .home .card span {
        display: block;
    }

    .home .card div {
        padding-top: 30px;
    }

    .home .card a {
        text-decoration: none;
        color: #fff;
        font-weight: 600;
        padding: 10px 50px;
        border-radius: 20px;
        background: #a6d5cd;
    }

    section .color:nth-child(1) {
        right: -150px;
        bottom: 0;
        width: 350px;
        height: 350px;
        background: #deeeee;
        border-radius: 50%;
    }


    @media (min-width: 1200px) {
        section .color:nth-child(1) {
            bottom: 10px;
            right: 180px;
            width: 350px;
            height: 540px;
            background: #deeeee;
            border-top-left-radius: 200px;
            border-top-right-radius: 200px;
        }

        section {
            padding: 0;
        }

        .home {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px 0;
        }

        .home img {
            width: 40rem;
            height: 35rem;
        }

        .home .card {
            text-align: left;
        }

        .home .card h2 {
            font-size: 1.5em;
        }

        .home .card h1 {
            font-size: 3em;
        }

        .home .card p {
            padding: 10px 0;
            font-size: 1.1em;
        }
    }
</style>

<body>
    <section>
        <div class="color"></div>
        <div class="home">
            <img src="<?php echo base_url('images/karakter.png') ?>" alt="">
            <div class="card">
                <h2><i class="fas fa-project-diagram"></i> preSent.</h2>
                <h1>login and <span>fill in attendance</span></h1>
                <p>Fill in your attendance and do your daily tasks. <span>Don't forget to be absent before you go home</span></p>
                <div>
                    <a href="<?php echo base_url('auth/login') ?>">Sign In</a>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
</script>

</html>