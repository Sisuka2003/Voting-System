<?php
include './showErrors.php';
$lang2;
if(isset($_SESSION["lang"])){
$lang2=$_SESSION["lang"];
}else{
    $lang2="English";
}
     if($lang2 ==="English"){       
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>N A V&nbsp;&nbsp;B A R</title>
        <link type="text/css" rel="stylesheet" href="navBar.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link rel="shortcut icon" href="images/carpenter.png"/>
    </head>
    <body>
        <?php
        if (isset($_SESSION["is_login"]) && ($_SESSION["is_login"] == true)) {
            ?>
            <table class="tb1">
                <tbody>
                    <tr>
                        <th class="col0">
                            <div class="logo" id="logo"></div>
                        </th>
                        <th class="col2">
                            <ul class="nav-pages" id="nav-pages">
                                <li class="li3"><a href="profile.php" class="a3" id="a3-animation">Profile</a></li><!--  profile-->
                                <li class="li3"><a href="about_us.php" class="a3" id="a3-animation">About Us</a></li><!--  about us-->
                                <li class="li3"><a href="logout.php" class="a3" id="a3-animation">Logout</a></li><!--  log out-->
                                
                            </ul> 
                            <div class="menu-button" id="menu-button" onclick="popupMenu();">

                                <div class="line1" id="line1" ></div>
                                <div class="line1" id="line2" ></div>
                                <div class="line1" id="line3" ></div>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
            <?php
        } 
        ?>
      
        <script type="text/javascript" src="navBar.js"></script>
    </body>
</html>
<?php
     }else if($lang2 === "Sinhala"){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>N A V&nbsp;&nbsp;B A R</title>
        <link type="text/css" rel="stylesheet" href="navBar.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link rel="shortcut icon" href="images/carpenter.png"/>
    </head>
    <body>
        <?php
        if (isset($_SESSION["is_login"]) && ($_SESSION["is_login"] == true)) {
            ?>
            <table class="tb1">
                <tbody>
                    <tr>
                        <th class="col0">
                            <div class="logo" id="logo"></div>
                        </th>
                        <th class="col2">
                            <ul class="nav-pages" id="nav-pages">
                                <li class="li3"><a href="profile.php" class="a3" id="a3-animation">ගිණුම</a></li><!--  profile-->
                                <li class="li3"><a href="about_us.php" class="a3" id="a3-animation">අපේ තොරතුරු</a></li><!--  about us-->
                                <li class="li3"><a href="logout.php" class="a3" id="a3-animation">ඉවත් වන්න</a></li><!--  log out-->
                            </ul> 
                            <div class="menu-button" id="menu-button" onclick="popupMenu();">

                                <div class="line1" id="line1" ></div>
                                <div class="line1" id="line2" ></div>
                                <div class="line1" id="line3" ></div>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
            <?php
        } 
        ?>
      
        <script type="text/javascript" src="navBar.js"></script>
    </body>
</html>
     <?php }else if($lang2 === "Tamil"){ ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>N A V&nbsp;&nbsp;B A R</title>
        <link type="text/css" rel="stylesheet" href="navBar.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link rel="shortcut icon" href="images/carpenter.png"/>
    </head>
    <body>
        <?php
        if (isset($_SESSION["is_login"]) && ($_SESSION["is_login"] == true)) {
            ?>
            <table class="tb1">
                <tbody>
                    <tr>
                        <th class="col0">
                            <div class="logo" id="logo"></div>
                        </th>
                        <th class="col2">
                            <ul class="nav-pages" id="nav-pages">
                                <li class="li3"><a href="profile.php" class="a3" id="a3-animation">கணக்கு</a></li><!--  profile-->
                                <li class="li3"><a href="about_us.php" class="a3" id="a3-animation">எங்கள் தகவல்   </a></li><!--  about us-->
                                <li class="li3"><a href="logout.php" class="a3" id="a3-animation">வெளியேறு</a></li><!--  log out-->
                            </ul> 
                            <div class="menu-button" id="menu-button" onclick="popupMenu();">

                                <div class="line1" id="line1" ></div>
                                <div class="line1" id="line2" ></div>
                                <div class="line1" id="line3" ></div>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
            <?php
        } 
        ?>
      
        <script type="text/javascript" src="navBar.js"></script>
    </body>
</html>
     <?php } ?>

