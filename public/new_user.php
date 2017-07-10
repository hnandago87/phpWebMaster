<?php include("../includes/layouts/header.php"); ?>
<?php require("../includes/user_authentication.php"); ?>
<?php if(isset($_POST['submit'])){
    $name_error = validName($_POST['name']);
    $email_error =  validateEmail($_POST['email']); 
    $password_error =  validatePassword($_POST['password']); 
    $password_match_error = passwordMatch($_POST['password'],$_POST['re-password']);
    $account_selection_error = accountTypeValidation($_POST['account_type']);
    $register_object = $_POST;
    var_dump(registerUser($email_error, $password_error, $password_match_error, $name_error, $register_object));
    echo 1;
    }
//use password_hash table to store dynamic hash, use htmlentities and htmlspecialchars to validation of inputs --> need to add htmlentities and htmlspecial chars
// use it to create a hashed password and register user profile.
// Create login system and add session to the pages to support display of pages. --> add session to the login pages.
//Add column in users table to control the display of pages for multiple groups of users.--> done 
//$x =  hash('sha256', 'Gerrard_08');
//echo hash('ripemd160', 'Hari@1991'.$x);
//echo '<br>';
//echo hash('ripemd160', 'Saibersys@1'.$x);
//<?php if(isset($name_error) && !$name_error) echo '<div style="float:left;"><span style="color:red; padding-left:200px">Enter Valid Name</span><br></div>';
?>
<div class="container">
    <form id="create_user" method="POST" action="new_user.php">
        <div id="form_title"><span class="form_title">User Registration</span></div>
        <div class="reg_form_container">
            <div class="reg_columns">
                <div class="reg_form_fields">
                   <div class="form_label">
                        <label>Name: </label>
                    </div>
                    <div class="form_label">
                        <label>Email: </label>
                    </div>
                    <div class="form_label">
                        <label>Password: </label>
                    </div>
                    <div class="form_label">
                        <label>Confirm Password: </label>
                    </div>
                    <div class="form_label">
                        <label>Account Type: </label>
                    </div>
                </div>
                <div class="reg_form_inputs">
                    <div class="form_data">
                        <input type="text" name="name" placeholder="Enter Full Name" class="form_inputs"class="form_inputs" id="name">
                    </div>
                    <div class="form_data">
                        <input type="email" name="email" placeholder="Enter email" id="email" class="form_inputs">
                    </div>
                    <div class="form_data">
                        <input type="password" name="password" placeholder="Enter password" id="password" class="form_inputs">
                    </div>
                    <div class="form_data">
                        <input type="password" name="re-password" placeholder="Re-Type your password" class="form_inputs" id="rePassword">
                    </div>
                    <div class="form_data">
                       <select name="account_type">
                          <option value="" default>Select from list</option>
                          <option value="Administrator">Administrator</option>
                          <option value="Employee">Employee</option>
                          <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="reg_form_validations">
                   <div class="form_data_validation">
                    <?php
                       if(isset($name_error) && !$name_error) 
                       { ?>
                           <span style="color:red;">Enter Valid Name</span>
                       <?php } ?>
                    </div>
                    <div class="form_data_validation">
                    <?php
                       if(isset($email_error['empty'])) 
                       { ?>
                           <span style="color:red;"><?php echo $email_error['empty'] ?></span>
                       <?php }else { ?>
                            <span style="color:red;"><?php echo $email_error['format'] ?></span>
                        <?php } ?>
                    </div>
                    <div class="form_data_validation">
                    <?php
                       if(isset($password_error['pEmpty'])) 
                       { ?>
                           <span style="color:red;"><?php echo $password_error['pEmpty'] ?></span>
                       <?php }else if(isset($password_error['valid']) && !$password_error['valid']) { ?>
                            <span style="color:red;">Enter valid password</span>
                        <?php } ?>
                    </div>
                    <div class="form_data_validation">
                    <?php
                       if(isset($password_match_error) && !$password_match_error) 
                       { ?>
                           <span style="color:red;"><?php echo"Your passwords do not match"; ?></span>
                       <?php } ?>
                    </div>
                    <div class="form_data_validation">
                        <br>
                    <?php
                       if(isset($account_selection_error) && !$account_selection_error) 
                       { ?>
                           <span style="color:red;">Select the acount type</span>
                       <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form_submit">
            <input id="reg_submit" type="submit" name="submit"  id="submit" value="submit">
        </div>
    </form>
</div>
<?php include("../includes/layouts/footer.php"); ?>



<!--


   <div class="form_field">
            <div class="form_label">
                <label>Name: </label>
            </div>
            <div class="form_data">
                <input type="text" name="name" placeholder="Enter Full Name" class="form_inputs"class="form_inputs" id="name">
            </div>
            
        </div>
        <div class="form_field">
            <div class="form_label">
                <label>Email: </label>
            </div>
            <div class="form_data">
                <input type="email" name="email" placeholder="Enter email" id="email" class="form_inputs">
            </div>
        </div>
        <div class="form_field">
            <div class="form_label">
                <label>Password: </label>
            </div>
            <div class="form_data">
                <input type="password" name="password" placeholder="Enter password" id="password" class="form_inputs">
            </div>
        </div>
        <div class="form_field">
            <div class="form_label">
                <label>Confirm Password: </label>
            </div>
            <div class="form_data">
                <input type="password" name="re-password" placeholder="Re-Type your password" class="form_inputs" id="rePassword">
            </div>
        </div>
        <div class="form_field">
            <div class="form_label">
                <label>Account Type: </label>
            </div>
            <div class="form_data">
               <select name="account_type">
                  <option value="" default>Select from list</option>
                  <option value="admin">Administrator</option>
                  <option value="employee">Employee</option>
                  <option value="other">Other</option>
                </select>
            </div>
        </div>
        <div class="form_field">
            <input type="submit" name="submit"  id="submit" value="submit">
        </div>-->
