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
        <link type="text/css" rel="stylesheet" href="admin.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <title>Admin</title>
    </head>
    <body>
        <div class="box-outer">
            <div class="box-inner">
                <div class="left">
                    <form method="post" action="doAdmin.php" class="form-1">
                        <div class="form-top">
                            <input type="text" name="id" class="user-input-field" placeholder="ID Number" autocomplete="off" id="id-1"/>      <!--id field-->
                            <input type="text" name="name" class="user-input-field" placeholder="Username"  autocomplete="off" id="username"/>   <!--username field-->
                            <input type="text" name="pswd" class="user-input-field" placeholder="Password"  autocomplete="off" id="password"/>   <!--password field-->
                            <input type="text" name="designation" class="user-input-field" placeholder="Designation"  autocomplete="off" id="job"/>   <!--designation field-->
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
                        <form method="get" action="admin.php" class="form-2">
                            <input type="text" name="keyword" class="user-input-field2" />
                            <input type="submit" value="Search" name="search" class="act_buttons-4"/>
                        </form>
                    </div>
                    <div class="rightbottom">
                        <table class="tb-user" id="tb-user">
                            <tr>
                                <th>ID</th><th>Username</th><th>Password</th><th>Designation</th> 
                            </tr>
                            <?php
                            //search admin details by thier job role
                            $querys = "SELECT * FROM `admin` WHERE `designation` LIKE '%" . $keyword . "%'";
                            $results = $connection->query($querys);
                            while ($row = $results->fetch_assoc()) {
                                ?>
                                <tr class="data-row">
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>
                                    <td><?php echo $row["designation"]; ?></td>
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
        <script type="text/javascript" src="admin.js"></script>
    </body>
</html>
