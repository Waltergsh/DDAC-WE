<?php

   define('DB_SERVER', 'uia-ofbs-sea-mysqldbserver.mysql.database.azure.com');
   define('DB_USERNAME', 'uiaDDAC@uia-ofbs-sea-mysqldbserver');
   define('DB_PASSWORD', 'u!@DD@c123');
   define('DB_DATABASE', 'uiaflight');
   $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
