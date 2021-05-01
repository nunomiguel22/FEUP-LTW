<html>

<?php
include_once(dirname(__FILE__).'/../includes/csrf.php');
insertHeadCSRFToken();
?>

<title>Adoption GO</title>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<meta charset="utf-8">
<meta name="viewport" cotent="width=device-width">
<link rel="icon" href="/images/favicon.jpg">
<script type="text/javascript" src="../js/ajax.js"></script>
</head>

</html>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include_once('init.php');

if (isLoggedIn()) {
    include_once(dirname(__FILE__)."/../templates/navbar/navbar_login.php");
} else {
    include_once(dirname(__FILE__)."/../templates/navbar/navbar_guest.php");
}

echo '<script type="text/javascript" src="../js/navbar.js"></script>';
