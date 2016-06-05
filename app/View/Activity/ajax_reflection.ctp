<?php 
foreach ($subprocesses as $subprocess) {
	echo "<option value='".$subprocess['Subprocess']['id']."''>".$subprocess['Subprocess']['name']."</option>";

}
?>