<?php
//memanggil dan memproses file bagian atas
include_once 'top.php';
//memanggil dan memproses file bagian menu
include_once 'menu.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="bg-info text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Usename : admin</h1>
                        <h1 class="text-center">Password : 123</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark text-white">Login Page</div>
                    <div class="card-body">
                        <form id="login-form">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-dark">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
//memanggil file bagian bawah
include_once 'bottom.php';
?>