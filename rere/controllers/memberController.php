<?php
session_start();
require_once '../koneksi.php';
require_once '../models/Member.php';

//tangkap request element form
$username = $_POST['username'];
$password = $_POST['password'];

//menyimpan data ke sebuah array
$data = [
    $username, // ? 1
    $password, // ? 2
];

//menciptakan object
$obj = new Member();
$rs = $obj->cekLogin($data);

if(!empty($rs)) { // login sukses!
    //simpan session
    $_SESSION['MEMBER'] = $rs;

    //landing page
    header('location:http://localhost/BASIC/rere/index.php?hal=dataPegawai');

} else { // login Gagal!
    //landing page
    header('location:http://localhost/BASIC/rere/index.php?hal=logingagal');
}