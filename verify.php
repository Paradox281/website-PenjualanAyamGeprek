<?php
session_start();
include 'config.php';

$username = $_POST["username"];
$password = $_POST["pwd"];
$action = 'true';

$result = $mysqli->query('SELECT * from pelanggan order by id asc');

if($result){
    while($menu = $result ->fetch_object()){
        if($menu->email === $username && $menu ->password === $password){
            $_SESSION ['username'] = $username;
            $_SESSION ['id'] = $menu->id;
            $_SESSION ['nama_depan'] = $menu->nama_depan;
            $_SESSION['login'] = true ;
            $_SESSION['nama_belakang'] = $menu->nama_belakang ;
            $_SESSION['alamat'] = $menu->alamat ;
            $_SESSION['no'] = $menu->no_telp ;
            $_SESSION['email'] = $menu->email ;
            $_SESSION['level'] = $menu->level;
    if ($menu->level == 'admin') {
        header("location:./admin/index.php");
    } else if ($menu->level == '') {
        header("location: index.php");
    }else{
        
    }
}

    echo '<h1>Invalid Login....</h1>';
    echo ("Refresh : 3; url=login.php");
    }
}
?>