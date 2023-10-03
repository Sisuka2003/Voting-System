<?php
include './showErrors.php';
include './connection.php';
$keyword = "";
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
} else {
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="division.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <title>Divisions</title>
    </head>
    <body>
        <div class="box-outer">
            <div class="box-inner">
                <div class="left">
                    <form method="post" action="doDivision.php" class="form-1">
                        <div class="form-top">
                            <input type="text" name="id" class="user-input-field" placeholder="ID Number" autocomplete="off" id="id-1"/>      <!--id field-->
                            <input type="text" name="name" class="user-input-field" placeholder="DIvision"  autocomplete="off" id="name"/>   <!--name field-->
                            <select name="district" class="user-input-field-combo">
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
                        <!--<input type="text" name="district" class="user-input-field" placeholder="District"  autocomplete="off" id="district"/>   name field-->
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
                        <form method="get" action="division.php" class="form-2">
                            <input type="text" name="keyword" class="user-input-field2" />
                            <input type="submit" value="Search" name="search" class="act_buttons-4"/>
                        </form>
                    </div>
                    <div class="rightbottom">
                        <table class="tb-user" id="tb-user">
                            <tr>
                                <th>ID</th><th>Name</th><th>District</th><th>Porpulation</th> 
                            </tr>
                            <?php
                            //search distrcit details by thier job role
                            $querys = "SELECT `division`.`id`,`division`.`div_name`,`district`.`dis_name`,`division`.`porpulation` FROM `division` join `district` on `division`.`dis_id`=`district`.`id` WHERE `division`.`div_name` LIKE '%" . $keyword . "%'";
                            $results = $connection->query($querys);
                            while ($row = $results->fetch_assoc()) {
                                ?>
                                <tr class="data-row">
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["div_name"]; ?></td>
                                    <td><?php echo $row["dis_name"]; ?></td>
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
        <script type="text/javascript" src="division.js"></script>
    </body>
</html>
