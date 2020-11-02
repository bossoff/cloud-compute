<?php
session_start();
	unset($_SESSION['log']);
	header("Location:../");
?>