<?php 
require "../../database/database.php";
require "../../models/leavetype.model.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $typename=$_POST['typename'];
    // $typedesc=$_POST['typedesc'];
    $iscreated=addLeaveType($typename);
    if($iscreated){
        header("location: /leavetype");
    }else{
        header("location: /leavetypeForm");
    }
}