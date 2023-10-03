<?php
include './showErrors.php';
include './connection.php';
 $keyword="";
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
} else {
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="gn_division.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <title>GN Divisions</title>
    </head>
    <body>
                 <div class="box-outer">
            <div class="box-inner">
                <div class="left">
                    <form method="post" action="doGNDivision.php" class="form-1">
                        <div class="form-top">
                            <input type="text" name="id" class="user-input-field" placeholder="ID Number" autocomplete="off" id="id-1"/>      <!--id field-->
                            <input type="text" name="gnname" class="user-input-field" placeholder="GN Division"  autocomplete="off" id="gnname"/>   <!--name field-->
                            <input type="text" name="divname" class="user-input-field" placeholder="Division"  autocomplete="off" id="dvname"/>   <!--name field-->
                            <input type="text" name="porpulation" class="user-input-field" placeholder="Porpulation"  autocomplete="off" id="popu"/>   <!--pop field-->
                        </div>
                        <div class="button-group">
                            <input type="submit" value="Insert" name="insert" class="act_buttons-1"/>
                            <input type="submit" value="Update" name="update"class="act_buttons-2"/>
                            <input type="submit" value="Delete" name="delete"class="act_buttons-3"/>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <div class="righttop">
                        <form method="get" action="gn_division.php" class="form-2">
                            <input type="text" name="keyword" class="user-input-field2" />
                            <input type="submit" value="Search" name="search" class="act_buttons-4"/>
                        </form>
                    </div>
                    <div class="rightbottom">
                        <table class="tb-user" id="tb-user">
                            <tr>
                                <th>ID</th><th>GN Division</th><th>Division</th><th>Porpulation</th> 
                            </tr>
                            <?php
                            //search distrcit details by thier job role
                            $querys = "SELECT `gn_division`.`id`,`gn_division`.`gn_div_name`,`division`.`div_name`,`gn_division`.`porpulation` FROM `gn_division` join `division` on `gn_division`.`div_id`=`division`.`id` WHERE `gn_division`.`gn_div_name` LIKE '%" . $keyword . "%'";
                            $results = $connection->query($querys);
                            while ($row = $results->fetch_assoc()) {
                                ?>
                                <tr class="data-row">
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["gn_div_name"]; ?></td>
                                    <td><?php echo $row["div_name"]; ?></td>
                                    <td><?php echo $row["porpulation"]; ?></td>
                                </tr>
                                <?php
                            }
                            //end of table data loading and searching
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="gn_division.js"></script>
    </body>
</html>