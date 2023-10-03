<?php
include './showErrors.php';
session_start();
include './connection.php';
$userid = "";
$fname = "";
$gender = "";
$nic= "";
$district = "";
$division = "";
$gn_division = "";
$img = "";
$language="English";

if(isset($_GET["language"])){
    $language=$_GET["language"];
    $_SESSION["lang"]=$language;
}
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
}
if ($userid === '') {
    echo "<script> alert('Unknown Error Occured. Please Register Again');location='register.php' </script>";
    die();
}

$select = "SELECT * FROM voter  join district on voter.district_id=district.id join division on voter.division_id=division.id join gn_division on voter.gn_division_id=gn_division.id WHERE voter.nic='" . $userid . "'";
$result = $connection->query($select);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fname = $row['full_name'];
$gender = $row['gender'];
$nic= $row['nic'];
$district = $row['dis_name'];
$division = $row['div_name'];
$gn_division = $row['gn_div_name'];
$img = $row['profile_pic'];
    }
//    echo $fname;
//     echo $gender;
//     echo $nic;
//     echo $district;
//     echo $division;
//     echo $gn_division;
//     echo $img;
}
if($language === "English"){
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link type="text/css" rel="stylesheet" href="profile.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;600&family=Ranchers&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="shortcut icon" href="images/sri-lanka.png"/>
    </head>
    <body>
        <div class="box-outer-div" >

            <table class="nav-div" border="0">
                <tr>
                    <td class="logo"></td>
                    <td class="seperaor"></td>
                    <td class="directing-pages">
                        
                        <form method="get" action="profile.php">    
                <select  name="language" class="lang_option">
                    <option disabled selected><?php echo $language;?></option>
                    <option>Sinhala</option>
                    <option>Tamil</option>
                    <option>English</option>
                </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="translate">Translate</button>
                        </form>
                        <button class="move-btn" onclick="popupMenu2();"><img src="images/menu.png" width="37" height="37"/></button>
                        <ul class="nav-pages" id="nav-pages">
                            <div class="top-div-nav">
                                <img src="images/cancel.png" width="25" height="25" onclick="popoutMenu();">
                            </div>
                            <li class="li1"><a href="home.php" class="anchor-tag">Vote</a></li>
                            <li class="li1"><a href="about_us.php" class="anchor-tag">About Us</a></li>
                            <li class="li1"><a href="logout.php" class="anchor-tag">Log Out</a></li>
                        </ul> 
                    </td>
                </tr>
            </table>

            <div class="profile-outer-div" id="profile-outer-div">
                <div class="original-details-div">
                    <div class="dp">
                        <img src="<?php echo $img;?>" class="dp-img"/>
                    </div>
                    <br/>
                    <br/>
                    <p class="username"><?php echo $nic; ?></p>
                    <br/>
                    <p class="email"><?php echo $fname; ?></p>
                    <br/>
                    <br/>
                </div>
                <div class="details-seperator-div"></div>
                <div class="updating-details-div">
                    <form method="post" action="updateProfile.php" enctype="multipart/form-data" class="form-out">
                     <div class="div-set-1">
                         <input type="text"  class="user-input-field" placeholder="NIC Number"   name="nic" required value="<?php echo $nic;?>" readonly/> <!-- nic entering input-->
                         <input type="text"  class="combo-11" placeholder="Gender" required name="gender" value="<?php echo $gender;?>" /> <!-- gender entering input-->
                            </div>
                            <div class="div-set-02">
                                <input type="text"  class="user-input-field2" placeholder="Full Name" name="name" value="<?php echo $fname;?>"required /> <!-- full name entering input-->
                            </div>
                            <div class="div-set-03">
                                <input type="text"  class="combo-1" placeholder="District" value="<?php echo $district;?>"   readonly/><!-- district entering input-->
                                <input type="text" class="combo-12" placeholder="Division" value="<?php echo $division;?>"   readonly/><!-- division entering input-->
                            </div>
                            <div class="div-set-04">
                                <input type="text" class="combo-1-large"placeholder="GN Division" value="<?php echo $gn_division;?>"   readonly/><!-- gn division entering input-->
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                        <input type="file" name="img" id="file" hidden/>
                        <label class="lb-icon" for="file" >Upload Profile Picture</label>
                        <br/>
                        <br/>
                        <br/>
                        <input type="submit" value="Save" class="submit-button"/>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="profile.js"></script>
    </body>
</html>
<?php
}else if($language === "Sinhala"){

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ගිණුම</title>
        <link type="text/css" rel="stylesheet" href="profile.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;600&family=Ranchers&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="shortcut icon" href="images/sri-lanka.png"/>
    </head>
    <body>
        <div class="box-outer-div" >

            <table class="nav-div" border="0">
                <tr>
                    <td class="logo"></td>
                    <td class="seperaor"></td>
                    <td class="directing-pages">
                        
                        <form method="get" action="profile.php">    
                <select  name="language" class="lang_option">
                    <option disabled selected><?php echo $language;?></option>
                    <option>Sinhala</option>
                    <option>Tamil</option>
                    <option>English</option>
                </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="translate">පරිවර්තනය කරන්න</button>
                        </form>
                        <button class="move-btn" onclick="popupMenu2();"><img src="images/menu.png" width="37" height="37"/></button>
                        <ul class="nav-pages" id="nav-pages">
                            <div class="top-div-nav">
                                <img src="images/cancel.png" width="25" height="25" onclick="popoutMenu();">
                            </div>
                            <li class="li1"><a href="home.php" class="anchor-tag">ඡන්දය දෙන්න</a></li>
                            <li class="li1"><a href="about_us.php" class="anchor-tag">අපේ තොරතුරු</a></li>
                            <li class="li1"><a href="logout.php" class="anchor-tag">ඉවත් වන්න</a></li>
                        </ul> 
                    </td>
                </tr>
            </table>

            <div class="profile-outer-div" id="profile-outer-div">
                <div class="original-details-div">
                    <div class="dp">
                        <img src="<?php echo $img;?>" class="dp-img"/>
                    </div>
                    <br/>
                    <br/>
                    <p class="username"><?php echo $nic; ?></p>
                    <br/>
                    <p class="email"><?php echo $fname; ?></p>
                    <br/>
                    <br/>
                </div>
                <div class="details-seperator-div"></div>
                <div class="updating-details-div">
                    <form method="post" action="updateProfile.php" enctype="multipart/form-data" class="form-out">
                     <div class="div-set-1">
                         <input type="text"  class="user-input-field" placeholder="NIC Number"   name="nic" required value="<?php echo $nic;?>" readonly/> <!-- nic entering input-->
                         <input type="text"  class="combo-11" placeholder="Gender" required value="<?php echo $gender;?>" /> <!-- gender entering input-->
                            </div>
                            <div class="div-set-02">
                                <input type="text"  class="user-input-field2" placeholder="Full Name" value="<?php echo $fname;?>"required /> <!-- full name entering input-->
                            </div>
                            <div class="div-set-03">
                                <input type="text"  class="combo-1" placeholder="District" value="<?php echo $district;?>"  required/><!-- district entering input-->
                                <input type="text" class="combo-12" placeholder="Division" value="<?php echo $division;?>"  required/><!-- division entering input-->
                            </div>
                            <div class="div-set-04">
                                <input type="text" class="combo-1-large"placeholder="GN Division" value="<?php echo $gn_division;?>"  required/><!-- gn division entering input-->
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                        <input type="file" name="img" id="file" hidden/>
                        <label class="lb-icon" for="file" >රූපය ඇතුළු කරන්න</label>
                        <br/>
                        <br/>
                        <br/>
                        <input type="submit" value="යාවත්කාලීන කරන්න" class="submit-button"/>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="profile.js"></script>
    </body>
</html>
<?php }else if($language ==="Tamil"){ ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>கணக்கு</title>
        <link type="text/css" rel="stylesheet" href="profile.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;600&family=Ranchers&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="shortcut icon" href="images/sri-lanka.png"/>
    </head>
    <body>
        <div class="box-outer-div" >

            <table class="nav-div" border="0">
                <tr>
                    <td class="logo"></td>
                    <td class="seperaor"></td>
                    <td class="directing-pages">
                        
                        <form method="get" action="profile.php">    
                <select  name="language" class="lang_option">
                    <option disabled selected><?php echo $language;?></option>
                    <option>Sinhala</option>
                    <option>Tamil</option>
                    <option>English</option>
                </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="translate">மொழிபெயர்  </button>
                        </form>
                        <button class="move-btn" onclick="popupMenu2();"><img src="images/menu.png" width="37" height="37"/></button>
                        <ul class="nav-pages" id="nav-pages">
                            <div class="top-div-nav">
                                <img src="images/cancel.png" width="25" height="25" onclick="popoutMenu();">
                            </div>
                            <li class="li1"><a href="home.php" class="anchor-tag">வாக்கு</a></li>
                            <li class="li1"><a href="about_us.php" class="anchor-tag">எங்கள் தகவல்   </a></li>
                            <li class="li1"><a href="logout.php" class="anchor-tag">வெளியேறு</a></li>
                        </ul> 
                    </td>
                </tr>
            </table>

            <div class="profile-outer-div" id="profile-outer-div">
                <div class="original-details-div">
                    <div class="dp">
                        <img src="<?php echo $img;?>" class="dp-img"/>
                    </div>
                    <br/>
                    <br/>
                    <p class="username"><?php echo $nic; ?></p>
                    <br/>
                    <p class="email"><?php echo $fname; ?></p>
                    <br/>
                    <br/>
                </div>
                <div class="details-seperator-div"></div>
                <div class="updating-details-div">
                    <form method="post" action="updateProfile.php" enctype="multipart/form-data" class="form-out">
                     <div class="div-set-1">
                         <input type="text"  class="user-input-field" placeholder="NIC Number"   name="nic" required value="<?php echo $nic;?>" readonly/> <!-- nic entering input-->
                         <input type="text"  class="combo-11" placeholder="Gender" required value="<?php echo $gender;?>" /> <!-- gender entering input-->
                            </div>
                            <div class="div-set-02">
                                <input type="text"  class="user-input-field2" placeholder="Full Name" value="<?php echo $fname;?>"required /> <!-- full name entering input-->
                            </div>
                            <div class="div-set-03">
                                <input type="text"  class="combo-1" placeholder="District" value="<?php echo $district;?>"  required/><!-- district entering input-->
                                <input type="text" class="combo-12" placeholder="Division" value="<?php echo $division;?>"  required/><!-- division entering input-->
                            </div>
                            <div class="div-set-04">
                                <input type="text" class="combo-1-large"placeholder="GN Division" value="<?php echo $gn_division;?>"  required/><!-- gn division entering input-->
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                        <input type="file" name="img" id="file" hidden/>
                        <label class="lb-icon" for="file" >படத்தை செருகவும்</label>
                        <br/>
                        <br/>
                        <br/>
                        <input type="submit" value="புதுப்பி" class="submit-button"/>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="profile.js"></script>
    </body>
</html>
<?php } ?>

