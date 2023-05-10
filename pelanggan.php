<?php
require 'model.php';

$model = new Model();
$pelanggan = $model->getPelanggan();
?>

<div class="container">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?url=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <a href="index.php?url=insertpelanggan" class="btn btn-primary btn-sm">Insert</a>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pelanggan
        </div>
        <div class="card-body">
            <table id="data_pelanggan" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pelanggan as $row) : ?>
                        <tr>
                            <td><?php echo $row['nama_pelanggan']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['jk']; ?></td>
                            <td><?php echo $row['tmp_lahir']; ?></td>
                            <td><?php echo $row['tgl_lahir']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $row['id']; ?>">Detail</a>
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
                                <a href="prosesdeletepelanggan.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Detail Pelanggan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama:</strong> <?php echo $row['nama_pelanggan']; ?></p>
                                        <p><strong>Alamat:</strong> <?php echo $row['alamat']; ?></p>
                                        <p><strong>Jenis Kelamin:</strong> <?php echo $row['jk']; ?></p>
                                        <p><strong>Tempat Lahir:</strong> <?php echo $row['tmp_lahir']; ?></p>
                                        <p><strong>Tanggal Lahir:</strong> <?php echo $row['tgl_lahir']; ?></p>
                                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your update form goes here -->
                    <form action="prosesupdatepelanggan.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <h3>Form Data Pelanggan</h3>
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $row['kode']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $row['jk']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?php echo $row['tmp_lahir']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kartu_id">Kartu ID</label>
                            <input type="text" class="form-control" id="kartu_id" name="kartu_id" value="<?php echo $row['kartu_id']; ?>" required>
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