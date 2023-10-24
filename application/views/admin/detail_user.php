<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
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

    section .card {
        width: 100%;
        background: #fff;
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
    }

    .card h1 {
        background: #593f86;
        color: #fff;
        padding: 1rem;
    }

    section .card2 {
        padding: 1rem;
    }

    .profile {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1.5rem;
    }

    .profile img {
        max-width: 150px;
        max-height: 150px;
    }

    .absent {
        margin-top: 2rem;
    }

    .card2 h2 {
        text-transform: capitalize;
        margin-bottom: 2rem;
        margin-top: 2rem;
        color: #314641;
    }

    section .absent {
        padding-bottom: 1rem;
        overflow-x: auto;
    }

    section .absent table {
        width: 100%;
        border: 2px solid #f4f4f4;
        border-collapse: collapse;
    }

    section .absent table thead tr {
        background: #f4f4f4;
        text-align: center;
        color: #314641;
    }

    section .absent table tbody tr {
        border-bottom: 2px solid #f4f4f4;
        text-align: center;
    }

    section .absent table thead tr th,
    section .absent table tbody tr td {
        padding: 0.8rem 0.5rem;
    }

    section .absent table thead tr th {
        font-size: 0.9em;
    }

    section .absent table tbody tr td {
        font-size: 0.8em;
    }

    .profile2 {
        margin-top: 1rem;
        padding-bottom: 0.5rem;
        display: block;
        align-items: center;
        width: 100%;
    }

    .profile-user {
        width: 100%;
    }

    h3 {
        color: #593f86;
        margin-bottom: 0.4rem;
        width: 100%;
    }

    hr {
        border-top: 1px solid #f4f4f4;
    }

    .back {
        margin: 2rem 0;
        padding: 0.75rem 2rem;
        background: #314641;
        border: none;
        color: #fff;
        font-weight: 500;
        text-transform: uppercase;
        cursor: pointer;
    }

    button.export {
        color: #fff;
        background: #a568cc;
        border: none;
        margin-left: 1rem;
        padding: 0.5rem 1.5rem;
        font-size: 1em;
    }

    @media (min-width: 1200px) {
        section {
            margin-left: 15rem;
            margin-top: 5rem;
            margin-bottom: 3rem;
        }

        .card h1 {
            background: #593f86;
            color: #fff;
            padding: 1rem 2rem;
        }

        section .card2 {
            padding: 2rem;
        }

        .profile {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 3rem;
        }

        .profile img {
            max-width: 250px;
            max-height: 250px;
        }

        .absent {
            margin-top: 2rem;
        }

        .card2 h2 {
            text-transform: capitalize;
            margin-bottom: 2rem;
            color: #314641;
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
            background: #593f86;
            padding: 1rem 2rem;
        }

        .profile2 {
            margin-top: 2rem;
            padding-bottom: 0.5rem;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .profile-user {
            width: 100%;
        }

        h3 {
            color: #593f86;
            margin-bottom: 0;
            width: 40%;
        }

        hr {
            border-top: 1px solid #f4f4f4;
        }

        .back {
            padding: 0.75rem 5rem;
        }
    }
</style>

<body>
    <div class="style">
        <?php $this->load->view('style/sidebar_admin') ?>
        <?php $this->load->view('style/navbar') ?>
    </div>
    <section>
        <div class="card">
            <?php foreach ($karyawan as $row) : ?>
                <h1>Employee Detail</h1>
                <div class="card2">
                    <div class="profile">
                        <img src="<?php echo base_url('images/' . $row->image) ?>" alt="">
                        <div class="profile-user">
                            <div class="profile2">
                                <h3>Username</h3>
                                <p><?php echo $row->username ?></p>
                            </div>
                            <hr>
                            <div class="profile2">
                                <h3>Email</h3>
                                <p><?php echo $row->email ?></p>
                            </div>
                            <hr>
                            <div class="profile2">
                                <h3>Full Name</h3>
                                <p><?php echo $row->nama_depan ?> <?php echo $row->nama_belakang ?></p>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h2>History Absent Employee</h2>
                        <button onclick="export_karyawan(<?php echo $row->id ?>)" class="export">Export</button>
                    </div>
                    <div class="absent">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No </th>
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
                    <button onclick="kembali()" class="back">Back</button>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <script>
        // kembali ke halaman sebelumnya
        function kembali() {
            window.history.go(-1);
        }

        function export_karyawan(id) {
            window.location.href = "<?php echo base_url('admin/export_absensi_by_karyawan') ?>" + "/" + id;
        }
    </script>


</body>

</html>