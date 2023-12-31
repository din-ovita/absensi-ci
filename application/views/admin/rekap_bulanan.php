<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Month Recap</title>
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
        background: #593f86;
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
            margin-bottom: 3rem;
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

        form input {
            padding: 0.5rem;
            background: #f4f4f4;
            border: 1px solid #593f86;
            margin-top: 0.5rem;
        }

        form button {
            color: #fff;
            background: #a568cc;
            border: none;
            margin-left: 1rem;
            padding: 0.5rem 1.5rem;
            font-size: 1em;
        }

        .export {
            margin: 1rem 2rem 0 2rem;
        }

        form {
            padding: 0.75rem 2rem;
        }

        button.export {
            margin: 1rem 2rem;
        }

    }


    form input {
        padding: 0.5rem;
        background: #f4f4f4;
        border: 1px solid #593f86;
        margin-top: 0.5rem;
    }

    button {
        color: #fff;
        background: #a568cc;
        border: none;
        margin-top: 0.5rem;
        margin-left: 0.4rem;
        padding: 0.5rem 1rem;
        font-size: 1em;
    }

    .export {
        margin: 1rem 1rem 0 1rem;
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
                <form action="<?php echo base_url('admin/monthly_rekap') ?>" method="post">
                    <h1>Monthly Recap</h1>
                    <div>
                        <input type="month" name="month" id="bulan">
                        <button type="submit">Show</button>
                    </div>
                </form>
                <button class="export" onclick="export_month()">Export</button>
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
        </div>
    </section>

    <script>
        document.getElementById('bulan').addEventListener('change', function() {
            sessionStorage.setItem('bulan', this.value);
        });

        function export_month() {
            var bulan = sessionStorage.getItem('bulan');
            window.location.href = '<?php echo base_url('admin/export_monthly_input/') ?>' + bulan;
        }
    </script>

</body>

</html>