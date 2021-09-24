<?php 

include 'DatabaseConection.php';

if (!isset($_POST['Week_Nummer'])) {
    $_POST['Week_Nummer'] = $_GET['Week_Nummer'];
}


$dataplanningMaandag = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = 1 AND week_nummer = :Week_Nummer');
$dataplanningMaandag->execute(array(':Week_Nummer' => $_GET['Week_Nummer']));
$dataplanningMaandag = $dataplanningMaandag->fetchAll(PDO::FETCH_OBJ);

$dataplanningDinsdag = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = 2 AND week_nummer = :Week_Nummer');
$dataplanningDinsdag->execute(array(':Week_Nummer' => $_GET['Week_Nummer']));
$dataplanningDinsdag = $dataplanningDinsdag->fetchAll(PDO::FETCH_OBJ);

$dataplanningWoensdag = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = 3 AND week_nummer = :Week_Nummer');
$dataplanningWoensdag->execute(array(':Week_Nummer' => $_GET['Week_Nummer']));
$dataplanningWoensdag = $dataplanningWoensdag->fetchAll(PDO::FETCH_OBJ);

$dataplanningDonderdag = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = 4 AND week_nummer = :Week_Nummer');
$dataplanningDonderdag->execute(array(':Week_Nummer' => $_GET['Week_Nummer']));
$dataplanningDonderdag = $dataplanningDonderdag->fetchAll(PDO::FETCH_OBJ);

$dataplanningVrijdag = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = 5 AND week_nummer = :Week_Nummer');
$dataplanningVrijdag->execute(array(':Week_Nummer' => $_GET['Week_Nummer']));
$dataplanningVrijdag = $dataplanningVrijdag->fetchAll(PDO::FETCH_OBJ);

$dataplanningZaterdag = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = 6 AND week_nummer = :Week_Nummer');
$dataplanningZaterdag->execute(array(':Week_Nummer' => $_GET['Week_Nummer']));
$dataplanningZaterdag = $dataplanningZaterdag->fetchAll(PDO::FETCH_OBJ);

$dataplanningZondag = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = 7 AND week_nummer = :Week_Nummer');
$dataplanningZondag->execute(array(':Week_Nummer' => $_GET['Week_Nummer']));
$dataplanningZondag = $dataplanningZondag->fetchAll(PDO::FETCH_OBJ);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="PlanningHomePage.css">
    <title>Planning Agenda</title>
</head>
<body id="Body">
<div id="WeekNumber">
    <div id="TitleWeekButtons">
        <h2> week 
            <?php                     
                if (isset($_POST['Week_Nummer'])) {
                    echo $_POST['Week_Nummer'];
                } else {
                    echo $_GET['Week_Nummer'];
                }
            ?>
        </h2>
    </div>
    <div id="WeekButtons">  
    <?php

        $testarray = range(1,52);

        foreach ($testarray as $num) {
    ?>
            <form method="post">
                <button type="submit" class="WeekButonNum" name="Week_Nummer" value="<?php echo $num; ?>"><?php echo $num; ?></button>
            </form>
    <?php
        }
    ?>
            
    </div>
