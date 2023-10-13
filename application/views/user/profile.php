<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('style/head') ?>
    <title>Profile</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
    }

    @media (min-width: 1200px) {
        header {
            position: relative;
            display: flex;
            flex-direction: row;
            background: #a6d5cd;
            color: #fff;
            padding: 2rem 7rem 4rem 7rem;
            border-bottom-left-radius: 5rem;
            filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
        }

        header i {
            font-size: 2em;
        }

        header img {
            position: absolute;
            bottom: -3.5rem;
            width: 7rem;
            height: 7rem;
            border-radius: 50%;
        }

        .nav {
            position: absolute;
            right: 0;
            bottom: -2.5rem;
            background: #c7e4df;
            padding: 2rem;
            border-top-left-radius: 5rem;
            border-bottom-left-radius: 5rem;
            width: 60%;
        }

        .nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav ul li.active p,
        .nav ul li:hover p {
            width: 100%;
            height: 2px;
            background: #fff;
        }

        .nav ul li a {
            text-decoration: none;
            font-weight: 500;
            color: #fff;
            margin-bottom: 0.4rem;
        }

        .nav ul li a:focus {
            outline: none;
        }

        .box {
            margin: 7rem;
            padding: 4rem 2rem;
            background: #fff;
            filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
        }

        .box .card {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .box .card h3 {
            color: #a6d5cd;
            width: 35%;
        }

        hr {
            border-top: 1px solid #f4f4f4;
        }
    }
</style>

<body>
    <section>
        <?php foreach ($user as $row) : ?>
            <header>
                <i class="fas fa-arrow-left" onclick="kembali()"></i>
                <img src="<?php echo base_url('images/' . $row->image) ?>" alt="">
                <?php $this->load->view('style/nav') ?>
            </header>
            <form action="" method="post" class="box">
                <div class="card">
                    <h3>Username</h3>
                    <p><?php echo $row->username ?></p>
                </div>
                <hr>
                <div class="card">
                    <h3>Email</h3>
                    <p><?php echo $row->email ?></p>
                </div>
                <hr>
                <div class="card">
                    <h3>Full Name</h3>
                    <p><?php echo $row->nama_depan ?> <?php echo $row->nama_belakang ?></p>
                </div>
                <hr>
            </form>
        <?php endforeach ?>
    </section>

</body>

<script>
    function kembali() {
        window.history.go(-1);
    }
</script>


</html>