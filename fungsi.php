<?php

function koneksi()
{
    # code...
    $koneksi = mysqli_connect('localhost', 'root', '', 'dbs_note') or die(mysqli_error($koneksi));

    return $koneksi;
}


function registrasi($data)
{
    # code...

    $conn = koneksi();

    $nama   = stripslashes(strtolower($data['nama']));
    $username = stripslashes(strtolower($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);

    $ambil = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '" . $username . "' ");

    if (mysqli_fetch_assoc($ambil)) {

        echo "<script>alert('Username sudah terdaftar');history.go(-1);</script>";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_user VALUES(NULL, '" . $nama . "', '" . $username . "', '" . $password . "')";

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}
