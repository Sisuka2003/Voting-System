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
        <link type="text/css" rel="stylesheet" href="elector.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <title>Electors</title>
    </head>
    <body>
        <div class="box-outer">
            <div class="box-inner">
                <div class="left">
                    <form method="post" action="doElectors.php" class="form-1">
                        <div class="form-top">
                            <input type="text" name="id" class="user-input-field" placeholder="ID Number" autocomplete="off" id="id-1"/>      <!--id field-->
                            <input type="text" name="name" class="user-input-field" placeholder="Full Name"  autocomplete="off" id="name"/>   <!--name field-->
                            <select name="party" class="user-input-field-combo"> <!-- Party Field -->
                                <option value="" disabled selected >Select Party</option>
                                <?php
                                $query = "SELECT * FROM `party`";
                                $resultd = $connection->query($query);

                                while ($row = $resultd->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="text" name="register_id" class="user-input-field" placeholder="Register ID"  autocomplete="off" id="register_id"/>   <!--register number field field-->
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
                        <form method="get" action="electors.php" class="form-2">
                            <input type="text" name="keyword" class="user-input-field2" />
                            <input type="submit" value="Search" name="search" class="act_buttons-4"/>
                        </form>
                    </div>
                    <div class="rightbottom">
                        <table class="tb-user" id="tb-user">
                            <tr>
                                <th>ID</th><th>Full Name</th><th>Register ID</th><th>Party</th> 
                            </tr>
                            <?php
                            //search distrcit details by thier job role
                            $querys = "SELECT `electors`.`id`,`electors`.`full_name`,`electors`.`register_id`,`party`.`name` FROM `electors` join `party` on `electors`.`party_id`=`party`.`id` WHERE `party`.`name` LIKE '%" . $keyword . "%'";
                            $results = $connection->query($querys);
                            while ($row = $results->fetch_assoc()) {
                                ?>
                                <tr class="data-row">
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["full_name"]; ?></td>
                                    <td><?php echo $row["register_id"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
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
        <script type="text/javascript" src="elector.js"></script>
    </body>
</html>
