<?php
session_start();
require 'function.php';

$user = query("SELECT * FROM user");
?>
<?php require '../layout/sidebar.php'?>

<div class="main">
    <h3>Data User</h3>
    <a href="tambahuser.php" class="tambah">Tambah user</a>
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Roles</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($user as $tambah) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $tambah["nama_lengkap"]; ?></td>
                <td><?= $tambah["username"]; ?></td>
                <td><?= $tambah["roles"]; ?></td>
                <td>
                    <a href="edituser.php?id=<?= $tambah["id"]; ?>" class="edit">Edit</a>
                    <a href="hapususer.php?id=<?= $tambah["id"]; ?>" class="hapus" onClick="return confirm('Anda Yakin ingin menghapus ini');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
    </table>
</div>