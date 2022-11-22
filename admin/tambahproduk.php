<?php
session_start();
require 'function.php';

if(isset($_POST["kirim"])){
    if(tambahproduk($_POST) > 0){
        echo "
        <script type='text/javascript'>
            alert('Data Produk Berhasil Ditambahkan')
            window.location = 'produk.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data Produk Gagal Ditambahkan')
            window.location = 'produk.php';
    </script>
        ";
    }
}
?>
<?php require '../layout/sidebar.php'?>

<div class="main">
    <div class="box">
        <h3>Tambah Data Produk</h3>

        <form action="" method="POST">

            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control">
            
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control">

            <label for="stok">Stok</label>
            <input type="text" name="stok" id="stok" class="form-control">

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="7" rows="8"></textarea>

            </select>
            <button type="button"  name="kirim" class="btn btn-success my-5">Tambah</button>
        </form>
    </div>
</div>