</div>
<div id="OuterBox">
    <div id="FirstInnerBox">
        <div id="BoxRight">
            <a id="ButtonDagLink" href="PlanningHomePage.php?ID=1&Week_Nummer=<?php if (isset($_POST['Week_Nummer'])) { echo $_POST['Week_Nummer']; } else { echo $_GET['Week_Nummer']; } ?>"><button name="Maandag" id="ButtonDag" type="submit" ><h4>Maandag</h4></button></a>
                <div id="TitleTicket">
                    <div id="TitleTicketEen"> 
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php                                
                                if(isset($dataplanningMaandag[0])) {
                                    echo $dataplanningMaandag[0]->Taken,' | ', $dataplanningMaandag[0]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakTwee" dir="auto">
                            <?php
                                if(isset($dataplanningMaandag[1])) {
                                    echo $dataplanningMaandag[1]->Taken,' | ', $dataplanningMaandag[1]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php
                                if(isset($dataplanningMaandag[2])) {
                                    echo $dataplanningMaandag[2]->Taken,' | ', $dataplanningMaandag[2]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakVier" dir='auto'>
                            <?php 
                                if(isset($dataplanningMaandag[3])) {
                                    echo $dataplanningMaandag[3]->Taken,' | ', $dataplanningMaandag[3]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="EditDeleteButton">
                    <button id="EditButtonSmall" type="submit"><a href="PlanningAddPage.php?ID=1"><b>Edit</b></a></button>
                </div>
            </div>
            <div id="BoxRight">
            <a id="ButtonDagLink" href="PlanningHomePage.php?ID=2&Week_Nummer=<?php if (isset($_POST['Week_Nummer'])) { echo $_POST['Week_Nummer']; } else { echo $_GET['Week_Nummer']; } ?>"><button id="ButtonDag" type="submit"><h4>Dinsdag</h4></button></a>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakEen" dir='auto'>
                            <?php 
                                if(isset($dataplanningDinsdag[0])) {
                                    echo $dataplanningDinsdag[0]->Taken,' | ', $dataplanningDinsdag[0]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakTwee" dir='auto'>
                            <?php 
                                if(isset($dataplanningDinsdag[1])) {
                                    echo $dataplanningDinsdag[1]->Taken,' | ', $dataplanningDinsdag[1]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php 
                                if(isset($dataplanningDinsdag[2])) {
                                    echo $dataplanningDinsdag[2]->Taken,' | ', $dataplanningDinsdag[2]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakVier" dir='auto'>
                            <?php 
                                if(isset($dataplanningDinsdag[3])) {
                                    echo $dataplanningDinsdag[3]->Taken,' | ', $dataplanningDinsdag[3]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="EditDeleteButton">
                    <button id="EditButtonSmall" type="submit"><a href="PlanningAddPage.php?ID=2"><b>Edit</b></a></button>
                </div>
            </div>
            <div id="BoxRight">
            <a id="ButtonDagLink" href="PlanningHomePage.php?ID=3&Week_Nummer=<?php if (isset($_POST['Week_Nummer'])) { echo $_POST['Week_Nummer']; } else { echo $_GET['Week_Nummer']; } ?>"><button id="ButtonDag" type="submit"><h4>Woensdag</h4></button></a>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakEen" dir='auto'>
                            <?php 
                                if(isset($dataplanningWoensdag[0])) {
                                    echo $dataplanningWoensdag[0]->Taken,' | ', $dataplanningWoensdag[0]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakTwee" dir='auto'>
                            <?php 
                                if(isset($dataplanningWoensdag[1])) {
                                    echo $dataplanningWoensdag[1]->Taken,' | ', $dataplanningWoensdag[1]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php 
                                if(isset($dataplanningWoensdag[2])) {
                                    echo $dataplanningWoensdag[2]->Taken,' | ', $dataplanningWoensdag[2]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakVier" dir='auto'>
                            <?php 
                                if(isset($dataplanningWoensdag[3])) {
                                    echo $dataplanningWoensdag[3]->Taken,' | ', $dataplanningWoensdag[3]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="EditDeleteButton">
                    <button id="EditButtonSmall" type="submit"><a href="PlanningAddPage.php?ID=3"><b>Edit</b></a></button>
                </div>
            </div>
            <div id="BoxRight">
            <a id="ButtonDagLink" href="PlanningHomePage.php?ID=4&Week_Nummer=<?php if (isset($_POST['Week_Nummer'])) { echo $_POST['Week_Nummer']; } else { echo $_GET['Week_Nummer']; } ?>"><button id="ButtonDag" type="submit"><h4>Donderdag</h4></button></a>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakEen" dir='auto'>
                            <?php 
                                if(isset($dataplanningDonderdag[0])) {
                                    echo $dataplanningDonderdag[0]->Taken,' | ', $dataplanningDonderdag[0]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakTwee" dir='auto'>
                            <?php 
                                if(isset($dataplanningDonderdag[1])) {
                                    echo $dataplanningDonderdag[1]->Taken,' | ', $dataplanningDonderdag[1]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php 
                                if(isset($dataplanningDonderdag[2])) {
                                    echo $dataplanningDonderdag[2]->Taken,' | ', $dataplanningDonderdag[2]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakVier" dir='auto'>
                            <?php 
                                if(isset($dataplanningDonderdag[3])) {
                                    echo $dataplanningDonderdag[3]->Taken,' | ', $dataplanningDonderdag[3]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="EditDeleteButton">
                    <button id="EditButtonSmall" type="submit"><a href="PlanningAddPage.php?ID=4"><b>Edit</b></a></button>
                </div>
            </div>
        </div>
        <div id="SecondInnerBox">
            <div id="BoxLeft">
            <a id="ButtonDagLink" href="PlanningHomePage.php?ID=5&Week_Nummer=<?php if (isset($_POST['Week_Nummer'])) { echo $_POST['Week_Nummer']; } else { echo $_GET['Week_Nummer']; } ?>"><button id="ButtonDag" type="submit"><h4>Vrijdag</h4></button></a>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakEen" dir='auto'>
                            <?php 
                                if(isset($dataplanningVrijdag[0])) {
                                    echo $dataplanningVrijdag[0]->Taken,' | ', $dataplanningVrijdag[0]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakTwee" dir='auto'>
                            <?php 
                                if(isset($dataplanningVrijdag[1])) {
                                    echo $dataplanningVrijdag[1]->Taken,' | ', $dataplanningVrijdag[1]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php 
                                if(isset($dataplanningVrijdag[2])) {
                                    echo $dataplanningVrijdag[2]->Taken,' | ', $dataplanningVrijdag[2]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakVier" dir='auto'>
                            <?php 
                                if(isset($dataplanningVrijdag[3])) {
                                    echo $dataplanningVrijdag[3]->Taken,' | ', $dataplanningVrijdag[3]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="EditDeleteButton">
                    <button id="EditButtonSmall" type="submit"><a href="PlanningAddPage.php?ID=5"><b>Edit</b></a></button>
                </div>
            </div>
            <div id="BoxLeft">
            <a id="ButtonDagLink" href="PlanningHomePage.php?ID=6&Week_Nummer=<?php if (isset($_POST['Week_Nummer'])) { echo $_POST['Week_Nummer']; } else { echo $_GET['Week_Nummer']; } ?>"><button id="ButtonDag" type="submit"><h4>Zaterdag</h4></button></a>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakEen" dir='auto'>
                            <?php 
                                if(isset($dataplanningZaterdag[0])) {
                                    echo $dataplanningZaterdag[0]->Taken,' | ', $dataplanningZaterdag[0]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakTwee" dir='auto'>
                            <?php 
                                if(isset($dataplanningZaterdag[1])) {
                                    echo $dataplanningZaterdag[1]->Taken,' | ', $dataplanningZaterdag[1]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php 
                                if(isset($dataplanningZaterdag[2])) {
                                    echo $dataplanningZaterdag[2]->Taken,' | ', $dataplanningZaterdag[2]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakVier" dir='auto'>
                            <?php 
                                if(isset($dataplanningZaterdag[3])) {
                                    echo $dataplanningZaterdag[3]->Taken,' | ', $dataplanningZaterdag[3]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="EditDeleteButton">
                    <button id="EditButtonSmall" type="submit"><a href="PlanningAddPage.php?ID=6"><b>Edit</b></a></button>
                </div>
            </div>
            <div id="BoxLeft">
            <a id="ButtonDagLink" href="PlanningHomePage.php?ID=7&Week_Nummer=<?php if (isset($_POST['Week_Nummer'])) { echo $_POST['Week_Nummer']; } else { echo $_GET['Week_Nummer']; } ?>"><button id="ButtonDag" type="submit"><h4>Zondag</h4></button></a>
                <div id="TitleTicket">
                    <div id="TitleTicketEen">
                        <h4 id="MaandagPlanVakEen" dir='auto'>
                            <?php 
                                if(isset($dataplanningZondag[0])) {
                                    echo $dataplanningZondag[0]->Taken,' | ', $dataplanningZondag[0]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakTwee" dir='auto'>
                            <?php 
                                if(isset($dataplanningZondag[1])) {
                                    echo $dataplanningZondag[1]->Taken,' | ', $dataplanningZondag[1]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                </div>
                <div id="TitleTicket">
                        <h4 id="MaandagPlanVakDrie" dir='auto'>
                            <?php 
                                if(isset($dataplanningZondag[2])) {
                                    echo $dataplanningZondag[2]->Taken,' | ', $dataplanningZondag[2]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="TitleTicketTwee">
                        <h4 id="MaandagPlanVakVier" dir='auto'>
                            <?php 
                                if(isset($dataplanningZondag[3])) {
                                    echo $dataplanningZondag[3]->Taken,' | ', $dataplanningZondag[3]->teid;
                                } else {
                                    echo ' ';
                                }
                            ?>
                        </h4>
                    </div>
                    <div id="EditDeleteButton">
                    <button id="EditButtonSmall" type="submit"><a href="PlanningAddPage.php?ID=7"><b>Edit</b></a></button>
                </div>
                </div>
            </div>
            <div id="BoxLeftPlus">
                <h4 id="dag">Box</h4>
            </div>
        </div>
    </div>

<?php 

if(isset($_POST['CheckBox'])) {
    $dataplanningDelete = $pdo->prepare('DELETE FROM planningdag WHERE Taken_id = :ID');
    $dataplanningDelete->execute(array(':ID' => $_POST['CheckBox']));
}

if(isset($_GET['ID'])) {
    $dataplanningDagHome = $pdo->prepare('SELECT * FROM planninghome WHERE id = :ID');
    $dataplanningDagHome->execute(array(':ID' => $_GET['ID']));
    $dataplanningDagHome = $dataplanningDagHome->fetchAll();

    $dataplanningOphalen = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = :ID AND week_nummer = :Week_Nummer');
    $dataplanningOphalen->execute(array(':ID' => $_GET['ID'], ':Week_Nummer' => $_GET['Week_Nummer']));
    $dataplanningOphalen = $dataplanningOphalen->fetchAll();

    $dataplanningNoteTaak = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = :ID AND week_nummer = :Week_Nummer');
    $dataplanningNoteTaak->execute(array(':ID' => $_GET['ID'], ':Week_Nummer' => $_GET['Week_Nummer']));
    $dataplanningNoteTaak = $dataplanningNoteTaak->fetchAll();
}
    
?>
    <div id="OuterBoxTwee">
        <div id="DayDisplayBox">
            <?php
                foreach($dataplanningDagHome as $row) {
                    echo '<h2>' . $row['Dag'] . ' :</h2>';
                }
            ?>
        </div>
        <div id="DayDisplayBox1">
            <?php
                foreach($dataplanningOphalen as $row) {
                    echo '<b>Om ' . $row['teid'] . '</b><br>';
                    echo '<b>' . $row['Taken'] . '</b>';
                    echo '<div id="ClassTaak' . $row['urgent'] . '"></div>';
                    ?>
                        <form method="post">
                            <button type="submit" id="DeleteButtonSmall" name="CheckBox" value="<?php echo $row['Taken_id']; ?>">DELETE</button>
                        </form>
                    <?php
                    echo '<b>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|</b><br>';
                }
            ?>
        </div>
        <div id="DayDisplayBox2">
            <?php
                foreach($dataplanningOphalen as $row) {
                    echo '<h2>Notities: ' . $row['Taken'] . '</h2><b>' . $row['notities'] . '</b><br>';
                    echo '<b>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|</b><br>';
                }
            ?>
        </div>
    </div>
</body>
</html>