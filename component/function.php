<?php
    
    //connect database
    $connection = mysqli_connect("localhost", "********", "**********", "dbs_email_sender");

    //ambil data
    function query($query){
        global $connection;

        $result = mysqli_query($connection, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }


    function addUser($np , $name , $email ,  $pass){
        global $connection;

        $add = mysqli_query($connection, "INSERT INTO user VALUES('$np', '$name', '$email', '$pass')");

        return $add;
    }


    function controlBTN($penyimpanan, $select){
        global $connection;

        mysqli_query($connection,"UPDATE surat SET penyimpanan='$penyimpanan' WHERE id='$select'");

        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
        exit;
    }
?>
