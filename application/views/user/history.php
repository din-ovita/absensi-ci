<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('style/head') ?>
    <title>History</title>
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
        background: #593f86;
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

    .aksi {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .aksi a {
        text-decoration: none;
        font-size: 1.5em;
    }

    .aksi a {
        color: #2563eb;
    }

    .aksi button:nth-child(2) {
        font-size: 1.5em;
        border: none;
        color: #dc2626;
        background: transparent;
    }

    .aksi button:nth-child(1) {
        font-size: 1.5em;
        border: none;
        color: #2563eb;
        background: transparent;
    }

    .aksi {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
    }

    .aksi a {
        text-decoration: none;
        font-size: 1.5em;
    }

    .aksi a:nth-child(1) {
        color: #2563eb;
    }

    .aksi a:nth-child(2) {
        color: #16a34a;
    }

    .style {
        z-index: 20;
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
            background: #593f86;
            padding: 1rem 2rem;
        }

        .aksi {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .aksi a {
            text-decoration: none;
            font-size: 1.5em;
        }

        .aksi a:nth-child(1) {
            color: #2563eb;
        }

        .aksi a:nth-child(2) {
            color: #16a34a;
        }
    }
</style>

<body>
    <div class="style">
        <?php $this->load->view('style/sidebar') ?>
        <?php $this->load->view('style/navbar') ?>
    </div>

    <section>
        <div class="card">
            <h1>History</h1>
            <div class="card2">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">No </th>
                            <th>Date</th>
                            <th>Entry Time</th>
                            <th>Daily Activities</th>
                            <th>Home Time</th>
                            <th>Permission</th>
                            <th>Action</th>
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
                                    <td class="aksi">
                                        <a href="<?php echo base_url('user/validasi_edit') ?>"><i class="fas fa-edit"></i></a>
                                        <?php date_default_timezone_set('Asia/Jakarta');
                                        $tgl = date('Y-m-d') ?>
                                        <?php if (empty(pulang($row->id)) && izin($row->id) == '-' && tgl($row->id) == $tgl) : ?>
                                            <a href="<?php echo base_url('user/pulang') ?>"><i class="fas fa-home"></i></a>
                                        <?php else : ?>
                                            <a href="" style="cursor:default; color: #4b5563;"><i class="fas fa-home"></i></a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Absence History Does Not Exist</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- sweetalert success -->
    <?php if ($this->session->flashdata('succes')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                showConfirmButton: false,
                text: '<?= $this->session->flashdata('succes') ?>',
                timer: 1500,
            });
        </script>
    <?php endif; ?>

    <!-- sweetalert success -->
    <?php if ($this->session->flashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                showConfirmButton: false,
                text: '<?= $this->session->flashdata('success') ?>',
                timer: 1500,
            });
        </script>
    <?php endif; ?>

    <!-- sweetalert confirm delete -->
    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url('user/delete_absent') ?>" + "/" + id;
                    }, 1500);
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Your data has been deleted.',
                        icon: 'success',
                        showConfirmButton: false
                    })
                }

            })
        }
    </script>

</body>

</html>