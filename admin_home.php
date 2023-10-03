<?php
include './showErrors.php';
session_start();
include './connection.php';


$islogin = false;
if (isset($_SESSION["is_admin_login"])) {
    $islogin = $_SESSION["is_admin_login"];
}
if ($islogin) {

$districtid = "";
$division_id = "";
$totalCount = 0;
$totalDistrictCount = 0;
$divisionholderName = "";
$totalDivCount = 0;
$seats = 0;
$Sumseats = 0;
if (isset($_GET["district"])) {
    $districtid = $_GET["district"];
}
if (isset($_GET["division"])) {
    $division_name = $_GET["division"];
    $getDivisionIDquery = "select * from division where div_name ='" . $division_name . "'";
    $resultDivID = $connection->query($getDivisionIDquery);
    if ($rowDivID = $resultDivID->fetch_assoc()) {
        $division_id = $rowDivID["id"];
    }
}

$searchSeats = "select * from district where id='" . $districtid . "'";
$resultSeats = $connection->query($searchSeats);
if ($rowSeats = $resultSeats->fetch_assoc()) {
    $seats = $rowSeats["seats"];
    $divisionholderName = $rowSeats["dis_name"];
}

$searchSumSeats = "select SUM(seats) from district";
$resultSumSeats = $connection->query($searchSumSeats);
if ($rowSumSeats = $resultSumSeats->fetch_assoc()) {
    $Sumseats = $rowSumSeats["SUM(seats)"];
}


$searchTotalVotings = "SELECT * FROM p_votings join party on p_votings.party_id=party.id";
$resultTotalVotings = $connection->query($searchTotalVotings);
while ($rowTotalVotings = $resultTotalVotings->fetch_assoc()) {
    $totalCount = $totalCount + 1;
}

$searchTotalVotings2 = "SELECT * FROM p_votings join party on p_votings.party_id=party.id AND p_votings.dsitrict_id='" . $districtid . "'";
$resultTotalVotings2 = $connection->query($searchTotalVotings2);
while ($rowTotalVotings2 = $resultTotalVotings2->fetch_assoc()) {
    $totalDistrictCount = $totalDistrictCount + 1;
}

$searchTotalVotings3 = "SELECT * FROM p_votings join party on p_votings.party_id=party.id AND p_votings.division_id='" . $division_id . "'";
$resultTotalVotings3 = $connection->query($searchTotalVotings3);
while ($rowTotalVotings3 = $resultTotalVotings3->fetch_assoc()) {
    $totalDivCount = $totalDivCount + 1;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="admin_home.css"/>
        <link  rel="shortcut icon" href="images/sri-lanka.png"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <title>Control Panel</title>
    </head>
    <body>
        <div class='box-outer'>
            <div class="div-top">
                <h1 class="header1">Control Panel</h1>
                <a href="logout.php"><button class="logout">Logout</button></a>
            </div>
            <div class='div-bottom' id="divbtm" >
                <div class='bottom-left'></div>
                <div class='bottom-right'>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <h3 class="h3head">Overall Result</h3>
                    <div class="progress_sections0">
                        <?php
                        $party_id = "";
                        $searchParty = "SELECT * FROM party";
                        $resultVote1 = $connection->query($searchParty);
                        while ($rowSearch1 = $resultVote1->fetch_assoc()) {
                            $party_id = $rowSearch1["id"];

                            $searchPartyVotes = "SELECT COUNT(p_votings.id),image,color,name FROM p_votings join party on p_votings.party_id=party.id where party.id='" . $party_id . "'";
                            $resultVote2 = $connection->query($searchPartyVotes);
                            while ($rowSearch2 = $resultVote2->fetch_assoc()) {
                                $partyCount = $rowSearch2["COUNT(p_votings.id)"];
                                $calculation = ($partyCount / $totalCount) * 100;
                                $getSeats = ($calculation / 100) * $Sumseats;
                                ?>
                                <div class="container">
                                    <div class="picture"><img src="<?php echo $rowSearch2["image"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                <!--<div class="progress" max="10" value="<?php // $val = "2"; echo $val;    ?>"></div>-->
                                    <div class="container-div">
                                        <div style="
                                             width: <?php echo $calculation; ?>%;
                                             height: 11px;
                                             background-color: <?php echo $rowSearch2["color"]; ?>;
                                             border-top-right-radius: 10px;
                                             border-bottom-right-radius: 10px;
                                             position: absolute;
                                             z-index: 2;
                                             transition: 0.5s;
                                             "></div>
                                        <div class="status-bar-text">
                                            <h6 class="val3"><?php echo $rowSearch2["name"]; ?>&nbsp;&nbsp;(&nbsp;<?php echo $partyCount; ?>&nbsp;&nbsp;votes)</h6>
                                            <h5 class="val"><?php echo round($calculation); ?>%</h5>
                                            <h6 class="seats"><?php echo round($getSeats); ?> Seats</h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <br/>
                    <div class="buttons">
                       <a href="admin.php" class="anchor"><button class="btn1">Admin</button></a>
                        &nbsp;&nbsp;
                        <a href="voter.php" class="anchor"><button class="btn1">Candidate</button></a>
                        &nbsp;&nbsp;
                        <a href="districts.php" class="anchor"><button class="btn1">District</button></a>
                        &nbsp;&nbsp;
                       <a href="division.php" class="anchor"> <button class="btn1">Division</button></a>
                        <br/>
                        <a href="gn_division.php" class="anchor"><button class="btn1">GN Division</button></a>
                        &nbsp;&nbsp;
                       <a href="general_election.php" class="anchor"><button class="btn1">Election</button></a>
                        &nbsp;&nbsp;
                        <a href="party.php" class="anchor"><button class="btn1">Parties</button></a>
                        &nbsp;&nbsp;
                        <a href="electors.php" class="anchor"><button class="btn1">Electors</button></a>
                    </div>
                    <br/>
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
            <br/>
            <br/>
            <!--district and division decleration start-->
            <div class="div-bottom2"  id="divbtm2" >
                <div>
                    <h1 class="head1" id="head1">&nbsp;&nbsp;District</h1>
                    <br/>
                    <h1 class="head2" id="head2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Divisional</h1>
                    <br/>
                    <h1 class="head3" id="head3">&nbsp;&nbsp;Votings</h1>
                </div>
                <!--district decleration start-->
                <div class="divbleft"  id="divbleft1">
                    <div class="searcher-div">
                        <form method="get" action="admin_home.php#divbleft1" class="form">
                            <select name="district" class="comboDistrict">
                                <?php
                                if ($districtid === "") {
                                    ?>
                                    <option value="" disabled selected >Select District</option>
                                    <?php
                                    $query = "SELECT * FROM `district`";
                                    $resultd = $connection->query($query);
                                    while ($row = $resultd->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['dis_name']; ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <option value="" disabled selected >
                                        <?php
                                        $querya = "SELECT * FROM `district` where id='" . $districtid . "'";
                                        $resultda = $connection->query($querya);
                                        if ($rowa = $resultda->fetch_assoc()) {
                                            echo $rowa["dis_name"];
                                        }
                                    }
                                    ?>
                                </option>
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
                            <input class="btn-search" value="Search" type="submit"/>
                        </form>
                    </div>
                    <div class="progress_sections2">
                        <?php
                        if ($districtid === "") {
                            $queryPartySelector = "select * from party";
                            $resultSelector = $connection->query($queryPartySelector);
                            while ($rowSelector = $resultSelector->fetch_assoc()) {
                                ?>
                                <div class="container2">
                                    <div class="picture"><img src="<?php echo $rowSelector["image"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                <!--<div class="progress" max="10" value="<?php // $val = "2"; echo $val;    ?>"></div>-->
                                    <div class="container-div">
                                        <div style="
                                             width: 0%;
                                             height: 11px;
                                             background-color: <?php echo $rowSelector["color"]; ?>;
                                             border-top-right-radius: 10px;
                                             border-bottom-right-radius: 10px;
                                             position: absolute;
                                             z-index: 2;
                                             "></div>
                                        <div class="status-bar-text">    
                                            <h6 class="val3"><?php echo $rowSelector["name"]; ?></h6>
                                            <h5 class="val2">0%</h5>
                                            <h6 class="seats"><?php echo $seats; ?> Seats</h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            $selectDistrictExistanceQuery="select * from p_votings where dsitrict_id='".$districtid."'";
                               $selectDistrictExistanceResult=$connection->query($selectDistrictExistanceQuery);
                               if($selectDistrictExistanceRow=$selectDistrictExistanceResult->fetch_assoc()){
                            ?>
                            <?php
                            $party_id = "";
                            $searchParty = "SELECT * FROM party";
                            $resultVote1 = $connection->query($searchParty);
                            while ($rowSearch1 = $resultVote1->fetch_assoc()) {
                                $party_id = $rowSearch1["id"];

                                $searchPartyVotes3 = "SELECT COUNT(p_votings.id),image,color,name FROM p_votings join party on p_votings.party_id=party.id where party.id='" . $party_id . "' AND p_votings.dsitrict_id='" . $districtid . "'";
                                $resultVote3 = $connection->query($searchPartyVotes3);
                                while ($rowSearch3 = $resultVote3->fetch_assoc()) {
                                    $partyCount3 = $rowSearch3["COUNT(p_votings.id)"];
                                    $calculation3 = ($partyCount3 / $totalDistrictCount) * 100;
                                    $SeatsWon = ($calculation3 / 100) * $seats;
                                    ?>
                                    <div class="container2">
                                        <div class="picture"><img src="<?php echo $rowSearch1["image"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                    <!--<div class="progress" max="10" value="<?php // $val = "2"; echo $val;    ?>"></div>-->
                                        <div class="container-div">
                                            <div style="
                                                 width: <?php echo $calculation3; ?>%;
                                                 height: 11px;
                                                 background-color: <?php echo $rowSearch1["color"]; ?>;
                                                 border-top-right-radius: 10px;
                                                 border-bottom-right-radius: 10px;
                                                 position: absolute;
                                                 z-index: 2;
                                                 "></div>
                                            <div class="status-bar-text">
                                                <h6 class="val3"><?php echo $rowSearch1["name"]; ?></h6>
                                                <h5 class="val2"><?php echo round($calculation3); ?>%</h5>
                                                <h5 class="seats"><?php echo round($SeatsWon); ?> Seats</h5>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <?php
                                }
                            }
                        }else{
                            $districtNotExisQuery="select * from district where id='".$districtid."'";
                            $districtNotExisResult=$connection->query($districtNotExisQuery);
                            if($districtNotExisRow=$districtNotExisResult->fetch_assoc()){
                                $existedDiName=$districtNotExisRow["dis_name"];
                             echo "<script> alert('Still There are No Votes From $existedDiName District');location='admin_home.php#divbleft1' </script>";die();
                            }else{
                             echo "<script> alert('Invalid District Record');location='admin_home.php#divbleft1' </script>";die();
                            }
                        }
                        
                                }
                        ?>
                        <br/>
                        <br/>
                        <div class="records">
                            <table>
                                <tr  class="data-row">
                                    <td>Total Votes</td>
                                    <td><?php echo $totalDistrictCount; ?></td>
                                </tr>
                                <?php
                                if ($districtid === "") {
                                    $partyTable = "";
                                    $searchTableQuery = "SELECT * FROM party";
                                    $resultVoteTable = $connection->query($searchTableQuery);
                                    while ($rowSearchTable = $resultVoteTable->fetch_assoc()) {
                                        $partyTable = $rowSearchTable["id"];
                                        ?>
                                        <tr  class="data-row">
                                            <td><?php echo $rowSearchTable["name"]; ?></td>
                                            <td>0</td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    $partyTable = "";
                                    $searchTableQuery = "SELECT * FROM party";
                                    $resultVoteTable = $connection->query($searchTableQuery);
                                    while ($rowSearchTable = $resultVoteTable->fetch_assoc()) {
                                        $partyTable = $rowSearchTable["id"];

                                        $searchPartyVotesTable = "SELECT COUNT(p_votings.id),name FROM p_votings join party on p_votings.party_id=party.id where party.id='" . $partyTable . "' AND p_votings.dsitrict_id='" . $districtid . "'";
                                        $resultVoteTable2 = $connection->query($searchPartyVotesTable);
                                        while ($rowSearchTable2 = $resultVoteTable2->fetch_assoc()) {
                                            $partyCountTable = $rowSearchTable2["COUNT(p_votings.id)"];
                                            ?>
                                            <tr  class="data-row">
                                                <td><?php echo $rowSearchTable2["name"]; ?></td>
                                                <td><?php echo $partyCountTable; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>

                            </table>
                            <br/>
                        </div>
                    </div>

                </div>
                <!--district decleration ends-->

                <!--division decleration start-->
                <div class="divbleft" id="divbleft2">
                    <div class="searcher-div">
                        <form method="get" action="admin_home.php#divbleft2" class="form">
                            <?php
                            if ($divisionholderName === "") {
                                ?>
                                <input name="division" type="text" placeholder="Enter Division" class="comboDistrict"/>
                                <?php
                            } else {
                                ?>
                                <input name="division" type="text" placeholder="Enter Division in <?php echo $divisionholderName; ?> " class="comboDistrict"/>
                                <input type="hidden" name="district" value="<?php echo $districtid; ?>"/>
                                <?php
                            }
                            ?>
                            <input class="btn-search" value="Search" type="submit"/>
                        </form>
                    </div>
                    <div class="progress_sections2">
                        <?php
                        if ($division_id === "") {
                            $queryPartySelector2 = "select * from party";
                            $resultSelector2 = $connection->query($queryPartySelector2);
                            while ($rowSelector2 = $resultSelector2->fetch_assoc()) {
                                ?>
                                <div class="container2">
                                    <div class="picture"><img src="<?php echo $rowSelector2["image"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                    <div class="container-div">
                                        <div style="
                                             width: 0%;
                                             height: 11px;
                                             background-color: <?php echo $rowSelector2["color"]; ?>;
                                             border-top-right-radius: 10px;
                                             border-bottom-right-radius: 10px;
                                             position: absolute;
                                             z-index: 2;
                                             "></div>
                                        <div class="status-bar-text">    
                                            <h6 class="val3"><?php echo $rowSelector2["name"]; ?></h6>
                                            <h5 class="val2">0%</h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <?php
                            $party_id2 = "";
                            $searchParty12 = "SELECT * FROM party";
                            $resultVote12 = $connection->query($searchParty12);
                            while ($rowSearch12 = $resultVote12->fetch_assoc()) {
                                $party_id2 = $rowSearch12["id"];

                                $searchPartyVotes4 = "SELECT COUNT(p_votings.id),image,color,name FROM p_votings join party on p_votings.party_id=party.id where party.id='" . $party_id2 . "' AND p_votings.division_id='" . $division_id . "' AND p_votings.dsitrict_id='" . $districtid . "'";
                                $resultVote4 = $connection->query($searchPartyVotes4);
                                while ($rowSearch4 = $resultVote4->fetch_assoc()) {
                                    $partyCount4 = $rowSearch4["COUNT(p_votings.id)"];
                                    $calculation4 = ($partyCount4 / $totalDivCount) * 100;
                                    ?>
                                    <div class="container2">
                                        <div class="picture"><img src="<?php echo $rowSearch12["image"]; ?>" class="dp-img"/></div>&nbsp;&nbsp;&nbsp;
                                        <div class="container-div">
                                            <div style="
                                                 width: <?php echo $calculation4; ?>%;
                                                 height: 11px;
                                                 background-color: <?php echo $rowSearch12["color"]; ?>;
                                                 border-top-right-radius: 10px;
                                                 border-bottom-right-radius: 10px;
                                                 position: absolute;
                                                 z-index: 2;"></div>
                                            <div class="status-bar-text">
                                                <h6 class="val3"><?php echo $rowSearch12["name"]; ?></h6>
                                                <h5 class="val2"><?php echo round($calculation4); ?>%</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                          <br/>
                        <br/>
                        <div class="records">
                            <table>
                                <tr  class="data-row">
                                    <td>Total Votes</td>
                                    <td><?php echo $totalDivCount; ?></td>
                                </tr>
                                <?php
                                if ($division_id === "") {
                                    $partyTable = "";
                                    $searchTableQuery = "SELECT * FROM party";
                                    $resultVoteTable = $connection->query($searchTableQuery);
                                    while ($rowSearchTable = $resultVoteTable->fetch_assoc()) {
                                        $partyTable = $rowSearchTable["id"];
                                        ?>
                                        <tr  class="data-row">
                                            <td><?php echo $rowSearchTable["name"]; ?></td>
                                            <td>0</td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    $partyTable2 = "";
                                    $searchTableQuery3 = "SELECT * FROM party";
                                    $resultVoteTable3 = $connection->query($searchTableQuery3);
                                    while ($rowSearchTable3 = $resultVoteTable3->fetch_assoc()) {
                                        $partyTable2 = $rowSearchTable3["id"];

                                        $searchPartyVotesTable13 = "SELECT COUNT(p_votings.id),name FROM p_votings join party on p_votings.party_id=party.id where party.id='" . $partyTable2 . "'AND p_votings.division_id='" . $division_id . "' AND p_votings.dsitrict_id='" . $districtid . "'";
                                        $resultVoteTable13 = $connection->query($searchPartyVotesTable13);
                                        while ($rowSearchTable13 = $resultVoteTable13->fetch_assoc()) {
                                            $partyCountTable2 = $rowSearchTable13["COUNT(p_votings.id)"];
                                            ?>
                                            <tr  class="data-row">
                                                <td><?php echo $rowSearchTable13["name"]; ?></td>
                                                <td><?php echo $partyCountTable2; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>

                            </table>
                            <br/>
                        </div>
                    </div>

                </div>
                <!--division decleration ends-->
            </div>

            <!--district and division decleration ends--> 
        </div>
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
        <script type="text/javascript" src="admin_home.js"></script>
    </body>
</html>
<?php
}else{
    echo "<script> alert('Unauthorized Access Detected');location='login.php' </script>";
    die();
}
?>