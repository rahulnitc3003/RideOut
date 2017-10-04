<?php
//Include GP config file && User class
include_once '../gpConfig.php';
include_once '../User.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
    //header('Location: login_panal.html');
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        //'gender'        => $gpUserProfile['gender'],
        //'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        //'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    
    //Render facebook profile data
    if(!empty($userData)){
    ?>
    <table border="5" align="center" style="border-color:orange">
        <tr>
            <td align="center" colspan="4">User's Profile Details</td>
        </tr>
        <tr>
            <td>User Picture:</td>
            <td><?php echo '<img src="'.$userData['picture'].'" width="300" height="220">'; ?></td>
        </tr>
        <tr>
            <td>Google Id: </td>
            <td><?php echo $userData['oauth_uid']; ?></td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><?php echo $userData['first_name']?></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><?php echo $userData['last_name']?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $userData['email']?></td>
        </tr>
        <tr>
            <td>Loged In With Google:</td>
            <td><?php echo "Google" ?></td>
        </tr>
        <tr>
            <td align="center" colspan="4">
				<?php echo '<a href="../logout.php"><input type="button" value="Logout" /></a>'?>
			
				<?php echo '<a href="login_panal.php"><input type="button" value="Back" /></a>'?>
			</td>
        </tr>
    </table>
    <?php
        /*$output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';*
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>';*/
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RideOut System</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
</br></br>
<div><!--?php echo $output; ?--></div>
</body>
</html>