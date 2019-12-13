<!DOCTYPE html>
<?php
require_once("session.php");
?>
<?php require_once("ref/fc.php");?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To Walmart</title>
    <style><?php include("ref/sty.css"); ?></style>
</head>
<body>
    <div class="top-head-bar"> 
        <?php
            if(isset($_SESSION['Username'])){
                echo "Hi, ".$_SESSION['Username'];
        ?>
        <form action="cart.php" method="POST">
            <input type="submit" value="Cart">
        </form>
        <form action="Dologout.php" method="POST">
            <input type="submit" value="Logout">
        </form>
        
        <?php }else{ ?>
            <form action="Dologin.php" method="post">
                <input type="text" name="username" placeholder="Username" class="in-txt">
                <input type="password" name="password" placeholder="Password" class="in-txt">
                <input type="hidden" name = "token" value = <?= $_SESSION['token'] ?> >
                <input type="submit" value="Login"> | <a href="register.php">Don't Have Account ? Register Now!</a>
            </form>
        <?php } ?>
        <hr>
    </div>
    <?php
        if(has_err()){
    ?>
    <div class="top-head-error">
        <b>Unable to Login!</b> Invalid username/password.
    </div>
    <?php } ?>
    <div class="nav-bar">
    <a href="#" class="navButton">Games</a>
    <a href="#" class="navButton">Software</a>
    <a href="#" class="navButton">In-Game Items</a>
    <a href="#" class="navButton">News</a>
    </div>
    <div class="tambahbarang">
        <form action="uploadbarang.php">
            <input type="submit" value="Upload Barang untuk Dijual">
        </form>
    </div>
    <div class="whitebar">
    <table>
        <tr>
            <td class="tabelbarang"> Gambar </td>
            <td class="tabelbarang"> Nama </td>
            <td class="tabelbarang"> Harga </td>
            <td class="tabelbarang"> Seller </td>
        <?php
        require_once("connect.php");
        $resultbarang = $con->query("SELECT * FROM products");
        foreach ($resultbarang as $key) {
        ?>  
            <tr>
                <td class="tabelbarang"> <img src="<?= 'uploads/'.$key['image'] ?>"></a></td>
                <td class="tabelbarang"> <?= $key['name']?> </td>
                <td class="tabelbarang"> <?= $key['price']?> </td>
                <td class="tabelbarang"> <?= $key['seller']?> </td>
                <td class="tabelbarang">
                    <form action="Dobeli.php" method="post">
                        <input type="hidden" name="id" value="<?=$key['id']?>">
                        <input type="submit" value="Buy Now">
                    </form>
                </td>
            </tr>
        <?php }

        $con->close();
        ?>
    </table>
    </div>
</body>
</html>
