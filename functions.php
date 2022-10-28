<?php
include_once("config.php");

if(isset($_POST['corps_id'])){

    $corps_id  = mysqli_real_escape_string($mysqli, $_POST['corps_id']);
    $option_id = mysqli_real_escape_string($mysqli, $_POST['option_id']);
    $result    = mysqli_query($mysqli, "INSERT INTO tbl_corps_options(corps_id,option_id) VALUES($corps_id,$option_id)");
    return "success";

}

?>