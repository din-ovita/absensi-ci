<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recap</title>
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
    }

    @media (min-width: 1200px) {
        section {
            margin-left: 15rem;
            margin-top: 5rem;
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

        section .box .card form h2 {
            text-transform: capitalize;
            margin-bottom: 2rem;
            color: #314641;
        }

        section .box .card form input {
            display: block;
            width: 93%;
            padding: 0.5rem;
            background: #f4f4f4;
            border: 1px solid #a6d5cd;
            margin-top: 0.5rem;
        }

        section .box .card form label {
            font-size: 1.1em;
        }

        section .box .card form input:focus {
            outline: 2px solid #a6d5cd;
        }

        section .box .card form button {
            width: 100%;
            color: #fff;
            background: #a6d5cd;
            border: none;
            margin: 1rem 0;
            padding: 0.5rem 0;
            font-size: 1em;
        }

        .card2 {
            width: 100%;
            margin-top: 2rem;
        }

        .card2 h2 {
            text-transform: capitalize;
            color: #314641;
            margin-bottom: 1rem;
        }

        .card2 button {
            text-decoration: none;
            color: #fff;
            background: #a6d5cd;
            padding: 0.5rem 4rem;
            font-size: 1em;
            width: 100%;
            border: none;
        }
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
                <form action="<?php echo base_url('admin/export_daily_input') ?>" method="post">
                    <h2>daily recap</h2>
                    <div>
                        <label for="">Date</label>
                        <input type="date" name="date">
                    </div>
                    <button type="submit">Export</button>
                </form>
                <hr>
                <div class="card2">
                    <h2 style="margin-top: 1rem;">Recap Today</h2>
                    <button onclick="export_today()">Export</button>
                </div>
            </div>
            <div class="card">
                <form action="<?php echo base_url('admin/export_weekly_input') ?>" method="post">
                    <h2>weekly recap</h2>
                    <div>
                        <label for="">Week</label>
                        <input type="week" name="week">
                    </div>
                    <button type="submit">Export</button>
                </form>
                <hr>
                <div class="card2">
                    <h2 style="margin-top: 1rem;">Recap This Week</h2>
                    <button onclick="export_this_week()">Export</button>
                </div>
            </div>
            <div class="card">
                <form action="<?php echo base_url('admin/export_monthly_input') ?>" method="post">
                    <h2>monthly recap</h2>
                    <div>
                        <label for="">Month</label>
                        <input type="month" name="month">
                    </div>
                    <button type="submit">Export</button>
                </form>
                <hr>
                <div class="card2">
                    <h2 style="margin-top: 1rem;">Recap This Month</h2>
                    <button onclick="export_this_month()">Export</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        function export_today() {
            window.location.href = '<?php echo base_url('admin/export') ?>';
        }

        function export_this_week() {
            window.location.href = '<?php echo base_url('admin/export_week') ?>';
        }

        function export_this_month() {
            window.location.href = '<?php echo base_url('admin/export_month') ?>';
        }
    </script>

</body>

</html>