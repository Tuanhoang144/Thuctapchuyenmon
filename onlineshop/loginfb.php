<?php
require_once 'config.php';
$permissions = ['email']; //optional

if (isset($accessToken))
{
	if (!isset($_SESSION['facebook_access_token'])) 
	{
		//get short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;
		
		//OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		
		//Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		
		//setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} 
	else 
	{
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	if (isset($_GET['code'])) 
	{
		header('Location: ./');
	}
	try {
		$fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
		$fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');
		
		$fb_user = $fb_response->getGraphUser();
		$picture = $fb_response_picture->getGraphUser();
		
		$_SESSION['fb_user_id'] = $fb_user->getProperty('id');
		$_SESSION['fb_user_name'] = $fb_user->getProperty('name');
		$_SESSION['fb_user_email'] = $fb_user->getProperty('email');
		$_SESSION['fb_user_pic'] = $picture['url'];
		
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Facebook API Error: ' . $e->getMessage();
		session_destroy();
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK Error: ' . $e->getMessage();
		exit;
	}
} 
// else 
// {	
// 	$fb_login_url = $fb_helper->getLoginUrl('http://localhost:8080/onlineshop/', $permissions);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login with Facebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <link href="<?php echo BASE_URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
<?php if(isset($_SESSION['fb_user_id'])): ?>
			 <a class="nav-link" href="logout.php">Logout</a>
			  <a class="nav-link" >Facebook ID: <?php echo  $_SESSION['fb_user_id']; ?></a>
			  <a class="nav-link">Full Name: <?php echo $_SESSION['fb_user_name']; ?></a>
			  <a class="nav-link">Email: <?php echo $_SESSION['fb_user_email']; ?></a>
<?php else: ?>
	<div class="login-form">
		<form action="" method="post">
			<div class="text-center social-btn">
				<a href="<?php echo $fb_login_url;?>" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
			</div>
		</form>
	</div>
<?php endif ?>
</body>
</html>