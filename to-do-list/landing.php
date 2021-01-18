<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/landing.css">
    <title>THIBAUT'S TODO</title>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <img src="images/logo2.png" class="logo">
            <ul>
                <li><a  href=" <?php 
                
                if (isset($_SESSION["useruid"])) {
                    echo 'index.php';
                }
                else{
                    echo 'login.php';
                }
                ?>">Go to your lists</a></li>
            </ul>


        </nav>
        <div id="col">
            <div class="left">
                <h1>Hello, welcome on thibaut's todo list, you can achieve your best goals with us !</h1>
                <h2>You can create amazing todo with different lists, you will be so well organized that you will acomplish your biggest goals !</h2>
                
            </div>
            <div class="right">
                <img src="images/undraw_accept_tasks_po1c-4.svg" 
                    alt="" class="image" width="542">
            </div>
        </div>
        <form action="
                <?php 
                    
                    if (isset($_SESSION["useruid"])) { //if user connected, we redirect him on the todolist when he click on the button
                        echo 'index.php';
                    }
                    else{
                        echo 'signup.php'; //else on the login form
                    }
                ?>
            ">
                    <button>Subscribe now, it's free !</button>
            </form>
        <div class="footer">
            
        </div>  
    </div>
</body>
</html>