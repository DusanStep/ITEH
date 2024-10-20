<?php

require "../dbBroker.php";
require "../model/prijava.php";

if(isset($_POST["submit"]) && $_POST["submit"]=="Obrisi"){
    $idp=$_POST["id_predmeta"];
    $_POST["submit"]=null;
    $_POST["id_predmeta"]=null;
    $status=Prijava::deleteById($idp,$conn);
    if($status){
        echo "Success";
    }else{
        echo $status;
        echo "Failed";
    }
}


?>