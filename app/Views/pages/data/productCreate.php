<?= $this->extend('././templates/template'); ?>
<?= $this->section('content'); ?>
<main class="container">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <article>
        <form action="/listproduct/create<?= $action ?>" method="POST">
            <div class="form-group">
                <label for="product_name">Nama Produk</label>
                <input type="text" class="form-control" name="product_name" id="product_name" value="<?= old('product_name') ?>" required>
            </div>
            <div class="form-group">
                <label for="product_qty">Jumlah Produk</label>
                <input type="number" class="form-control" name="product_qty" id="product_qty" value="<?= old('product_qty') ?>" required>
            </div>
            <div class="form-group">
                <label for="product_price">Harga Produk</label>
                <input type="number" class="form-control" name="product_price" id="product_price" value="<?= old('product_price') ?>" required>
            </div>
            <div class="form-group">
                <label for="product_image">Gambar Produk</label>
                <input type="file" class="form-control-file" name="product_image" id="product_image" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</main>

<?= $this->endSection(); ?>