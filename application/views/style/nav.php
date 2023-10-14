<style>
    @media (min-width: 1200px) {
        

    }
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