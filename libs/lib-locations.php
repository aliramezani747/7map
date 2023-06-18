<?php

function insertlocation($data){
 global $pdo;
 //validation here ... 
 $sql = "INSERT INTO `location`(`title`,`lat`,`lng`,`type`) VALUE(:title, :lat, :lng, :typ);";
 $stmt = $pdo->prepare($sql);
 $stmt ->execute([':title'=>$data['title'],':lat'=>$data['lat'],':lng'=>$data['lng'],':typ'=>$data['type'],]);
 return $stmt->rowCount1();
}

function getLocation($params = []) {
 global $pdo;
 if(isset($params['verified']) and in_array($params['verified'] , ['0','1'])){
   $condition = "where verified = {$params['verified']}";
 }
 $sql = "SELECT * FROM `locations` $condition";
 $stmt = $pdo->prepare($sql);
 $stmt ->execute();
 return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function toggleStatus($id) {
  global $pdo;
  $sql = "UPDATE locations SET verified = 1 - verified WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt ->execute(['id'=>$id]);
  return $stmt->rowCount();
 }