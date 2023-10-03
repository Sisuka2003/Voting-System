<?php
include './showErrors.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="submission.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;600&family=Ranchers&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="images/sri-lanka.png"/>
        <title>Submitting Form...</title>
    </head>
    <body>
        <div class="box-outer">
            <div class="box-div-inner">
                <h2 class="load">Submitting Form ...</h2>
                <?php
                header("Location:  home.php");
                exit();
                ?>
            </div>
        </div>
    </body>
</html>
