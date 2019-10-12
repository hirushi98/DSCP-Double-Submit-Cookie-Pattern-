<!DOCTYPE html>
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 <div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
  	<?php

require_once 'token.php';

$val = $_POST["token"];

if(isset($_POST['update_post'])){
	if(token::checkToken($val,$_COOKIE['csrfTokenCookie'])) {
		echo "Server request accepted req: ".$_POST['update_post']." CSRF token matched (cookie == hidden field) ((".$val.")(".$_COOKIE['csrfTokenCookie']."))";		
	}else {
	    echo "Server request fail!. CSRFTokenCookie: ".$_COOKIE['csrfTokenCookie'];
	}
}
?>

</body>

</html>

