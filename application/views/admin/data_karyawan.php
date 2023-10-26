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

    section .box h1 {
        color: #fff;
    }

    section .box .header {
        background: #593f86;
        padding: 0.75rem 1rem;
        display: flex;
        justify-content: space-between;
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

    button {
        color: #fff;
        background: #a568cc;
        border: none;
        margin-left: 1rem;
        padding: 0.5rem 1.5rem;
        font-size: 1em;
    }

    form {
        margin: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    form button {
        margin: 0;
    }

    form input {
        padding: 0.4rem 0.5rem;
        background: #f4f4f4;
        border: 1px solid #593f86;
    }

    form input:focus {
        outline: 2px solid #593f86;
    }

    form a {
        text-decoration: none;
        background-color: #a568cc;
        color: #fff;
        padding: 0.5rem 1rem;
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

        section .box h1 {
            color: #fff;
        }

        .img img {
            width: 4rem;
            height: 4rem;
        }

        section .box .header {
            padding: 1rem 2rem;
        }

        form {
            margin: 1.5rem 2rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        form button {
            margin: 0;
        }

        form input {
            padding: 0.4rem 0.5rem;
            background: #f4f4f4;
            border: 1px solid #593f86;
        }

        form input:focus {
            outline: 2px solid #593f86;
        }

        form a {
            text-decoration: none;
            background-color: #a568cc;
            color: #fff;
            padding: 0.5rem 1rem;
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
        border: 1px solid #593f86;
        background-color: #593f86;
        color: white;
    }

    .img img {
        width: 3.5rem;
        height: 3.5rem;
    }

    .style {
        z-index: 20;
    }

    .aksi {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
    }

    .aksi button:nth-child(1) {
        background: transparent;
        color: #2563eb;
        padding: 0;
        font-size: 1.5em;
        cursor: pointer;
    }

    .aksi button:nth-child(2) {
        background: transparent;
        color: #dc2626;
        padding: 0;
        font-size: 1.5em;
        cursor: pointer;
    }
</style>


<body>
    <div class="style">
        <?php $this->load->view('style/sidebar_admin') ?>
        <?php $this->load->view('style/navbar') ?>
    </div>
    <section>
        <div class="box">
            <div class="header">
                <h1>Employee Data</h1>
                <button onclick="export_karyawan()">Export</button>
            </div>
            <form action="<?php echo base_url('admin/import_karyawan') ?>" enctype="multipart/form-data" method="post">
                <a href="<?php echo base_url('images/format_employee.xlsx') ?>">Download Format</a>
                <div>
                    <input type="file" name="fileExcel" required>
                    <button type="submit">Upload</button>
                </div>
            </form>
            <div class="card2">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">No </th>
                            <th>Image</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th class="full">Full Name</th>
                            <th>Aksi</th>
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
                                    <td class="aksi">
                                        <button onclick="edit(<?php echo $row->id ?>)"><i class="fas fa-info-circle"></i></button>
                                        <button onclick="hapus(<?php echo $row->id ?>)"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Empty Employee Data</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>

                <div class="pagination">
                    <?php echo $pagination_links; ?>
                </div>

            </div>
        </div>
    </section>

    <?php if ($this->session->flashdata('sukses')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $this->session->flashdata('sukses') ?>',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    <?php endif; ?>

    <script>
        function export_karyawan() {
            window.location.href = '<?php echo base_url('admin/export_karyawan') ?>';
        }

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
                        window.location.href = "<?php echo base_url('admin/delete_karyawan') ?>" + "/" + id;
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

        function edit(id) {
            window.location.href = "<?php echo base_url('admin/detail_user') ?>" + "/" + id;
        }
    </script>

</body>

</html>