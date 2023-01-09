<?php

use LDAP\Result;

    $get_id =$_GET['delete_project'];
    $sql    = "DELETE FROM `project` WHERE id_project = $get_id";
    $result = mysqli_query($conn , $sql);
    if($result){
        echo "good";
    }else{
        echo "bad";
    }
?>