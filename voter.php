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
        <link type="text/css" rel="stylesheet" href="voter.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <title>Candidate</title>
    </head>
    <body>
        <div class="box-outer">
            <div class="box-inner">
                <div class="left">
                    <form method="post" action="doVoter.php" class="form-1">
                        <div class="form-top">
                            <input type="text" name="id" class="user-input-field" placeholder="ID " autocomplete="off" id="id-1"/>      <!--id field-->
                            <input type="text" name="nic" class="user-input-field" placeholder="NIC Number"  autocomplete="off" id="nic"/>   <!--nic field-->
                            <input type="text" name="name" class="user-input-field" placeholder="Full Name"  autocomplete="off" id="name"/>   <!--name field-->
                            <input type="text" name="gender" class="user-input-field" placeholder="Gender"  autocomplete="off" id="gender"/>   <!--gender field-->
                            <input type="text" name="district" class="user-input-field" placeholder="District"  autocomplete="off" id="district"/>   <!--district field-->
                            <input type="text" name="division" class="user-input-field" placeholder="Division"  autocomplete="off" id="division"/>   <!--division field-->
                            <input type="text" name="gn_division" class="user-input-field" placeholder="GN Division"  autocomplete="off" id="gn_division"/>   <!--gn_division field-->
                        </div>
                        <div class="button-group">
                            <input type="submit" value="Update" name="update"class="act_buttons-2"/>
                            <input type="submit" value="Delete" name="delete"class="act_buttons-3"/>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <div class="righttop">
                        <form method="get" action="voter.php" class="form-2">
                            <input type="text" name="keyword" class="user-input-field2" placeholder="Please Enter The Voter NIC Number"/>
                            <input type="submit" value="Search" name="search" class="act_buttons-4"/>
                        </form>
                    </div>
                    <div class="rightbottom">
                        <table class="tb-user" id="tb-user">
                            <tr>
                                <th>ID</th><th>NIC</th><th>Full name</th><th>Gender</th><th>District</th><th>Division</th><th>GN Division</th> 
                            </tr>
                            <?php
                            //search admin details by thier job role
                            $querys = "SELECT * FROM `voter` join `district` on `voter`.`district_id`=`district`.`id` join `division` on `voter`.`division_id`=`division`.`id` join `gn_division` on `voter`.`gn_division_id`=`gn_division`.`id` where `voter`.`nic` like '%".$keyword."%'";
                            $results = $connection->query($querys);
                            while ($row = $results->fetch_assoc()) {
                                ?>
                                <tr class="data-row">
                                    <td><?php echo $row["voter_id"]; ?></td>
                                    <td><?php echo $row["nic"]; ?></td>
                                    <td><?php echo $row["full_name"]; ?></td>
                                    <td><?php echo $row["gender"]; ?></td>
                                    <td><?php echo $row["dis_name"]; ?></td>
                                    <td><?php echo $row["div_name"]; ?></td>
                                    <td><?php echo $row["gn_div_name"]; ?></td>
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
        <script type="text/javascript" src="voter.js"></script>
    </body>
</html>
