<?php
include_once(dirname(__FILE__)."/../../includes/init.php");

sessionLogout();

header("location: /index.php");
