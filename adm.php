<?php
include "bootstrap/init.php";

if( isset($_GET['logout']) and $_GET['logout'] = 1){
  logout();
}


if($_SERVER['REQUEST_METHOD'] = 'POST'
&& isset($_POST['username'])
&& isset($_POST['password']) ){
  if (!login($_POST['username'], $_POST['password'])) {
    message("نام کاربری یا رمز عبور اشتباه است");
  }
}

if (isLoggedin()) {
    $params = $_GET ?? [];
    $locations = getLocation($params);
    include "tpl/tpl-adm.php";
} else {
    include "tpl/tpl-adm-form.php";
}


