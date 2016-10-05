<?php
session_start();
session_destroy();
header("Location: ../index.php");

// Her bliver session afsluttet og man bliver sendt tilbage til forsiden.