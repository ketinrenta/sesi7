<?php
   include_once("konfigurasi.php");
     $psn ="";
    if(isset($_POST["txNAMA"])){
        $pass1 = $_POST["txPASS1"];
        $pass2 = $_POST["txPASS2"];
        if($pass1==$pass2){
            $nama = $_POST["txNAMA"];
            $email = $_POST["txEMAIL"];
            $user = $_POST["txUSER"];
            
            $sql = "INSERT INTO tbuser(nama,email,username,passkey,iduser) VALUES('$nama','$email','$user','".md5($pass1)."','".md5($nama)."');";
            
            $cnn = mysqli_connect(DBHOST, DBUSER,DBPASS, DBNAME, DBPORT)or die("gagal koneki ke dbms");
            $hasil = mysqli_query($cnn,$sql);
            if($hasil){
                $psn ="registrasi user sukses,silakan login dengan user tersebut";
            }else{
                $psn ="registrasi gagal silakan ulangi";

            }


        }else{
            $spn  = "Password tidak sama dengan konfirmasi Password";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi user</title>
</head>
<body>

<?php
    if(!$psn==""){
        echo "<div>" .$psn."</div>";
    }
?>

<form action="registrasi.php" method="POST">
        <div>
            Nama Lengkap user
            <input type="text" name="txNAMA">
        </div>
        
        <div>
            Email
            <input type="text" name="txEMAIL">
        </div>

        <div>
            User Name
            <input type="text" name="txUSER">
        </div>

        <div>
            Password
            <input type="text" name="txPASS1">
        </div>

        <div>
            Password <sup>konfirmasi</sup>
            <input type="text" name="txPASS2">
        </div>

        <div>
        <button type="submit">registrasi</button>
        </div>
         

    </form>
</body>
</html>