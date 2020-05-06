<?php

require "conn.php";

$sql = "SELECT username,ign,pic,pic_cache,color FROM players_details WHERE ign!='' ORDER BY ign";
$result = $conn->query($sql);


?>