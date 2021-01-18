<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['id']; //We attribuate the task's nameid's number entered, to the variable $id in order to pass it 
    if(empty($id)){ //if id is empty we print an error
        echo 'error';
    }else{
        $todos = $conn -> prepare("SELECT id, checked FROM todos WHERE id=?"); //we connect $todos to our database
        $todos->execute([$id]);
        
        $todo = $todos->fetch(); //We fetch $todos, and give it to $todo
        $uId = $todo['id'];
        $checked = $todo['checked'];
        $uChecked = $checked ? 0 : 1; //Boolean, if checked, $uChecked = 0 else $uChecked = 1
        $res = $conn->query("UPDATE todos SET checked=$uChecked WHERE id=$uId"); // We update the value checked in our database
        
        if($res){ //if everything is goo, we can check the task
            echo $checked; 
        }else { //else we print an error
            echo "error";
        }
        
        $conn=null;
        exit();
    }
}else{
    header("Location: ../index.php?mess=error");
}
?>