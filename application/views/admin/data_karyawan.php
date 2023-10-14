<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <?php $this->load->view('style/head') ?>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
        position: relative;
    }

    section {
        margin-left: 0;
        margin-top: 5rem;
        padding: 1rem 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    section .card {
        width: 100%;
        background: #fff;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
    }

    section .card h1 {
        color: #fff;
        background: #a6d5cd;
        padding: 0.75rem 1rem;
    }

    section .card2 {
        padding: 1rem;
        overflow-x: auto;
    }

    section .card2 table {
        width: 100%;
        border: 2px solid #f4f4f4;
        border-collapse: collapse;
    }

    section .card2 table thead tr {
        background: #f4f4f4;
        text-align: center;
        color: #314641;
    }

    section .card2 table tbody tr {
        border-bottom: 2px solid #f4f4f4;
        text-align: center;
    }

    section .card2 table thead tr th,
    section .card2 table tbody tr td {
        padding: 0.8rem 0.5rem;
    }

    section .card2 table thead tr th {
        font-size: 0.9em;
    }

    section .card2 table tbody tr td {
        font-size: 0.8em;
    }

    @media (min-width: 1200px) {
        section {
            margin-left: 15rem;
            margin-top: 5rem;
        }

        section .card2 {
            padding: 2rem;
        }

        section .card2 table {
            width: 100%;
            border: 2px solid #f4f4f4;
            border-collapse: collapse;
        }

        section .card2 table thead tr {
            background: #f4f4f4;
            text-align: center;
        }

        section .card2 table tbody tr {
            border-bottom: 2px solid #f4f4f4;
            text-align: center;
        }

        section .card2 table thead tr th,
        section .card2 table tbody tr td {
            padding: 1rem 0.5rem;
        }

        section .card2 table tbody tr td {
            font-size: 0.9em;
        }

        section .card h1 {
            color: #fff;
            background: #a6d5cd;
            padding: 1rem 2rem;
        }

        .img img {
            width: 4rem;
            height: 4rem;
        }
    }

    .img img {
        width: 3.5rem;
        height: 3.5rem;
    }

    .style {
        z-index: 20;
    }
</style>


<body>
    <div class="style">
        <?php $this->load->view('style/sidebar_admin') ?>
        <?php $this->load->view('style/navbar') ?>
    </div>
    <section>
        <div class="card">
            <h1>Employee Data</h1>
            <div class="card2">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">No </th>
                            <th>Image</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th class="full">Full Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($karyawan) : ?>
                            <?php $no = 0;
                            foreach ($karyawan as $row) : $no++ ?> <tr>
                                    <td><?php echo $no ?></td>
                                    <td class="img"><img src="<?php echo base_url('./images/' . $row->image) ?>" alt=""></td>
                                    <td><?php echo $row->username ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->nama_depan ?> <?php echo $row->nama_belakang ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Empty Employee Data</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>