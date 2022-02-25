<?php
    require "./component/function.php";

    $select = $_GET['id'];
    $letter = query(" SELECT * FROM surat WHERE id='$select' ");

    $user = query("SELECT email FROM user");

    if(isset($_POST["back"])){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
        exit;
    } else if(isset($_POST["delete"])){
        controlBTN("deleted", $select);
    } else if(isset($_POST["replace"])){
        controlBTN("inbox", $select);
    }  else if(isset($_POST["save"])){
        controlBTN("storage", $select);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sender</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/676d1da154.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="head">
                <div class="logo">
                    <i class="fas fa-code"></i>
                    <h1>OpenCode</h1>
                </div>
                <div class="logout">
                    <a href="login.php">Logout</a>
                    <i class="fas fa-door-open"></i>
                </div>
            </div>

            <?php ?>
                <div class="nav-bar">
                    <ul>
                        <li><a href="create.php">
                            <i class="fas fa-pencil-alt"></i>
                            create
                        </a></li>
                        <li><a href="index.php">
                            <i class="fas fa-inbox"></i>
                            inbox
                        </a></li>
                        <li><a href="">
                            <i class="fas fa-file-import"></i>
                            send
                        </a></li>
                        <li><a href="storage.php">
                            <i class="fas fa-archive"></i>
                            storage
                        </a></li>
                        <li><a href="">
                            <i class="fas fa-ban"></i>
                            unsend
                        </a></li>
                        <li><a href="trash.php">
                            <i class="fas fa-trash-restore-alt"></i>
                            trash
                        </a></li>
                    </ul>
                    <span>
                        <input type="search" name="" id="search" placeholder="search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            <?php ?>
        </div>
        <div class="body">
            <div class="recent">
                <h3>RECENT</h3>
                <ul>
                    <?php foreach($user as $use) :?>
                        <li><?= $use["email"] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="bookshelf">
                <h3>LETTER</h3>
                
                <form action="" method="post" class="control_btn">
                    <span>
                        <button type="submit" name="back">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </button>
                    </span>
                    <button type="submit" name="delete">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    <button type="submit" name="replace">
                        <i class="fas fa-undo"></i>
                    </button>
                    <button type="submit" name="save">
                        <i class="far fa-bookmark"></i>
                    </button>
                </form>

                <div class="letter">
                    <p class="subject"> <?= $letter[0]["subject"] ?> </p>
                    <span>
                        from &nbsp;
                        <p class="username"> <?= $letter[0]["dari"] ?> </p>,
                    </span>
                    <span>
                        email &nbsp;
                        <p class="email"> <?= $letter[0]["email"] ?> </p>
                    </span>
                    <p class="message"> <?= $letter[0]["pesan"] ?> </p>
                </div>
            </div>
        </div>
</body>
                        
</html>