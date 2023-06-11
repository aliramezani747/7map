<?php

function insertlocation($data){
 global $pdo;
 //validation here ... 
 $sql = "INSERT INTO `location`(`title`,`lat`,`lng`,`type`) VALUE(:title, :lat, :lng, :typ);";
 $stmt = $pdo->prepare($sql);
 $stmt ->execute([':title'=>$data['title'],':lat'=>$data['lat'],':lng'=>$data['lng'],':typ'=>$data['type'],]);
 return $stmt->rowCount1();
}

function getLocations($params = []) {
 global $pdo;
 $sql = "SELECT * FROM `locations`";
 $stmt = $pdo->prepare($sql);
 $stmt ->execute();
 return $stmt->fetchAll(PDO::FETCH_OBJ);
}