<?php
    require 'db_conn.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List 2</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
<body>
    <div class="navbar">
        <img src="images/logo2.png" class="logo">
        
            <?php 
                
                if (isset($_SESSION["useruid"])) {
                    echo '<button id="btn" type="button" onclick="redirect5()">Premium</button>';
                }
                else{
                    echo '<button id="btn1" type="button" onclick="redirect()">Sign Up</button>';
                }
            ?>
    </div>
    <div class="main-section">
        
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'notconnected'){ ?>
                    <input type="text" 
                    name="title"
                    style="border-color: #ff6666" 
                    placeholder="You have to be connected !" />
                    <button type="submit">Add &nbsp; <span>&#43</span></button>
                <?php }elseif (isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                    <input type="text" 
                    name="title"
                    style="border-color: #ff6666" 
                    placeholder="This field is required !" />
                    <button type="submit">Add &nbsp; <span>&#43</span></button>
                    
                <?php }else { ?>
                    <input type="text" 
                    name="title"
                    placeholder="What do you need to do ?" />
                    <button type="submit">Add &nbsp; <span>&#43</span></button>
                <?php } ?>  
                <select name="lists">  
                    <option value="list1" onClick="list1()" >List 1</option>  
                    <option value="list2" onClick="list2()" selected>List 2</option> 
                    <option value="list3" onClick="list3()" >List 3</option> 
                </select>    
            </form>


        </div>
        <?php
            $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
        ?>
        <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        
                        <img src="images/f.png" width="320px" height="300px" />
                        
                            
                        <br>
                        <img class="img1" src="images/Ellipsis.gif" width="50px">
                    </div>
                    
                </div>
                
            <?php } ?>
            
            <?php while($todo= $todos->fetch(PDO::FETCH_ASSOC)) {?>

                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>" class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?>
                        <input type="checkbox" class="check-box" <?php echo $todo['id']; ?> checked />

                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                        
                    <?php }else { ?>
                        <input type="checkbox" data-todo-id="<?php echo $todo['id']; ?> " class="check-box">

                        <h2><?php echo $todo['title'] ?></h2>
                        
                    <?php } ?>
                    <br>
                        <small>Created: <?php echo $todo['date_time'] ?></small>
                </div> 
            <?php } ?>
            
        </div>
        
    </div>
    <?php
        include_once 'sidebar.php';
    ?>

    <div class="bubbles">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    
</body>
</html>