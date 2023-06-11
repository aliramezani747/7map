<?php 

include '../bootstrap/init.php';

if (!isAjaxRequest()){
  diePage("Invalid Reqiest!");
}

//request is Ajax and ok

if(insertlocation($_POST)){
 echo "مکان با موفقیت در پایگاه داده ثبت شد و منتظر تایید مدیر است.";
}
else {
    echo "مشکلی در ثیت مکان پیش آمده است";
}

insertlocation($_POST);