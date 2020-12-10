<?php
session_start();
if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];
    if(!isset($_SESSION["useruid"]) && !empty($title)){
        header("Location: ../index.php?mess=notconnected");
    }
    elseif (empty($title)){
        header("Location: ../index.php?mess=error");
    }
    else{
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if ($res){
            header("Location: ../index.php?mess=success");

        }else{
            header("Location: ../index.php");
        }
        $conn=null;
        exit();
    }
}else{
    header("Location: ../index.php?mess=error");
}
?>