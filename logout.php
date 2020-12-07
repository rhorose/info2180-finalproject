<?php
session_start();
$_SESSION = array();

if (ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(), "", time() - 42000,
        $params["path"], $params["domain"],
        params["secure"], $params["httponly"]
    );
}
Session_destroy();
?>

<!-- session_start();
//Destroy all open sessions
if(Session_destroy())
//redirecting to home page
{header("Location: login.html");
} -->