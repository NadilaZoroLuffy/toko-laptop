<?php
require '../koneksi.php'; 

function query($query){
    global $conn;

    $rows = [];
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambahuser($kirim){
    global $conn;

    $nama_lengkap = htmlspecialchars ($kirim["nama_lengkap"]);
    $username = htmlspecialchars ($kirim["username"]);
    $password = htmlspecialchars ($kirim["password"]);
    $roles = htmlspecialchars ($kirim["roles"]);

    $query = "INSERT INTO user VALUES(NULL,  '$nama_lengkap','$username', '$password', '$roles')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapususer($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM user WHERE id ='$id'");
    return mysqli_affected_rows($conn);
}

function edituser($kirim){
    global $conn;

    $id = htmlspecialchars ($kirim["id"]);
    $nama_lengkap = htmlspecialchars ($kirim["nama_lengkap"]);
    $username = htmlspecialchars ($kirim["username"]);
    $password = htmlspecialchars ($kirim["password"]);
    $roles = htmlspecialchars ($kirim["roles"]);

    $query = "UPDATE user SET
    nama_lengkap = '$nama_lengkap',
    username = '$username',
    password = '$password',
    roles = '$roles' WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahproduk($kirim){
    global $conn;

    $nama_produk = htmlspecialchars ($kirim["nama_produk"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $harga = htmlspecialchars ($kirim["harga"]);
    $stok = htmlspecialchars ($kirim["stok"]);
    $deskripsi = htmlspecialchars ($kirim["deskripsi"]);

    $query = "INSERT INTO produk VALUES(NULL,  '$nama_produk', '$foto','$harga', '$stok', '$deskripsi')";
    move_uploaded_file($files, "./foto/".$foto);

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusproduk($id){
    global $conn;
    
    mysqli_query($conn, "DELETE FROM produk WHERE id ='$id'");
    return mysqli_affected_rows($conn);
}

function editproduk($kirim){
    global $conn;

    $id = htmlspecialchars ($kirim["id"]);
    $nama_produk = htmlspecialchars ($kirim["nama_produk"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $harga = htmlspecialchars ($kirim["harga"]);
    $stok = htmlspecialchars ($kirim["stok"]);
    $deskripsi = htmlspecialchars ($kirim["deskripsi"]);

    if(empty($foto)){
        $query = "UPDATE produk SET
        nama_produk = '$nama_produk',
        harga = '$harga',
        stok = '$stok',
        deskripsi = '$deskripsi' WHERE id = '$id'";
    
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE produk SET
        nama_produk = '$nama_produk',
        harga = '$harga',
        stok = '$stok',
        deskripsi = '$deskripsi' WHERE id = '$id'";
        move_uploaded_file($files, "./foto/".$foto);
    
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}
?>