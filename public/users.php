<?php session_start(); ?>
<?php include("../includes/layouts/header.php") ?>
<?php require("../includes/user_authentication.php") ?>
<?php 
    if(isset($_POST['login'])){
        $email_error = validateEmail($_POST['email']);
        $password_error = validatePassword($_POST['password']);
        var_dump(getLoginDetails($_POST, $email_error,$password_error));
    }
?>
<div class="login_body">
    <form method="POST" action="users.php">
        <div class="login_box">
            <h1 class="login_title">Dashboard</h1>
            <?php if(isset($email_error['empty'])) echo '<h6 style="color:red;padding: 0px;margin:0px;">'.$email_error['empty'].'</h6>'; ?>
            <?php if(isset($email_error['format'])) echo '<h6 style="color:red;padding: 0px;
    margin: 0px;">'.$email_error['format'].'</h6>'; ?>
            <?php if(isset($password_error['pEmpty'])) echo '<h6 style="color:red;padding: 0px;
    margin: 0px;">'.$password_error['pEmpty'].'</h6>'; ?>
            <?php if(isset($password_error['pWhite'])) echo '<h6 style="color:red;padding: 0px;
    margin: 0px;">'.$password_error['pWhite'].'</h6>'; ?>
            <input type="email" name="email" placeholder="email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />

            <input type="password" name="password" placeholder="password" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="password" /><br>

            <input type="submit" class="btn1" name="login" placeholder="Sign In"> <!-- End Btn -->

<!--            <a href="" id="btn2"> Sign Up  End Btn2 </a>    -->
            
             <p>Forgot your password? <u style="color:#f1c40f;">Click Here!</u></p>

        </div> <!-- End Box -->
        
    </form>

   
</div>
<?php include("../includes/layouts/footer.php") ?>