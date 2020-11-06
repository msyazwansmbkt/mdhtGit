<?php 
	//define("HOST", "10.10.7.252/DEV01");     
	define("HOST", "localhost:1522/local01");     
	//define("USER", "USER001");     
	define("USER", "ACCT");     
	//define("PASSWORD", "USER001");
	define("PASSWORD", "ACCT");
	/* define("HOST", "db.mbkt.local/dev01");     
	define("USER", "portal");     
	define("PASSWORD", "portal"); */ 
	
	$conn = oci_connect(USER, PASSWORD, HOST);
	if (!$conn) {
		$e = oci_error();
		print_r($e);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}else{
		echo 'success.. <br /><br />';
	}

	// Prepare the statement
	$stid = oci_parse($conn, 'SELECT * FROM TEST');
	if (!$stid) {
		$e = oci_error($conn);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	// Perform the logic of the query
	$r = oci_execute($stid);
	if (!$r) {
		$e = oci_error($stid);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	
	// Fetch the results of the query
	print "<table border='1'>\n";
	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		print "<tr>\n";
		foreach ($row as $item) {
			print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
		}
		print "</tr>\n";
	}
	print "</table>\n";
	
	
