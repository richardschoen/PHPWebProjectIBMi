<?php
include('settings.php');

// Connect now using soft coded IBMi access connection string.
       $conn=odbc_connect($connstring, '','');

       if( $conn ) {
           echo "Connection established.<br />";
       }else{
           echo "Connection could not be established.<br />";
       }

       $result=odbc_exec($conn,"select * from qiws.qcustcdt");
       //odbc_fetch_row($result);
       //echo "\nTest\n\n" . odbc_result($result,"CUSNUM") . "\n";
       //odbc_close($conn);

       while (odbc_fetch_row($result)) {
           echo " Customer:".odbc_result($result,'cusnum')." Last name:".odbc_result($result,'lstnam')."<br>";
       }

?>

