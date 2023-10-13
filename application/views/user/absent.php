<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('style/head') ?>
    <title>Absent</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
    }

    section {
        margin-left: 0;
        margin-top: 5rem;
        padding: 1rem 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    section form {
        width: 100%;
        background: #fff;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
    }

    section form div {
        padding: 1rem;
    }

    section form textarea {
        width: 95%;
        padding: 0.5rem;
        font-size: 0.85em;
        background: #f4f4f4;
        border: 1px solid #a6d5cd;
    }

    section form textarea:focus {
        outline: 2px solid #a6d5cd;
    }

    section form h1 {
        color: #fff;
        background: #a6d5cd;
        padding: 0.75rem 1rem;
    }

    section form div h2 {
        text-transform: capitalize;
        margin-bottom: 1rem;
        font-size: 1.3em;
        color: #314641;
    }

    section form button {
        border: none;
        background: #a6d5cd;
        padding: 0.4rem 3rem;
        font-size: 1em;
        color: #fff;
        font-weight: 500;
        margin-top: 1rem;
    }



    @media (min-width: 1200px) {
        section {
            margin-left: 14rem;
            margin-top: 5rem;
        }

        section form div {
            padding: 2rem;
        }

        section form textarea {
            width: 97%;
            padding: 1rem;
            font-size: 1em;
        }

        section form h1 {
            color: #fff;
            background: #a6d5cd;
            padding: 1rem 2rem;
        }

        section form div h2 {
            text-transform: capitalize;
            margin-bottom: 1rem;
        }

        section form button {
            border: none;
            background: #a6d5cd;
            padding: 0.8rem 3rem;
            font-size: 1em;
            color: #fff;
            font-weight: 500;
            margin-top: 2rem;
        }
    }
</style>

<body>
    <?php $this->load->view('style/sidebar') ?>
    <?php $this->load->view('style/navbar') ?>
    <section>
        <form action="<?php echo base_url('user/aksi_absen') ?>" method="post">
            <h1>Absent</h1>
            <?php if ($data) : ?>
                <?php foreach ($data as $row) : ?>
                    <?php if ($row->keterangan_izin == '-') : ?>
                        <div>
                            <h2>daily activities</h2>
                            <textarea name="kegiatan" id="" cols="30" rows="10" placeholder="Your daily activities"><?php echo $row->kegiatan ?></textarea>
                            <button type="submit">Update</button>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row->id ?>">
                    <?php else : ?>
                        <div>
                            <h2>daily activities</h2>
                            <textarea name="kegiatan" id="" cols="30" rows="10" placeholder="Your daily activities"><?php echo $row->kegiatan ?></textarea>
                            <button type="button" disabled>Save</button>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row->id ?>">
                    <?php endif ?>
                <?php endforeach ?>
            <?php else : ?>
                <div>
                    <h2>daily activities</h2>
                    <textarea name="kegiatan" id="" cols="30" rows="10" placeholder="Your daily activities"></textarea>
                    <button type="submit">Save</button>
                </div>
            <?php endif ?>
        </form>
    </section>
</body>

</html>