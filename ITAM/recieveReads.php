<?php
//Archivo recieveReads.php
include 'dbconfig.php';
include 'getSensorId.php';
//Obtenemos y volvemos legible el objeto JSON enviado por el Arduino
$obj = file_get_contents('php://input');
$json = json_decode($obj);
//Se realiza una comprobacion del pin incluido en el objeto JSON discriminando el tipo de sensor
for ($i=0; $i<count($json->D); $i++){
	$lect = $json->D[$i];
	$idSensor = getSensorid($lect->p, $conn);
	switch ($lect->p) {
		case 7:
		case 8:
		case 9:
		$sql = "INSERT INTO dhumtemp(sensorid, fecha, humedad, temperatura) VALUES (".$idSensor.", NOW(), ".$lect->h.", ".$lect->t.")";
		if ($conn->query($sql) === TRUE) {
			echo "Lectura Añadida";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql->close();
		break;
		case 14:
		case 15:
		case 16:
		case 17:
		case 18:
		Include 'processMoisture.php';
		$tsql = "INSERT INTO dhumsupf(sensorid, fecha, humedad, estado) VALUES (".$idSensor.", NOW(), ".$lect->h.", ".$descripcion.")";
		if ($conn->query($tsql) === TRUE) {
			echo "Lectura Añadida";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$tsql->close();
		break;
		default:
		echo "Ningun sensor esta relacionado a este pin";
		break;
	}
}
$conn->close();
?>  
