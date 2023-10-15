<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Recap</title>
    <?php $this->load->view('style/head') ?>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
        position: relative;
    }

    .style {
        z-index: 20;
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

    section .box {
        width: 100%;
        background: #fff;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
    }

    form {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #a6d5cd;
        padding: 0.75rem 1rem;
    }

    section .card h1 {
        color: #fff;
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

        form {
            padding: 0.75rem 2rem;
        }


        form input {
            padding: 0.5rem;
            background: #f4f4f4;
            border: 1px solid #a6d5cd;
            margin-top: 0.5rem;
        }

        form button {
            color: #fff;
            background: #c7e4df;
            border: none;
            margin-left: 1rem;
            padding: 0.5rem 1.5rem;
            font-size: 1em;
        }
    }

    form button {
        color: #fff;
        background: #c7e4df;
        border: none;
        margin-left: 0;
        padding: 0.5rem 1.5rem;
        font-size: 1em;
    }
</style>

<body>
    <div class="style">
        <?php $this->load->view('style/sidebar_admin') ?>
        <?php $this->load->view('style/navbar') ?>
    </div>

    <section>
        <div class="box">
            <div class="card">
                <form action="<?php echo base_url('admin/export_week') ?>" method="post">
                    <h1>Weekly Recap</h1>
                    <button onclick="export_today()">Export</button>
                    <!-- <div>
                        <input type="date" name="date">
                        <button type="submit">Export</button>
                    </div> -->
                </form>
                <div class="card2">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%;">No </th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Entry Time</th>
                                <th>Daily Activities</th>
                                <th>Home Time</th>
                                <th>Permission</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($absent) : ?>
                                <?php $no = 0;
                                foreach ($absent as $row) : $no++ ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no ?> </td>
                                        <td><?php echo name($row['id_karyawan']) ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['jam_masuk'] ?></td>
                                        <td><?php echo $row['kegiatan'] ?></td>
                                        <td><?php echo $row['jam_pulang'] ?></td>
                                        <td><?php echo $row['keterangan_izin'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">No Data</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        function export_week() {
            window.location.href = '<?php echo base_url('admin/export_week') ?>';
        }
    </script>

</body>

</html>