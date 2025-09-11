<?php

session_start();
//الغاء و حذف اى سيشن موجود فى الموقع
session_unset();
session_destroy();
header("location:\school_system\home.php");
exit();