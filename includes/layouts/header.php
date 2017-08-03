<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Profiling and learning curve</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="../public/js/scripts.js"></script>
    </head>
    <body>
        <nav class="navigation-bar">
            <div class="nav-size nav">
                <a class="nav-links" href="index.php">
                    <span class="nav-text">SPLC</span>
                </a>
            </div>
            <div class="vertical-line"></div>
            <div class="nav-size nav dropdown">
                <a class="nav-links" href="data.php">
                    <span class="nav-text">Data Statistics</span>
                </a>
                <div class="dropdown-content">
                    <a href="datastat.php"><span class="nav-text">User Profiles</span></a>
                    <a href="tasks.php">Tasks status</a>
                    <a href="new_user.php">Create new user</a>
                </div>
            </div>
            <div class="vertical-line"></div>
            <div class="nav-size nav">
                <a class="nav-links" href="#">
                    <span class="nav-text">About</span>
                </a>
            </div>
            <div class="vertical-line"></div>
            <div class="nav-size nav <?php if(basename($_SERVER["REQUEST_URI"])==="users.php"){echo active;} ?> ">
                <a class="nav-links" href="#">
                    <span class="nav-text">Testing</span>
                </a>
            </div>
            <div class="vertical-line"></div>
            <?php if(isset($_SESSION['user_name'])) { ?>
            <div class="nav nav-size <?php if(basename($_SERVER["REQUEST_URI"])==="logout.php"){echo active;} ?> ">
                <a class="nav-links" href="logout.php">
                    <span>Logout</span>
                </a>
            </div>
            <?php } else { ?>
            <div class="nav nav-size <?php if(basename($_SERVER["REQUEST_URI"])==="users.php"){echo active;} ?> ">
                <a class="nav-links" href="users.php">
                    <span>Login</span>
                </a>
            </div>
            <?php } ?>
        </nav>
        <br/>