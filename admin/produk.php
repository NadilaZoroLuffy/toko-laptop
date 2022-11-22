<?php
session_start();
require 'function.php';

$produk = query("SELECT * FROM produk");
?>
<?php require '../layout/sidebar.php'?>
<div class="container-fluid">
<div class="main">
    <h3>Data Produk</h3>
    <a href="tambahproduk.php" class="tambah">Tambah Produk</a>
    
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($produk as $tambah) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $tambah["nama_produk"]; ?></td>
                <td><img src="../img/<?= $tambah["foto"]; ?>" width="80px"></td>
                <td><?= $tambah["harga"]; ?></td>
                <td><?= $tambah["stok"]; ?></td>
                <td><?= $tambah["deskripsi"]; ?></td>
                <td>
                    <a href="editProduk.php?id=<?= $tambah["id"]; ?>" class="edit">Edit</a>
                    <a href="hapusProduk.php?id=<?= $tambah["id"]; ?>" class="hapus" onClick="return confirm('Anda Yakin ingin menghapus data ini');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
    </table>
</div>
</div>