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
        min-width: 100vh;
        background: white;
    }

    section .color {
        position: absolute;
        z-index: 0;
        filter: blur(150px);
    }

    section .color:nth-child(1) {
        top: -150px;
        left: 0;
        width: 600px;
        height: 600px;
        background: #cbbbec;
    }

    section .color:nth-child(2) {
        top: -250px;
        right: 0;
        width: 500px;
        height: 500px;
        background: #49ddfd;
    }

    .home div h1 span {
        display: block;
    }

    .home {
        z-index: 1;
        margin: auto;
    }

    .home .card {
        margin: auto 20px;
    }

    .home img {
        width: 26rem;
        height: 22rem;
    }

    .home .card h1 {
        font-size: 2em;
        font-weight: 700;
        text-transform: capitalize;
        padding-bottom: 1rem;
    }

    .home .card h2 {
        margin: 0 0 2.5rem 0;
    }

    .home .card p {
        margin-bottom: 3rem;
    }

    .home .card a {
        text-decoration: none;
        background: #0fc1e7;
        color: white;
        font-weight: 700;
        letter-spacing: 0.1em;
        padding: 0.8rem 3rem;
        margin: 2rem 0;
        border-radius: 20px;
    }

    .home .card a:focus {
    outline: none;
    }

    .home .card {
        padding: 0 20px;
    }




    @media (min-width: 1200px) {
        .home {
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .home {
            margin: 50px 160px;
        }

        .home img {
            width: 40rem;
            height: 35rem;
        }

        .home .card h1 {
            font-size: 3em;
            font-weight: 700;
            text-transform: capitalize;
            padding-bottom: 1rem;
        }

        .home .card h2 {
            margin: 0 0 3rem 0;
        }

        .home .card p {
            margin-bottom: 3rem;
        }

        .home .card a {
            text-decoration: none;
            background: #0fc1e7;
            color: white;
            font-weight: 700;
            letter-spacing: 0.1em;
            padding: 0.8rem 3rem;
            margin: 2rem 0;
            border-radius: 20px;
        }
    }
</style>

<body>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="home">
            <img src="<?php echo base_url('images/home2.png') ?>" alt="">
            <div class="card">
                <h2><i class="fas fa-project-diagram"></i> preSent.</h2>
                <h1>login and <span>fill in attendance</span></h1>
                <p>Fill in your attendance and do your daily tasks. Don't forget to be absent before you go home</p>
                <a href="">Sign Up</a>
            </div>
        </div>
    </section>
</body>

<script>
</script>

</html>