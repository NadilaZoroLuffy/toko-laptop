<?php 
session_start();
require 'function.php';

$id = $_GET["id"];  
$user = query("SELECT * FROM user WHERE id = '$id'")[0];   

if(isset($_POST["kirim"])){
    if(editUser($_POST) > 0){
        echo "
        <script type='text/javascript'>
            alert('Data User Berhasil Diubah')
            window.location = 'user.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data User Gagal diubah')
            window.location = 'user.php';
    </script>
        ";
    }
}

?>

<?php require '../layout/sidebar.php'?>

<div class="main">
    <div class="box">
        <h3>Edit Data User</h3>

        <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $user["id"]; ?>">

            <label for="nama_lengkap">Nama Lengkap</label>

            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user["nama_lengkap"]; ?>">

            <label for="useranme">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user["username"]; ?>">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $user["password"]; ?>">

            <label for="roles">Roles</label>
            <select name="roles" id="roles" class="form-control" value="<?= $user["roles"]; ?>">

                <option value="Admin">Admin</option>
                <option value="Customer">Customer</option>

            </select>
            <button type="button"  name="kirim" class="btn btn-success my-5">Edit</button>
        </form>
    </div>
</div>