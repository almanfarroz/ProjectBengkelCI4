<?= $this->extend('././templates/template'); ?>
<?= $this->section('content'); ?>
<main class="container">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <article>
        <form action="/listsupplier/<?= $action ?>" method="POST">
            <header class="mb-4">
                <h1 class="h2"><?= $title ?></h1>
            </header>

            <?= csrf_field() ?>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">
                    Nama
                </label>
                <div class="col-sm-10">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama Supplier" value="<?= $supplier['name'] ?? '' ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="nohp" class="col-sm-2 col-form-label">
                    Nomor Telepon
                </label>
                <div class="col-sm-10">
                    <input type="text" id="nohp" name="nohp" class="form-control" placeholder="Nomor Telepon" value="<?= $supplier['nohp'] ?? '' ?>" required>
                </div>
            </div>


            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" placeholder="Alamat" rows="4" style="resize:none" required><?= $supplier['address'] ?? '' ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</main>

<?= $this->endSection(); ?>