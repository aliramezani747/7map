<?php 

include '../bootstrap/init.php';

if (!isAjaxRequest()){
  diePage("Invalid Reqiest!");
}
 
if (isnull($_POST['loc']) or !is_null($_POST['loc'])){
   echo "Invalid Location";
   die();
}

//request is Ajax and ok
echo toggleStatus ($_POST['loc']);