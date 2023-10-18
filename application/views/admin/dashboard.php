<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
        margin-bottom: 8rem;
        padding: 1rem 2rem;
        z-index: 10;
    }

    section .box {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: 2rem;
    }

    section .box .card {
        background: #fff;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    section .box .card div h3 {
        margin-bottom: 1rem;
        text-transform: capitalize;
        color: #314641;
    }

    section .box .card div p {
        font-size: 1.5em;
        font-weight: 500;
        color: #314641;
    }

    section .box .card i {
        font-size: 4rem;
        color: #a6d5cd;
    }

    section .box2 {
        width: 100%;
        background: #fff;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
        margin-top: 2rem;
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
            margin-bottom: 3rem;
        }

        section .box {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 2rem;
        }

        section .box .card {
            padding: 2rem;
        }

        section .box .card div h3 {
            margin-bottom: 1rem;
            text-transform: capitalize;
        }

        section .box .card div p {
            font-size: 2em;
            font-weight: 500;
        }

        section .box .card i {
            font-size: 5rem;
            color: #a6d5cd;
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

        .card2 h1 {
            text-transform: capitalize;
            margin-bottom: 2rem;
            color: #314641;
        }

    }

    .pagination {
        display: flex;
        margin: 0.5em auto;
    }

    .pagination a,
    .pagination strong {
        border: 1px solid silver;
        border-radius: 8px;
        color: black;
        padding: 0.5em;
        margin-right: 0.5em;
        text-decoration: none;
    }

    .pagination a:hover,
    .pagination strong {
        border: 1px solid #a6d5cd;
        background-color: #a6d5cd;
        color: white;
    }

    .card2 h1 {
        text-transform: capitalize;
        margin-bottom: 1rem;
        color: #314641;
        font-size: 1.3em;
    }

    .img img {
        width: 3.5rem;
        height: 3.5rem;
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
                <div>
                    <h3>total Employee</h3>
                    <p><?php echo $total_karyawan ?></p>
                </div>
                <i class="fas fa-database"></i>
            </div>
            <div class="card">
                <div>
                    <h3>total attendance today</h3>
                    <p><?php echo $total_absen_today ?></p>
                </div>
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="card">
                <div>
                    <h3>total permissions today</h3>
                    <p><?php echo $total_izin_today ?></p>
                </div>
                <i class="fas fa-minus-circle"></i>
            </div>
        </div>
        <div class="box2">
            <div class="card2">
                <h1>history absent today</h1>
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($absensi) : ?>
                            <?php $no = 0;
                            foreach ($absensi as $row) : $no++ ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no ?> </td>
                                    <td><?php echo name($row->id_karyawan) ?></td>
                                    <td><?php echo $row->date ?></td>
                                    <td><?php echo $row->jam_masuk ?></td>
                                    <td><?php echo $row->kegiatan ?></td>
                                    <td><?php echo $row->jam_pulang ?></td>
                                    <td><?php echo $row->keterangan_izin ?></td>
                                    <?php if ($row->status == 'not') : ?>
                                        <td style="font-weight: 500; color: #dc2626; text-transform: uppercase;"><?php echo $row->status ?></td>
                                    <?php else : ?>
                                        <td style="font-weight: 500; color: #16a34a; text-transform: uppercase;"><?php echo $row->status ?></td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="8">No Data</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>