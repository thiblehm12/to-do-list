<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['id']; //We attribuate the task's nameid's number entered, to the variable $id in order to pass it 
    if(empty($id)){ //if id is empty we print an error
        echo 0;
    }else{ //else we can delete it by connecting the statement to the database
        $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
        $res = $stmt->execute([$id]); //and then execute the deleting proccess

        if ($res){ //if everything is goo, we can check the task
            echo 1;

        }else{ //else we print an error
            echo 0;
        }
        $conn=null;
        exit();
    }
}else{
    header("Location: ../index.php?mess=error");
}
?>