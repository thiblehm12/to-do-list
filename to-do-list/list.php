<?php
session_start();
if(isset($_POST['lists'])){
    require '../db_conn.php';

    $list = $_POST['lists'];
    if($list == 'list1'){
        header("Location: ../index.php?mess=list1");
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$list]);

        if ($res){
            header("Location: ../index.php?mess=success");

        }else{
            header("Location: ../index.php");
        }
        $conn=null;
        exit();
    }
    elseif ($list == 'list2'){
        header("Location: ../index.php?mess=list2");
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$list]);

        if ($res){
            header("Location: ../index.php?mess=success");

        }else{
            header("Location: ../index.php");
        }
        $conn=null;
        exit();
    }
    else{
        header("Location: ../index.php?mess=list3");
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$list]);

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