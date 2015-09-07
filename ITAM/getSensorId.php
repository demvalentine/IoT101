<?php
function getSensorid($pin, $conn){
	//Consultamos el sensor a traves del pin que utilice
	$sql = "SELECT sensorid 
	FROM cSensor 
	WHERE pin=$pin LIMIT 1";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$SensorId = $row["sensorid"];
	
	return $SensorId;
}
?>
