<style>
    * {
        margin: 0;
        padding: 0;
    }

    .nav {
        position: fixed;
        top: 0;
        width: 95%;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
    }

    .nav h2 {
        color: #593f86;
    }

    .profile a img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }


    @media (min-width: 1200px) {
        .nav {
            position: fixed;
            top: 0;
            width: 78%;
            margin-left: 15rem;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav h2 {
            color: #593f86;
        }

        .profile a img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    }
</style>

<div class="nav">
    <h2><i class="fas fa-project-diagram"></i> preSent.</h2>
    <div class="profile">
        <?php foreach ($user as $row) : ?>
            <a href="<?php echo base_url('user/profile') ?>"><img src="<?php echo base_url('images/' . $row->image) ?>" alt=""></a>
        <?php endforeach ?>
    </div>
</div>