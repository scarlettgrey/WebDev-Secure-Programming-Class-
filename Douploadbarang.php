<?php
    if($_SERVER['REQUEST_METHOD']!='POST') header("location: index.php");
    require_once("connect.php");
    require_once("session.php");
    $token = $_SESSION['token'];
    $token1 = $_POST['token'];
    if(isset($token1) && $token == $token1){
        $namabarang = htmlentities($_POST['namabarang']);
        $hargabarang = htmlentities($_POST['hargabarang']);
        $gambarbarang = $_FILES['gambarbarang']['name'];
        $namapenjual = $_SESSION['Username'];
        $targetsave = "uploads/";
        $targetfile = $targetsave.basename(($_FILES['gambarbarang']['name']));
        $imagefiletype = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
        $newnamepic = md5($gambarbarang).'.'.$imagefiletype;
        $ekstensi = array("jpg","jpeg","png","gif");
        if(in_array($imagefiletype,$ekstensi)){
            if($_FILES['gambarbarang']['size']<=1048576){
                $hasilhashnamagambar = md5($gambarbarang).'.'.$imagefiletype;
                $result = $con->prepare("INSERT INTO products(name,price,image,seller) 
                                    VALUES(?,?,?,?)");
                $result->bind_param("siss",$namabarang,$hargabarang,$newnamepic
                ,$namapenjual);
                $result->execute();
                move_uploaded_file($_FILES['gambarbarang']['tmp_name'],$targetsave.$hasilhashnamagambar);
                echo "Berhasil Menambah Barang";
                
                echo '<a href="index.php">Kembali Ke Menu Utama</a>';
                }            
            }
            else{
                echo "Maks 1MB :)";
            }
        }
        else{
            echo "Cuman boleh ekstensi jpg,png dan jpeg :)";
    }
?>
