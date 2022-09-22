<?php

include("superadminauth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>


<p><a href="customer-create.php">Insert New Record</a></p>
<p><a href="index2.php">View Records</a><p>
<p><a href="superadmin.php">Logout</a></p>



<br /><br /><br /><br />
</div>
</body>
</html>