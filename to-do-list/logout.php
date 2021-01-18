<?php

session_start();
session_unset();
session_destroy(); //to logout we simply deestroy the session and then send the user on the landing page; landing.php

header("location: landing.php");
exit();
