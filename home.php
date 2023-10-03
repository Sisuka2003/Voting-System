<?php
include './showErrors.php';
session_start();
include './connection.php';

if(isset($_SESSION["lang"])){
$lang2=$_SESSION["lang"];
}else{
    $lang2="English";
}

$val="";
if(isset($_GET['pid2'])){    
$val=$_GET['pid2'];
echo $val;
}
$userid = "";
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
}

$status="";
$querySearch="select * from voter where nic='".$userid."'";
$resultSearch=$connection->query($querySearch);
if ($rowSearch=$resultSearch->fetch_assoc()) {
    $status=$rowSearch["status"];
}



if ($userid === "") {
    echo "<script> alert('Unauthorized Access Detected');location='login.php' </script>";
    die();
}else if($status =="can vote"){
    
    if($lang2 === "English"){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="home.css"/>
        <title> Home </title>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    </head>
    <body>
        <div class="div-outer" id="outer">
            <div class="party-trial-non" id="party-trail">
                <span class='sp'>The Voter can Select The Relevant Election Party From The provided Parties</span>
                <br/>
                <br/>
                <br/>
                <a href="home.php#aa">
                <button class='next' onclick="startTrial2();">Next >></button>
                </a>
            </div>
            <div class="member-trial-non" id="member-trial">
                <span class='sp'>Please select 3 members from each list. (Make sure that you don't select the same member twice or thrice)</span>
                <br/>
                <br/>
                <a href="home.php#outer">
                <button class='next' onclick="dismissTrial();">Okay</button>
                </a>
            </div>
            <?php
            include './navBar.php';
            ?>
            <br/>
            <button class='next2' onclick="startTrial();">View Trail ?</button>
            <div class="div-middle">
                <br/>
                <br/>
                <br/>
                <div class="div-inner-bottom" >
                    <?php
                    $query = "SELECT * FROM `party`";
                    $result = $connection->query($query);
                    $pid=0;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                    <div class="parties">
                            <img class="product_img" src="<?php echo $row["image"]; ?>"/>
                            <div class="div-name">
                                <span class="party-name"><?php echo $row["name"]; ?></span>
                            </div>
                            <a href="home.php?pid2=<?php echo $row["id"];?>" class="achorTag" id="aa">
                              <?php
                                if($row['id'] === $val){
                                    ?>
                                <input type="submit"class="checkboxchange" name="pid" value=""/>
                                <?php
                    }else{
                                ?>
                                <input type="submit"class="checkbox" name="pid"  value=""/>
                                <?php
                    }
                                ?>
                                
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <br/>
                    <br/>
                    <br/>
                    <form method="post" action="doHome.php" class="members2">
                        <input type="hidden" name="pid" value="<?php echo $val;?>"/>
                    <div class="divmembers">
                        <br/>
                        <br/>
                        <br/>
                        <select name="mem1" class="combo-1">
                             <option class="opt"  value="" disabled selected >Select</option>   
                               <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <select name="mem2" class="combo-1">
                             <option value="" disabled selected >Select</option>
                            <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <select name="mem3" class="combo-1">  
                            <option value="" disabled selected >Select</option>
                           <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div>
                        <button type="submit" class="subbtn">Submit</button>
                    </div>
                    <br/>
                    <br/>
                    </form>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
         <?php
            include './footer.php';
            ?>
        <script type="text/javascript" src="home.js"></script>
    </body>
</html>
<?php
    }else if($lang2 ==="Sinhala"){
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="home.css"/>
        <title> Home </title>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    </head>
    <body>
        <div class="div-outer">
             <div class="party-trial-non" id="party-trail">
                <span class='sp'>ලබා දී ඇති පක්ෂ වලින් අදාළ මැතිවරණ පක්ෂය තෝරන්න</span>
                <br/>
                <br/>
                <br/>
                <a href="home.php#aa">
                <button class='next' onclick="startTrial2();">Next >></button>
                </a>
            </div>
            <div class="member-trial-non" id="member-trial">
                <h1 class='sp'>කරුණාකර එක් එක් ලැයිස්තුවෙන් සාමාජිකයින් 3 දෙනෙකු තෝරන්න. (එකම සාමාජිකයා දෙවරක් හෝ තුන් වරක් තෝරා නොගැනීමට වග බලා ගන්න)</h1>
                <a href="home.php#outer">
                <button class='next' onclick="dismissTrial();">හරි </button>
                </a>
            </div>
            <?php
            include './navBar.php';
            ?>
            <br/>
            <button class='next2' onclick="startTrial();">නිබන්ධනය නරඹන්න?</button>
            <div class="div-middle">
                <br/>
                <br/>
                <br/>
                <form class="div-inner-bottom"method="post" action="doHome.php" >
                    <?php
                    $query = "SELECT * FROM `party`";
                    $result = $connection->query($query);
                    $pid=0;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                    <div class="parties">
                            <img class="product_img" src="<?php echo $row["image"]; ?>"/>
                            <div class="div-name">
                                <span class="party-name"><?php echo $row["name"]; ?></span>
                            </div>
                            <a href="home.php?pid2=<?php echo $row["id"];?>" class="achorTag">
                              <?php
                                if($row['id'] === $val){
                                    ?>
                                <input type="submit"class="checkboxchange" name="pid" value=""/>
                                <?php
                    }else{
                                ?>
                                <input type="submit"class="checkbox" name="pid"  value=""/>
                                <?php
                    }
                                ?>
                                
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <br/>
                    <br/>
                    <br/>
                    <form method="post" action="doHome.php" class="members2">
                        <input type="hidden" name="pid" value="<?php echo $val;?>"/>
                    <div class="divmembers">
                        <br/>
                        <br/>
                        <br/>
                        <select name="mem1" class="combo-1">
                            <option class="opt" value="" disabled selected >තෝරන්න</option>
                               <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <select name="mem2" class="combo-1">
                              <option value="" disabled selected >තෝරන්න</option>
                            <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <select name="mem3" class="combo-1">  
                            <option value="" disabled selected >තෝරන්න</option>
                           <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div>
                          <button type="submit" class="subbtn">ඡන්දය ලබදෙන්න</button>
                    </div>
                    <br/>
                    <br/>
                    </form>
                    </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
         <?php
            include './footer.php';
            ?>
        <script type="text/javascript" src="home.js"></script>
    </body>
</html>
<?php
    }else if($lang2 ==="Tamil"){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="home.css"/>
        <title> Home </title>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    </head>
    <body>
        <div class="div-outer">
               <div class="party-trial-non" id="party-trail">
                <span class='sp'>வழங்கப்பட்ட கட்சிகளிலிருந்து வாக்காளர் சம்பந்தப்பட்ட தேர்தல் கட்சியைத் தேர்ந்தெடுக்கலாம்</span>
                <br/>
                <a href="home.php#aa">
                <button class='next' onclick="startTrial2();">Next >></button>
                </a>
            </div>
            <div class="member-trial-non" id="member-trial">
                <h1 class='sp'>ஒவ்வொரு பட்டியலிலிருந்தும் 3 உறுப்பினர்களைத் தேர்ந்தெடுக்கவும்.<//h1>
                    <br/>
                    <br/>
                <a href="home.php#outer">
                <button class='next' onclick="dismissTrial();">சரி</button>
                </a>
            </div>
            <?php
            include './navBar.php';
            ?>
            <br/>
            <button class='nextT' onclick="startTrial();">டுடோரியலைப் பார்க்கவா?</button>
            <div class="div-middle">
                <br/>
                <br/>
                <br/>
                 <form class="div-inner-bottom"method="post" action="doHome.php" >
                    <?php
                    $query = "SELECT * FROM `party`";
                    $result = $connection->query($query);
                    $pid=0;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                    <div class="parties">
                            <img class="product_img" src="<?php echo $row["image"]; ?>"/>
                            <div class="div-name">
                                <span class="party-name"><?php echo $row["name"]; ?></span>
                            </div>
                            <a href="home.php?pid2=<?php echo $row["id"];?>" class="achorTag">
                              <?php
                                if($row['id'] === $val){
                                    ?>
                                <input type="submit"class="checkboxchange" name="pid" value=""/>
                                <?php
                    }else{
                                ?>
                                <input type="submit"class="checkbox" name="pid"  value=""/>
                                <?php
                    }
                                ?>
                                
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <br/>
                    <br/>
                    <br/>
                    <form method="post" action="doHome.php" class="members2">
                        <input type="hidden" name="pid" value="<?php echo $val;?>"/>
                    <div class="divmembers">
                        <br/>
                        <br/>
                        <br/>
                        <select name="mem1" class="combo-1">
                          <option class="opt" value="" disabled selected >தேர்ந்தெடுக்கவும்</option>   
                               <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <select name="mem2" class="combo-1">
                             <option value="" disabled selected >தேர்ந்தெடுக்கவும்</option>   
                            <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <select name="mem3" class="combo-1">  
                            <option value="" disabled selected >தேர்ந்தெடுக்கவும்</option>   
                           <?php
                                    $querye1 = "SELECT * FROM `electors` where `party_id`='".$val."'";
                                    $resulte1 = $connection->query($querye1);

                                    while ($rowe1 = $resulte1->fetch_assoc()) {
                                        ?>
                             <option  class="opt" value="<?php echo $rowe1["register_id"];?>"><?php echo $rowe1["register_id"];?></option>
                               <?php
                                    }
                               ?>
                        </select>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div>
                        <button type="submit" class="subbtn">வாக்கு</button>
                    </div>
                    <br/>
                    <br/>
                </form>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
         <?php
            include './footer.php';
            ?>
        <script type="text/javascript" src="home.js"></script>
    </body>
</html>
<?php
    }
}else{
      echo "<script> alert('You Had Already Voted');location='profile.php' </script>";
    die();
//    echo "error";
}
?>