<?php 
session_start();
require 'function.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id = '$id'")[0];

if(isset($_POST["edits"])){
    if(editproduk($_POST) > 0){
        echo "
        <script type='text/javascript'>
            alert('Data Produk Berhasil Diedit')
            window.location = 'produk.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data Produk Gagal Diedit')
            window.location = 'produk.php';
    </script>
        ";
    }
}

?>

<?php require '../layout/sidebar.php'?>

<div class="main">
    <div class="box">
        <h3>Edit Data produk</h3>

        <form action="" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $produk["id"]; ?>">

        <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $produk["nama_produk"]; ?>">

            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" value="<?= $produk["foto"]; ?>">
            
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="<?= $produk["harga"]; ?>">

            <label for="stok">Stok</label>
            <input type="text" name="stok" id="stok" class="form-control" value="<?= $produk["stok"]; ?>">

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="7" rows="8"><?= $produk["deskripsi"]; ?></textarea>

            </select>
            <button type="button"  name="kirim" class="btn btn-success my-5">Edit</button>
    </div>
</div>