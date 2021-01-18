
<!-- This page is a test page to do try some modifications that i'm not 
sure about before pushing it on github even if i can do it directly from there -->



<?php
    require 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
<body>
    <div class="navbar">
        <img src="images/logo1.png" class="logo">
        <button id="btn1" type="button">Sign Up</button>
    </div>
    <div class="main-section">
        
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                    <input type="text" 
                    name="title"
                    style="border-color: #ff6666" 
                    placeholder="This field is required" />
                    <button type="submit">Add &nbsp; <span>&#43</span></button>
                
                <?php }else { ?>
                    <input type="text" 
                    name="title" 
                    placeholder="What do you need to do ?" />
                    <button type="submit">Add &nbsp; <span>&#43</span></button>
                <?php } ?>  
                <select>  
                    <option value="List1">List 1</option>  
                    <option value="List2">List 2</option> 
                    <option value="List3">List 3</option> 
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
    <div id="side-bar">
            <div class="toggle-btn" onclick="toggleSidebar()">
                <div id="slide">
                    <div class="circle icon">
                        <span class="line top"></span>
                        <span class="line middle"></span>
                        <span class="line bottom"></span>
                    </div>
                </div>
            </div>
            <div class="users">
            <img src="images/image2.png"><p>User</p>
            </div>
            <div class="social-links">
                <img src="images/fb.png"><p>Facebook</p>
                <img src="images/ig.png"><p>Instagram</p>
                <img src="images/tw.png"><p>Twitter</p>
            </div>
            <div class="useful-links">
                <img src="images/share.png"><p>Partager</p>
                <img src="images/info.png"><p>F.A.Q</p>
            </div>
        </div>
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

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php",{ 
                    id: id
                },
                (data) => {
                    if(data) {
                        $(this).parent().hide(600);
                    }
                }
                );
            });
            $(".check-box").click(function(e){
                const id =  $(this).attr('data-todo-id');
                
                $.post('app/check.php',
                    {
                        id: id 
                    },
                    (data) => {
                        if(data != 'error'){
                            const h2= $(this).next();
                            if(data === '1'){
                                h2.removeClass('checked');
                            }else {
                                h2.addClass('checked');
                            }
                        }
                    }
                );
            });
        });

        function toggleSidebar(){
            document.getElementById("side-bar").classList.toggle('active');
        };

        $("#slide").click( function() {
            $(".icon").toggleClass("close");
        });
    </script>
    
</body>
</html>
