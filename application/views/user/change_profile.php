<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('style/head') ?>
    <title>Change Profile</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
    }

    header {
        position: relative;
        display: flex;
        flex-direction: row;
        background: #593f86
;
        color: #fff;
        padding: 3.5rem 2rem;
        border-bottom-left-radius: 6rem;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
    }

    header i {
        font-size: 2em;
    }

    header img {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 6rem;
        height: 6rem;
        border-radius: 50%;
    }

    .nav {
        position: absolute;
        right: 0;
        bottom: -2.5rem;
        background: #a568cc;
        padding: 1rem 2rem;
        border-top-left-radius: 5rem;
        border-bottom-left-radius: 5rem;
    }

    .nav ul {
        display: flex;
        list-style: none;
        gap: 1.5rem;
    }

    .nav ul li.active p,
    .nav ul li:hover P {
        width: 100%;
        height: 2px;
        background: #fff;
        margin-top: 0.4rem;
    }

    .nav ul li a {
        text-decoration: none;
        font-size: 0.7em;
        font-weight: 500;
        color: #fff;
    }

    .nav ul li a:focus {
        outline: none;
    }

    .box {
        margin: 5rem 1rem;
        padding: 2rem 1rem 4rem 1rem;
        background: #fff;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
    }

    .box .box2 {
        column-gap: 0;
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        margin: 1rem 0;
    }

    .card {
        margin-bottom: 1.5rem;
    }

    .card label {
        color: #593f86
;
    }

    .card input {
        display: block;
        width: 95%;
        height: 2rem;
        padding: 0.2rem 0.5rem;
        margin-top: 0.5rem;
        background: #f4f4f4;
        border: 1px solid #593f86
;
    }

    .card input:focus {
        outline: 2px solid #593f86
;
    }

    .img input {
        background: transparent;
        border: none;
        padding: 0;
        font-size: 0.9em;
    }

    .img input:focus {
        outline: none;
    }

    .button {
        position: absolute;
        right: 1.2rem;
    }

    .button button {
        padding: 0.5rem 3rem;
        color: #fff;
        background: #593f86
;
        border: none;
        font-size: 1em;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.15em;
    }

    @media (min-width: 1200px) {
        header {
            position: relative;
            display: flex;
            flex-direction: row;
            background: #593f86
;
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
            top: 4rem;
            left: 10rem;
            width: 8rem;
            height: 8rem;
            border-radius: 50%;
        }

        .nav {
            position: absolute;
            right: 0;
            bottom: -2.5rem;
            background: #a568cc;
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
            font-size: 1em;
        }

        .nav ul li a:focus {
            outline: none;
        }

        .box {
            position: relative;
            margin: 7rem;
            padding: 2rem 2rem 5rem 2rem;
            background: #fff;
            filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
        }

        .box .box2 {
            column-gap: 2rem;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            margin: 1rem 0;
        }

        .card {
            margin-bottom: 1.5rem;
        }

        .card label {
            color: #593f86
;
        }

        .card input {
            display: block;
            width: 97%;
            height: 2rem;
            padding: 0.2rem 0.5rem;
            margin-top: 0.5rem;
            background: #f4f4f4;
            border: 1px solid #593f86
;
        }

        .card input:focus {
            outline: 2px solid #593f86
;
        }

        .img input {
            background: transparent;
            border: none;
            padding: 0;
            font-size: 0.9em;
        }

        .img input:focus {
            outline: none;
        }

        .button {
            position: absolute;
            right: 1.8rem;
        }

        .button button {
            padding: 0.8rem 5rem;
            color: #fff;
            background: #593f86
;
            border: none;
            font-size: 1em;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.15em;
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
            <form class="box" action="<?php echo base_url('user/aksi_change_profile') ?>" method="post" enctype="multipart/form-data">
                <div class="box2">
                    <div class="card">
                        <label for="">Username</label>
                        <input type="text" value="<?php echo $row->username ?>" name="username">
                    </div>
                    <div class="card">
                        <label for="">Email</label>
                        <input type="email" value="<?php echo $row->email ?>" name="email">
                    </div>
                    <div class="card">
                        <label for="">First Name</label>
                        <input type="text" value="<?php echo $row->nama_depan ?>" name="nama_depan">
                    </div>
                    <div class="card">
                        <label for="">Last Name</label>
                        <input type="text" value="<?php echo $row->nama_belakang ?>" name="nama_belakang">
                    </div>
                    <div class="card img">
                        <label for="">Image</label>
                        <input type="file" name="image">
                    </div>
                </div>
                <input type="hidden" value="<?php echo $row->id ?>" name="id">
                <div class="button">
                    <button type="submit">Save</button>
                </div>
            </form>
        <?php endforeach ?>
    </section>

</body>

<script>
    // kembali ke halaman sebelumnya
    function kembali() {
        window.history.go(-1);
    }
</script>

</html>