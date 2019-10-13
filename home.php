<!DOCTYPE html>
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

 
<script>

$(document).ready(function(){
	
	var cookie_value = "";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
	var csrf = decodedCookie.split(';')[2]
	// alert(decodedCookie)
	if(csrf.split('=')[0] = "csrfTokenCookie" ){
		// alert(csrf.split('csrfTokenCookie=')[1])
		cookie_value = csrf.split('csrfTokenCookie=')[1];
		document.getElementById("tokenIn_hidden_field").setAttribute('value', cookie_value) ;
	}
	});
</script>

</head>

<?php
if(isset($_POST['username'],$_POST['password'])){
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	if($uname == 'admin' && $pwd == 'admin123'){
		echo 'Successfully logged in';
		session_start();
		$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
		$session_id = session_id();
		setcookie('sessionCookie',$session_id,time()+ 60*60*24*365 ,'/',"",false,false);
		setcookie('csrfTokenCookie',$_SESSION['token'],time()+ 60*60*24*365 ,'/',false,false);
		
	}else{
		echo 'Invalid Credentials';
		exit();
	}
}
?>




<body><br><br>

    <div  align="center" >
    		<h2>Write Something</h2>
            <form action="result.php" method="post">
           <div class="form-group">
                  <label for="username" class="text-white"><h5><h5></label>
                   <input type="text" name="update_post" class="form-control">
               </div>
               <div id="div1">
				  <input type="hidden" name="token" value="token" id="tokenIn_hidden_field"/>
			  </div>
                 <div class="form-group">
                   <input type="submit" name="Submit" class="btn btn-info btn-md" value="Update Post">
                </div> 
                    
            </form>
    </div>
</body>

</html>









