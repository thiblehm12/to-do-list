<?php
session_start();
if(isset($_POST['title'])){ //If sthg is written,
    require '../db_conn.php';

    $title = $_POST['title']; //We attribuate the task's name entered, to the variable $title
    if(!isset($_SESSION["useruid"]) && !empty($title)){  //If the user is not connected, he can't add a task
        header("Location: ../index.php?mess=notconnected"); //We use the url to pass the information in the main code and then print the error message
    }
    elseif (empty($title)){  //If the user try to enter an empty task, an error is printed
        header("Location: ../index.php?mess=error");
    }
    else{ //Else, if every conditions are good, we can add a task
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if ($res){ //if everything is good, we print the following url
            header("Location: ../index.php?mess=success");

        }else{ //else, we send the user back on the index page
            header("Location: ../index.php");
        }
        $conn=null;
        exit();
    }
}else{ //If nothing is written and the user try to add a task, we print an error in the url
    header("Location: ../index.php?mess=error");
}
?>