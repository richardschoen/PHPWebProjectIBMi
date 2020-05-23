<?php
$connpassword="PASSWORD1";
$connuser="USER1";
$connhost="SYSTEM1";

// Windows ODBC Settings
$connstring="Driver={Client Access ODBC Driver (32-bit)}; System=" . $connhost . "; UID=" . $connuser . ";PWD=" . $connpassword . ";";
//$connstring="Driver={IBM i Access ODBC Driver}; System=" . $connhost . "; UID=" . $connuser . ";PWD=" . $connpassword . ";";
//$connstring="DSN=SYSI164;UID=" . $connuser . ";PWD=" . $connpassword . ";";

// Native PHP PASE ODBC settings
// Connect now using *LOCAL DSN. Requires user and password on my box. Maybe not if PTFs applied for ODBC.
//$connstring="Driver={IBM i Access ODBC Driver}; System=" . $connhost . "; UID=" . $connuser . ";PWD=" . $connpassword . ";";
//$connstring="DSN=*LOCAL;" . "UID=" . $connuser . ";PWD=" . $connpassword . ";";;
//$connstring="DSN=*LOCAL;";

?>
