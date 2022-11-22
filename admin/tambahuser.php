<?php
session_start();
require 'function.php';

if(isset($_POST["kirim"])){
    if(tambahuser($_POST) > 0){
        echo "
        <script type='text/javascript'>
            alert('Data User Berhasil Ditambahkan')
            window.location = 'user.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data User Gagal Ditambahkan')
            window.location = 'user.php';
    </script>
        ";
    }
}
?>
<?php require '../layout/sidebar.php'?>

<div class="main">
    <div class="box">
        <h3>Tambah Data User</h3>

        <form action="" method="POST">

            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">

            <label for="useranme">Username</label>
            <input type="text" name="username" id="username" class="form-control">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">

            <label for="roles">Roles</label>
            <select name="roles" id="roles" class="form-control">

                <option value="Admin">Admin</option>
                <option value="Customer">Customer</option>

            </select>
            <button type="button"  name="kirim" class="btn btn-success my-5">Tambah</button>
        </form>
    </div>
</div>