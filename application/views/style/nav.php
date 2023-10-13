<style>
    /* @media (min-width: 1200px) { */

    .nav {
        background: #c7e4df;
        padding: 2rem;
        border-top-left-radius: 5rem;
        border-bottom-left-radius: 5rem;
        width: 60%;
        z-index: 10;
    }

    .nav ul {
        display: flex;
        list-style: none;
        gap: 2rem;
    }

    .nav ul li.active p,
    .nav ul li:hover P {
        width: 100%;
        height: 2px;
        background: #fff;
        margin-top: 0.4rem;
    }

    .nav ul li a {
        text-decoration: none;
        font-weight: 500;
        color: #fff;
    }

    .nav ul li a:focus {
        outline: none;
    }

    /* } */
</style>

<div class="nav">
    <ul>
        <li class="<?= $menu == 'profile' ? 'active' : '' ?>"><a href="<?php echo base_url('user/profile') ?>">My Profile</a>
            <p></p>
        </li>
        <li class="<?= $menu == 'change_profile' ? 'active' : '' ?>"><a href="<?php echo base_url('user/change_profile') ?>">Change Profile</a>
            <p></p>
        </li>
        <li class="<?= $menu == 'change_password' ? 'active' : '' ?>"><a href="<?php echo base_url('user/change_password') ?>">Change Password</a>
            <p></p>
        </li>
    </ul>
</div>