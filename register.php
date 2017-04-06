<?php
require 'includes/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$name = $email = $password = '';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$hash = password_hash($password, PASSWORD_BCRYPT);

	
	if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
    addMessage('Please enter all fields!');
    redirect('register.php');
  	}


$didInsertWork = addUser($dbh, $username, $email, $hash);

if ($didInsertWork){
	$_SESSION['username'] = $_POST['username'];

	// addmessage('You have successfully registered');

	redirect ('dashboard.php');
}

}
	
	require 'partials/header.php';
    require 'partials/navigation.php';   	
?>

<!-- Start of Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">

		<form class="form-horizontal" role="form" method="POST" action="register.php">
			
			 <!-- Email Input -->
            <div class="form-group">
                <label for="username" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" value="" required="" autofocus="">

                </div>
            </div>

            <!-- Email Input -->
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">Email Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="" required="" autofocus="">

                </div>
            </div>
			

			<!-- Password Input -->
            <div class="form-group">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required="">
                </div>
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password_confirm" type="password" class="form-control" name="password_confirm" required="">
                </div>
            </div>
				

			<!-- Submit Button -->
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <div><?= showMessage() ?></div>	
                </div>
            </div>
			
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content -->

<?php
require 'partials/footer.php';
?>