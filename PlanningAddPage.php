<?php  

include 'DatabaseConection.php';

$dataplanningOphalen = $pdo->prepare('SELECT * FROM planningdag WHERE Dag_Id = :ID');
$dataplanningOphalen->execute(array(':ID' => $_GET['ID']));
$dataplanningOphalen = $dataplanningOphalen->fetchAll();

$dataPlanningDag = $pdo->prepare('SELECT * FROM planninghome WHERE id = :ID');
$dataPlanningDag->execute(array(':ID' => $_GET['ID']));
$dataPlanningDag = $dataPlanningDag->fetchAll();

if(isset($_POST['Submit'])) {
    $dataplanningToevoegen = $pdo->prepare('INSERT INTO planning.planningdag (Dag_Id, Taken, urgent, notities, teid, week_nummer) VALUES (?, ?, ?, ?, ?, ?)');
    $dataplanningToevoegen->execute([$_GET['ID'], $_POST['Taak'], $_POST['Urgent'], $_POST['Note'], $_POST['Time'], $_POST['WeekNumberSelect']]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="PlanningHomePage.css">
    <title>Planning Agenda Edit</title>
</head>
<body>
    <div id="OuterBoxAddPage">
        <div id="InnerOuterBoxAddPage">
            <div id="AddPlanning">
                <?php
                    foreach($dataPlanningDag as $row) {
                        echo '<button id="EditButtonSmall" type="submit"><a href="PlanningHomePage.php?ID=1&Week_Nummer=2"><b>Terug</b></a></button>';
                    }
                ?>
                    <form method="post">
                        <h4><b>Taak toevoegen voor </b>
                            <?php 
                                foreach($dataPlanningDag as $row) {
                                    echo $row['Dag'];
                                }
                            ?>
                        </h4>
                    <textarea name="Taak" id="Taak" cols="30" rows="1" placeholder="Wat is je taak?"></textarea>
                    <select name="Urgent" id="Urgent">
                        <option value="1">Blauw</option>
                        <option value="2">Groen</option>
                        <option value="3">Oranje</option>
                        <option value="4">Rood</option>
                    </select>
                    <select name="WeekNumberSelect" id="WeekNumberSelect">
                        <?php
                            for ($i=1; $i<52; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <textarea name="Note" id="Note" cols="30" rows="10" placeholder="Notities?"></textarea>
                    <br>
                    <label for="Time">Hoelaat wil je starten?</label>
                    <input type="time" name="Time" id="Time">
                    <br>
                    <input id="EditButtonSmall" name="Submit" type="submit" value="Add">
               </form>
            </div>
            <div id="DeletePlanning">
               <?php 
                    foreach($dataplanningOphalen as $row) {
                       echo '<b>' . $row['Taken'] . '</b>';
                       echo '<button id="ClassTaak' . $row['urgent'] . '"></button><br>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

