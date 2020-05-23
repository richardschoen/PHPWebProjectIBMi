<?php
include('settings.php');


// Connect now using soft coded IBMi access connection string.
       $conn=new PDO("odbc:".$connstring);

       if( $conn ) {
           echo "Connection established.<br />";
       }else{
           echo "Connection could not be established.<br />";
       }

       $query = "select * from qiws.qcustcdt";

       $result = $conn->query($query);

       foreach($result as $row) {
       var_dump($row);
       }

?>

