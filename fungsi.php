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


function login($data)
{
    # code...

    $conn = koneksi();

    $username  = $data['username'];
    $password  = $data['password'];

    $sql = "SELECT * FROM tb_user WHERE username = '" . $username . "' ";

    $query = mysqli_query($conn, $sql);

    $cek = mysqli_num_rows($query);

    if ($cek === 1) {

        $row = mysqli_fetch_assoc($query);

        if (password_verify($password, $row['password'])) {

            header('location:index.php');
        } else {

            echo "<script>alert('password anda salah');history.go(-1);</script>";
        }
    } else {

        echo "<script>alert('username anda salah');history.go(-1);</script>";
    }

    return $cek;
}


function add_note($data)
{
    # code...

    $conn = koneksi();

    $note = $data['note'];

    $sql = "INSERT INTO tb_data VALUES(NULL, '" . $note . "', '" . date('Y-m-d') . "', 'pending')";

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}


function show_note($sql)
{
    # code...

    $conn = koneksi();

    $query = mysqli_query($conn, $sql);

    $row = [];

    while ($rows = mysqli_fetch_assoc($query)) {

        $row[] = $rows;
    }

    return $row;
}
