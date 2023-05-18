<?= $this->extend('././templates/template'); ?>

<?= $this->section('content'); ?>
<style>
    /* Style untuk halaman login */
    .container {
        margin-top: 50px;
        max-width: 400px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="username"],
    input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }



    button[type="submit"]:hover {
        background-color: #0069d9;
    }

    p {
        margin-bottom: 10px;
    }

    a {
        color: #007bff;
    }
</style>
<main class="container">
    <article>
        <h1 style="text-align: center;">Login</h1>
        <p>
            <?php
            if (session()->getFlashData('msg')) {
                echo session()->getFlashData('msg');
            }
            ?>
        </p>
        <form action="login/auth" method="post">


            <div class="form-group">
                <label for="username">Username:</label>
                <input type="username" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p>Don't have account ? <a href="<?= base_url('register') ?>">Register</a></p>
    </article>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"></script>
<?= $this->endSection() ?>