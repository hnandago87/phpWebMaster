<?php
function confirm_query($result){
	if (!$result){
		die("DB failed");
    }
}

function getAllUsers(){
    global $connection;
    $query = "SELECT * FROM loggedUsers";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
}
function getUser($id){
    global $connection;
     $query = "SELECT * FROM loggedUsers WHERE id={$id}";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
}
function inverter($x){
    return !$x;
}
//function to populate the select skill dropdown box
function populateSkillsDropDown(){
    global $connection;
    $query = "SELECT * FROM testCategory";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
}
//function to populate the existing skill set for a existing user
function populateSkillsForUser($userId){
    //$rows = array();
    global $connection;
    $query = "SELECT lu.id, lu.firstName, lu.lastName, lu.email, tc.subjectCategory FROM loggedUsers AS lu INNER JOIN studentCategory ON lu.id = studentCategory.id INNER JOIN testCategory AS tc ON studentCategory.categoryId = tc.categoryId WHERE lu.id = {$userId}";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
}
//function to get the posted skills and store them into dataase for a user
//write sql query to select skill and user details together
function getDataForSkillUpdate($post){
$list_of_skills = array("QA","Java_Developer","PHP_Developer","UI_Developer","Tableau","ASP__NET","IOS_Development","Android_Development","Ruby_on_Rails_Developer","DBA","DevOps_Admin","DevOps_Developer","Could_Architecture_Developer");
          foreach($list_of_skills as $each_skill){
                if(isset($_POST[$each_skill])){
                    //echo '<p>'.$_POST[$each_skill].'</p>';
                }
            }
    global $connection;
    $skill_count = 0;
    $id = (int)$post["edit_id"];
    $id1 = $post["edit_firstname"];
    $id2 = $post["edit_lastname"];
    $id3 = $post["edit_email"];
    $query = "UPDATE loggedUsers SET firstName = '{$id1}', lastName='{$id2}', email='{$id3}' WHERE loggedUsers.id = {$id};";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
}

//Function to get the task for the user
?>