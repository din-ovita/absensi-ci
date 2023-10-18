<style>
    * {
        margin: 0;
        padding: 0;
    }

    nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #a6d5cd;
        height: 5rem;
    }

    nav ul {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        padding: 1rem 1rem 0 1rem;
    }

    nav ul li {
        margin: 0 1rem;
        height: 100%;
    }

    nav ul li.active {
        background: #a6d5cd;
        width: 50px;
        height: 50px;
        border: 6px solid #fff;
        border-radius: 30px;
        transform: translateY(-40px);
    }

    nav ul li.active a i {
        margin-top: 0.7rem;
    }

    nav ul li a {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: #fff;
    }

    nav ul li a i {
        font-size: 1.5em;
    }

    nav ul li a span {
        display: block;
        margin-top: 0.3rem;
        position: absolute;
        transform: translateY(100px);
    }

    nav ul li.active a span {
        font-size: 0.85em;
    }

    .logout {
        position: absolute;
        visibility: hidden;
    }

    .jam {
        transform: translateY(130px);
    }

    @media (min-width: 1200px) {
        nav {
            position: fixed;
            bottom: 0;
            width: 15rem;
            height: 100%;
            background: #a6d5cd;
        }

        nav ul {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 3.5rem 1rem;
        }

        nav ul li {
            margin: 0.5rem 0;
            padding: 0.5rem 1rem;
            width: 100%;
        }

        nav ul li.active {
            background: #fff;
            border: none;
            width: 100%;
            transform: translateY(0);
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        nav ul li a {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1em;
        }

        nav ul li.active a {
            color: #a6d5cd;
        }

        nav ul li a i {
            font-size: 1.3em;
            margin-right: 0.5em;
        }

        nav ul li.active a i {
            margin-top: 1rem;
        }

        nav ul li a span {
            position: relative;
            margin-top: 0rem;
            margin-bottom: 0rem;
            transform: translateY(0);
        }

        nav ul li.active a span {
            font-size: 1em;
            margin-top: 0.5rem;
            transform: translateY(0);
        }

        .logout {
            position: fixed;
            bottom: 0;
            padding: 2rem;
            visibility: visible;
        }

        .logout a {
            text-decoration: none;
            color: #000;
            text-transform: uppercase;
            font-weight: 500;
        }

        .logout a i {
            font-size: 1.3em;
            color: red;
            margin-top: 0.3rem;
            margin-right: 0.5rem;
        }

        .jam {
            text-align: center;
            margin-top: 3rem;
            color: #fff;
            font-size: 1.1em;
            transform: translateY(0);
        }

        .jam span {
            display: block;
            margin-top: 0.5rem;
            font-size: 1.6em;
        }
    }
</style>

<nav>
    <?php
    date_default_timezone_set("Asia/jakarta");
    ?>
    <ul>
        <li class="<?= $menu == 'dashboard' ? 'active' : '' ?>">
            <a href="<?php echo base_url('user') ?>"> <i class="fas fa-palette"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="<?= $menu == 'absent' ? 'active' : '' ?>">
            <a href="<?php echo base_url('user/absent') ?>"><i class="fas fa-chart-bar"></i> <span>Absent</span></a>
        </li>
        <li class="<?= $menu == 'history' ? 'active' : '' ?>">
            <a href="<?php echo base_url('user/history') ?>"><i class="fas fa-history"></i> <span>History</span></a>
        </li>
        <li class="<?= $menu == 'permission' ? 'active' : '' ?>">
            <a href="<?php echo base_url('user/permission') ?>"><i class="fas fa-minus-circle"></i><span>Permission</span></a>
        </li>
    </ul>
    <p class="jam"><?php echo date('d-m-Y') ?><span id="jam"></span></p>
    <div class="logout">
        <a href="<?php echo base_url('auth/logout') ?>"><i class="far fa-circle"></i> Logout</a>
    </div>
</nav>

<!-- script tanggal & jam -->
<script type="text/javascript">
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ':' + m + ':' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
</script>