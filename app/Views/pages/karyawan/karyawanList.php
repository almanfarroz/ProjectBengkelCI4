<?= $this->extend('./templates/template'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-YTt4b4s3lXxjTrWHt4dL1MnJc+Fn/gRUByo12nKvtoWh0DhPezoXeLZOjsSWZQ2cBPNPylw+YclQSy7A5dvWUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- CodeIgniter 4 Pagination CSS -->
<style>
    /* Custom pagination styling */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 1rem;
    }

    .pagination li {
        margin-right: 0.5rem;
    }

    .pagination li:last-child {
        margin-right: 0;
    }

    .pagination li a {
        text-decoration: none;
    }

    .pagination li.active a {
        color: #fff;
    }

    .pagination li.disabled a {
        color: #6c757d;
    }

    .pagination li a,
    .pagination li span {
        font-size: 1.2rem;
        padding: 0.5rem;
        border-radius: 0.25rem;
    }

    .pagination li a:hover,
    .pagination li a:focus,
    .pagination li.active a {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }
</style>

<main class="container">
    <h1 class="mb-5">List karyawan</h1>
    <?php if (sizeof($karyawans) > 0) : ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = isset($_GET['page']) ? $_GET['page'] * $per_page : 1;
                    foreach ($karyawans as $karyawan) :
                    ?>

                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $karyawan['username'] ?></td>
                            <td><?= $karyawan['email'] ?></td>
                        </tr>


                    <?php
                        $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mt-4">
                    <?= $pager->links() ?>
                </ul>
            </nav>
        </div>

    <?php else : ?>
        <h3 style="text-align: center;">Belum memiliki data karyawan</h3>
    <?php endif ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</main>
<?= $this->endSection(); ?>