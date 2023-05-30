<?php

define ("DB_HOST", "localhost" );
define ("DB_USER", "dbuser" );
define ("DB_PASS", "ecc" );
define ("DB_NAME", "studb" );
define ("DB_CHARSET", "utf8mb4" );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?>