<?php
// Temporary test helper: set a fake logged-in session and redirect to dashboard
// Use only for local testing. Remove this file on production.
session_start();
// Simple test user structure that matches what the app expects
$_SESSION['user'] = [
    'id' => 1,
    'username' => 'testuser'
];
// Redirect to the dashboard page we created
header('Location: /apps/app/view/pages/dashboard.php');
exit;
