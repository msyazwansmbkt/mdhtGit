<?php
//$db = 'oci:dbname=10.10.7.252/DEV01'; //e.g. '//192.168.1.1/orcl'
$db = 'oci:dbname=localhost:1522/LOCAL01'; //e.g. '//192.168.1.1/orcl'
$user = 'acct';
$pass = 'acct';
//adjust skit
$conn = new PDO($db,$user,$pass);
if ($conn) {
	echo 'berjaya.. <br /><br />';
	}

/* $tns = "  
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1522))
    )
    (CONNECT_DATA =
      (SID = local01)
    )
  )
       ";
$db_username = "acct";
$db_password = "acct";
try{
    $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
	echo 'success';
}catch(PDOException $e){
    echo ($e->getMessage());
} */

$data = $conn->query("SELECT NAMA FROM TEST")->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    echo $row['NAMA']."<br />\n";
}
?>