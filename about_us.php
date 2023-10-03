<?php
include './showErrors.php';
session_start();
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
        <title>A B O U T</title>
        <link type="text/css" rel="stylesheet" href="about.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    </head>
    <body>
        <div class="box-div">
            <?php
            include './navBar.php';
            ?>
            <div class="people-div">
                <div class="people-div-inner">
                    <div class="person">
                        <div class="dp2"></div>
                        <div class="data"  id="person2">
                            <h1 class="h1person">&nbsp;&nbsp;Sisuka Weerasinghe&nbsp;&nbsp;</h1>
                            <br/>
                            <br/>
                            <p class="p-display" id="para2">I'm a software engineer in Java Institute, so I designed this website to give local candidates an opportunity to provide thier valuable vote for the Sri Lanka's General Election even in a pandemic situation.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript" src="about.js"></script>
    </body>
</html>
<?php
     }else if($lang2 ==="Sinhala"){    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>A B O U T</title>
        <link type="text/css" rel="stylesheet" href="about.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    </head>
    <body>
        <div class="box-div">
            <?php
            include './navBar.php';
            ?>
            <div class="people-div">
                <div class="people-div-inner">
                    <div class="person">
                        <div class="dp2"></div>
                        <div class="data"  id="person2">
                            <h1 class="h1person">&nbsp;&nbsp;සිසුක වීරසිංහ&nbsp;&nbsp;</h1>
                            <br/>
                            <br/>
                            <p class="p-display" id="para2">මම ජාවා ආයතනයේ මෘදුකාංග ඉංජිනේරුවරයෙක්, එබැවින් වසංගත තත්වයක් තුළදී වුවද ශ්‍රී ලංකාවේ මහ මැතිවරණය සඳහා දේශීය ඡන්ද අපේක්‍ෂකයින්ට වටිනා ඡන්දයක් ලබා දීම සඳහා මම මෙම වෙබ් අඩවිය සැලසුම් කළෙමි.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript" src="about.js"></script>
    </body>
</html>
     <?php }else if($lang2 === "Tamil"){ ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>A B O U T</title>
        <link type="text/css" rel="stylesheet" href="about.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    </head>
    <body>
        <div class="box-div">
            <?php
            include './navBar.php';
            ?>
            <div class="people-div">
                <div class="people-div-inner">
                    <div class="person">
                        <div class="dp2"></div>
                        <div class="data"  id="person2">
                            <h1 class="h1person">&nbsp;&nbsp;சிசுக வீரசிங்க&nbsp;&nbsp;</h1>
                            <br/>
                            <br/>
                            <p class="p-display" id="para2">நான் ஜாவா இன்ஸ்டிடியூட்டில் மென்பொருள் பொறியாளராக இருக்கிறேன், எனவே தொற்றுநோய் சூழ்நிலையில் கூட இலங்கையின் பொதுத் தேர்தலுக்கு உள்ளூர் வேட்பாளர்களுக்கு மதிப்புமிக்க வாக்குகளை வழங்குவதற்காக இந்த வலைத்தளத்தை வடிவமைத்தேன்.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript" src="about.js"></script>
    </body>
</html>
     <?php } ?>

