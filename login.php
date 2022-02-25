<?php
    require "./component/function.php";
    
    
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $users = mysqli_query($connection,"SELECT * FROM user WHERE email='$email' AND pass='$pass'");

        if( $email !== "" && $pass !== ""){
            if(mysqli_fetch_assoc($users) !== null){
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
                exit;
            } else {
                mysqli_error($connection);
            }
        }
    }

    if(isset($_POST["create"])) {
        $np = $_POST["np"];
        $name = $_POST["name"];
        $new_email = $_POST["new_email"];
        $new_password = $_POST["new_password"];

        $users = mysqli_query($connection,"SELECT NP FROM user WHERE NP='$np'");
        
        if($np !== "" && $name !== "" && 
            $new_email !== "" && $new_password !== ""){
            if(mysqli_fetch_assoc($users) === null){
                addUser($np, $name, $new_email, $new_password);
                echo "<script> alert('berhasil ditambahkan!!') </script>";
            } else {
                echo "<script> alert('gagal ditambahkan!!') </script>";
            }
        } else {
            mysqli_error($connection);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/676d1da154.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method="post" class="form">

        <?php if(!isset($_POST["signup"]) || isset($_POST["cancel"])) : ?>
            <div class="wrap_log">
                <div class="form_login">
                    <h1>LOGIN <span>OpenCode</span></h1>
                    
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" autofocus placeholder="email@gmail.com" >
                    
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" autofocus placeholder="password" >

                    <button type="submit" name="login" id="login">Login</button>

                    <p>If you don't have an account, it's better to create one first</p>
                    <p>
                        Belum punya akun?
                        <button type="submit" name="signup" id="signup">Create New Account</button>
                    </p>
                </div>
                <div class="wrap_login">
                    <span>
                        <i class="fas fa-code"></i>
                        <h1>OpenCode</h1>
                    </span>

                    <p>sebuah tempat pengiriman pesan dalam perusahaan dengan teknologi yang terkini dan membantu karyawan perusahaan</p>
                
                </div>
            </div>
            
            <?php endif; ?>
            
            <?php if(isset($_POST["signup"])) : ?>

                <div class="wrap_sign">
                    <span id="sign_one">
                        <i class="fas fa-bug"></i>
                    </span>
                    <span id="sign_two">
                        <i class="fas fa-bug"></i>
                    </span>
                    <span id="sign_three">
                        <i class="fas fa-bug"></i>
                    </span>
                    <span id="sign_four">
                        <i class="fas fa-bug"></i>
                    </span>
                
                <div class="form_signup">
                    <h1>CREATE NEW ACCOUNT</h1>
                    
                    <label for="np">Nomor Pegawai :</label>
                    <input type="text" name="np" id="np" autofocus placeholder="nomor pegawai">
                    
                    <label for="name">Nama Lengkap :</label>
                    <input type="text" name="name" id="name" autofocus placeholder="nama lengkap">
                    
                    <label for="email">Email :</label>
                    <input type="email" name="new_email" id="email" autofocus placeholder="email@gmail.com">
                    
                    <label for="password">Password :</label>
                    <input type="password" name="new_password" id="password" autofocus placeholder="password">
                    
                    <button type="submit" name="create" id="create">New Account</button>

                    <span>
                        <p>
                            Sudah punya akun ?
                            <button type="submit" name="cancel" id="cancel">Back</button>
                        </p>
                    </span>
                </div>
            </div>

        <?php endif; ?>
    </form>
</body>
</html>