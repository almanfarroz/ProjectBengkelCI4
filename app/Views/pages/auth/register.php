<?= $this->extend('./templates/template'); ?>

<?= $this->section('content'); ?>
<style>
    /* Style untuk halaman register */
    .container {
        margin-top: 50px;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 32px;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
    }

    .alert-danger {
        margin-bottom: 20px;
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 10px;

    }

    .alert-danger ul {
        margin-bottom: 0;
    }

    .alert-danger li {
        list-style: none;
        margin-left: -1.25em;
    }

    .alert-danger li:before {
        content: "• ";
    }

    @media only screen and (max-width: 768px) {
        .container {
            max-width: 400px;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">

            <h1>Register</h1>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>

            <form action="<?= route_to('store') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="passconf">Confirm Password:</label>
                    <input type="password" class="form-control" id="passconf" name="passconf">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>