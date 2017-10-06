<?php
include_once '../config/config.inc.php';
header('content-type: application/json; charset=utf-8');

$db = @new mysqli(mysql_host, mysql_user, mysql_password, mysql_db);
mysqli_set_charset($db, "utf8");

if (mysqli_connect_errno() == 0)
{
	
	$sql = "SELECT
			date(datum) as date, (max((`tobi`.`gas`.`zaehlerstand` / 10)) - min((`tobi`.`gas`.`zaehlerstand` / 10))) as data
		from
			gas
		GROUP by date(datum)
		order by date(datum)";
	
	
	$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));
	
	$rows = array ();
	
	while ( $row = mysqli_fetch_assoc ( $result ) ) {
		
		
		$datum = $row['date'];
		$value = $row['data'];
		
		$uts=strtotime($datum);
		$uts=$uts+3600;  //Winterzeit
		$datum=date('l, F j y H:i:s',$uts);
		$uts *= 1000; // convert from Unix timestamp to JavaScript time
		$data[] = array((float)$uts,(float) $value);
		
		
	}
	echo json_encode($data, JSON_NUMERIC_CHECK);
}

?>
