<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
require_once ($_SERVER['DOCUMENT_ROOT'].'\incl\connectPFFdb.php');

if(isset($_GET['country']))

{
    $country = $_GET['country'];
    $data = array();

 $states = " SELECT PostalCode, StateName, SortOrder FROM LUStates WHERE Deactivate = 0 AND Country = '$country' ORDER BY  SortOrder";
 $statesresult = odbc_prepare($connection,$states);
 $statesexc = odbc_execute($statesresult);

 while ($row = odbc_fetch_array($statesresult)) {
 	$data[] = $row['PostalCode'];
 }

    $reply = array('data' => $data, 'error' => false);

} //close test for country variable passed to ajax php file correctly
else
{
    $reply = array('error' => true);
}

$json = json_encode($reply);    
echo $json; 
?>