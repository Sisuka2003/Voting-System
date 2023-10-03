<?php
include './connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SL Elections</title>
        <link type="text/css" rel="stylesheet" href="register.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;600&family=Ranchers&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="images/sri-lanka.png"/>
    </head>
    <body>
        <div class="box-outer">
            <div class="box-inner-out">
                <div class="div-top">
                    <h1 class="header1">Register</h1>
                </div>
                <div class="midder-div">
                    <div class="div-left"></div>
                    <div class="div-right">
                        <form class="data-input-form" method="post"  action="doRegister.php">
                            <div class="div-set-1">
                                <input type="text"  class="user-input-field" placeholder="NIC Number"   name="nic" required /> <!-- nic entering input-->
                                <select name="gender"class="combo-11">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="div-set-02">
                                <input type="text"  class="user-input-field2" placeholder="Full Name"   name="fname" required /> <!-- full name entering input-->
                            </div>
                            <div class="div-set-03">
                                <select name="district" class="combo-1">
                                    <option value="" disabled selected >Select District</option>
                                    <?php
                                    $query = "SELECT * FROM `district`";
                                    $resultd = $connection->query($query);

                                    while ($row = $resultd->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['dis_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                                <input type="text"  name="division"class="combo-1" placeholder="Division"  required/>
                            </div>
                            <div class="div-set-04">
                                <input type="text" name="gndivision" class="combo-1-large"placeholder="GN Division"  required/>
                            </div>
                            <br/>
                            <br/>
                            <input type="submit" value="Submit" class="submit-button"/>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>