<?php require_once("../includes/db_connections/db_connections_open.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php") ?>
<?php 
       if(isset($_REQUEST["userId"])){
          $userId = $_REQUEST["userId"];
          $userInfo = getUser($_REQUEST["userId"]);
        }
      if(isset($_REQUEST["edit"])){
          $editatbelUser = populateSkillsForUser($userId);
      }
      if(isset($_REQUEST["registerNewUser"])){
          $valChange=true;
       }
      if(isset($_POST)){
         $x = getDataForSkillUpdate($_POST);
      }
?>
<div class="container">
    <div class="display-30 endblocks-seperator">
        <h2>List of users available</h2><a href="?registerNewUser"><input type="button" value="create new user"></a>
        <ul>
           <?php 
                $result = getAllUsers(); 
                while($userList = mysqli_fetch_assoc($result)){
                    echo "<li style='list-style:none;'>"."<a href='?userId=".$userList["id"]."' style='text-decoration:none;'>".$userList["firstName"]." ".$userList["lastName"]."</a></li></br>";
                }
            ?>
        </ul>
    </div>
    <div class="display-30 midblock-seperator">
        <h3>User Profile</h3>
           <?php 
                if(isset($userInfo)){
            ?>
        <table>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th> 
                <th>email</th>
                <th>options</th>
              </tr>
              <tr>
                  <?php
                     while($user = mysqli_fetch_assoc($userInfo)){
                    echo "<tr><td>".$user["firstName"]."</td><td>".$user["lastName"]."</td><td>".$user["email"]."</td><td><input type='button' value='edit' onClick='loadData(".json_encode($user).")'></td></tr>";
                     }
                }
                else{
                        echo "select a profile to view...";
                    }
                ?>
        </table>
    </div>
    <div class="display-30 endblocks-seperator">
        <H4>Editing Profile info here...</H4>
        <div>
            <p>Click to edit the profile</p>
            <a onclick="loadingData(event)">
            <input type="button" value="display">
            </a>
        </div>
        <hr>
        <?php
        $skill_increment = 0;
        $skill_set = array();
            while($userDetail = mysqli_fetch_array($editatbelUser)){
               $skill_set[$skill_increment] = $userDetail["subjectCategory"];
                if($skill_increment===0){
        ?> 
        <form id="editable_form" action="datastat.php" method="POST">
            <input type="text" id="edit_id" name="edit_id" value="<?php echo $userDetail["id"]; ?>" style="display:none">
            <label>First name:</label>
              <input type="text" id="edit_firstname" name="edit_firstname" value="<?php echo $userDetail["firstName"] ?>">
              <br>
              <label>Last name:</label>
              <input type="text" id="edit_lastname" name="edit_lastname" value="<?php echo $userDetail["lastName"] ?>">
              <br>
              <label>Email:</label>
              <input type="text" id="edit_email" name="edit_email" value="<?php echo $userDetail["email"] ?>">
            <?php 
                            }
                        ++$skill_increment;
                       }
            ?>
              <br>
                    <?php                                   //block to enable display
                    if(isset($_REQUEST["edit"])){           //Display only if display button is clicked
                        ?>
                <label for="skillList">Skills:</label>
                <select id="skillList">
                    <?php
                        $selectionOptions = populateSkillsDropDown();       //populating the selection list
                                while($option = mysqli_fetch_assoc($selectionOptions)){
                                    echo '<option value="'.$option["subjectCategory"].'">'.$option["subjectCategory"].'</options>';
                                }
                        ?>
                </select>
                <input type="button" value="add to list" onclick="updateUser()">
                <div id="skills">
                    <label for="selectedSkill1">Add only on skill, remove the existing skill and add new skill.</label>
                    <div>
                        <?php 
                            foreach($skill_set as $skill)           //populating the skills of a individual user
                                {
                        ?>
                       <input type="text" class="skills" id="selectedSkill1" name="<?php echo $skill ?>" value="<?php echo $skill ?>" readonly/><input type="button" value="remove" onclick="removeSelection(this)"><br>
                        <?php
                            }
                        ?>
                    </div>
                </div>
              <input type="submit" value="Submit"><input type="submit" value="cancel">
                <?php                   //Block End
                        }               //display enable block end
                    ?>
        </form>
    </div>
    <?php
        if($valChange)
        {
            ?>
        <div class="display-30 vertical-seperator">
            <h2>New User Form</h2>
            <form>
            </form>
        </div>
    <?php 
        } 
    ?>
</div>
<?php include("../includes/layouts/footer.php") ?>
    