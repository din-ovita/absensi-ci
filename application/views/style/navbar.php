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
    }

    .nav h2 {
        color: #a6d5cd;
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
            width: 80%;
            margin-left: 14rem;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav h2 {
            color: #a6d5cd;
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
        <a href="<?php echo base_url('user/profile') ?>"><img src="<?php echo base_url('images/user_picture.jpg') ?>" alt=""></a>
    </div>
</div>