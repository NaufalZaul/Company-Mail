<?php
    if(isset($_POST["submit"])){
        echo "yes";
    } else if(isset($_POST["cancel"])){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
        exit;    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
    <div class="send_header">
        <h1>Send Your Massage</h1>
        <img src="./image/undraw_Messenger_re_8bky.png" alt="">
    </div>
    <div class="send_letter">
        <label for="">From :</label>
        <input type="email" name="" id="">
        
        <label for="">To :</label>
        <input type="email" name="" id="">
        
        <label for="">Subject :</label>
        <input type="text" name="" id="">

        <textarea name="" id="" cols="30" rows="10"></textarea>

        <span>
            <input type="file" name="" id="">
        </span>

        <span>
            <button type="submit" name="submit">Send</button>
            <button type="submit" name="cancel">Cancel</button>
        </span>
    </div>

    </form>
</body>
</html>