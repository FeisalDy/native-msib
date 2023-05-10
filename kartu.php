<?php
require 'model.php';

$model = new Model();
$kartu = $model->getKartu();
?>

<div class="container">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?url=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <a href="index.php?url=insertkartu" class="btn btn-primary btn-sm">Insert</a>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kartu
        </div>
        <div class="card-body">
            <table id="data_pelanggan" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Diskon</th>
                        <th>Iuaran</th>
                    </tr>
                    <?php foreach ($kartu as $row) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['kode']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['diskon']; ?></td>
                            <td><?php echo $row['iuran']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $row['id']; ?>">Detail</a>
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
                                <a href="prosesdeletekartu.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Detail Kartu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                                        <p><strong>Kode:</strong> <?php echo $row['kode']; ?></p>
                                        <p><strong>Nama:</strong> <?php echo $row['nama']; ?></p>
                                        <p><strong>Diskon:</strong> <?php echo $row['diskon']; ?></p>
                                        <p><strong>Iuran:</strong> <?php echo $row['iuran']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your update form goes here -->
                    <form action="prosesupdatekartu.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <h3>Form Data Kartu</h3>
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $row['kode']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="diskon">Diskon</label>
                            <input type="text" class="form-control" id="diskon" name="diskon" value="<?php echo $row['diskon']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="iuran">Iuran</label>
                            <input type="text" class="form-control" id="iuran" name="iuran" value="<?php echo $row['iuran']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
// include_once 'bottom.php';
?>