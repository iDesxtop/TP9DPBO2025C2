<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

$tp = new TampilMahasiswa();
if(isset($_GET['create'])){
    $tp->tampilCreate();
}else if(isset($_POST['add'])){
    $tp->inputCreate($_POST);
}else if(isset($_GET['edit_id'])){
    $id = (int)$_GET['edit_id'];
    $tp->tampilUpdate($id);
}else if(isset($_POST['edit'])){
    $tp->inputUpdate($_POST);
}else if(isset($_GET['hapus'])){
    $id = (int)$_GET['hapus'];
    $tp->delete($id);
}else{
    $data = $tp->tampilTabel();
}
