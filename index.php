<?php ob_start(); require_once 'app/core/config.php';?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once 'app/view/part/head.php';?>
<body> 
    <?php
    session_start();
// Simple test user structure that matches what the app expects
$_SESSION['user'] = [
    'id' => 1,
    'username' => 'MIO DEPARTMENT'
];
// Redirect to the dashboard page we created
header('Location: /apps/app/view/pages/dashboard.php');
exit;
            // If user session is not set, redirect to login.php
            // Change 'user' to your session key (e.g. 'user_id' or 'logged_in')
        if (!isset($_SESSION['user'])) {
            // include the login page you created under app/view/pages/login.php
            include_once 'app/view/pages/login.php';
            // stop further processing (do not render the main layout)
            exit;
}
    
    ?>
    
<?php include 'app/view/part/script.php';?>
</body>
</html>
<?php ob_end_flush();?>