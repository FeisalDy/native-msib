<?php
require 'model.php';

$model = new Model();
$pesanan = $model->getPesanan();
?>

<div class="container">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?url=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <a href="index.php?url=insertpesanan" class="btn btn-primary btn-sm">Insert</a>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pesanan
        </div>
        <div class="card-body">
            <table id="data_pelanggan" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Pelanggan ID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($pesanan as $row) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            <td><?php echo $row['pelanggan_id']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $row['id']; ?>">Detail</a>
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
                                <a href="prosesdeletepesanan.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Detail Pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                                        <p><strong>Tanggal:</strong> <?php echo $row['tanggal']; ?></p>
                                        <p><strong>Total:</strong> <?php echo $row['total']; ?></p>
                                        <p><strong>Status:</strong> <?php echo $row['pelanggan_id']; ?></p>
                                        <p><strong>Tanggal Lahir:</strong> <?php echo $row['status']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </table>
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
                        <form action="prosesupdatepesanan.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <h3>Form Data Pesanan</h3>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total" value="<?php echo $row['total']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="pelanggan_id">Pelangga Id</label>
                                <input type="text" class="form-control" id="pelanggan_id" name="pelanggan_id" value="<?php echo $row['pelanggan_id']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
// include_once 'bottom.php';
?>