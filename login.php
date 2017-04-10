<?php
    require 'includes/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (empty($_POST['username']) || empty($_POST['password'])){
        addMessage('error','Please enter all fields!');
        redirect('login.php');
    }

    $username = strtolower($_POST['username']);
    $password = strtolower($_POST['password']);
    $user = getUser($dbh, $username);
    $passwordMatches = password_verify($password, $user['password']);

    if(!empty($user) && ($username === strtolower($user['username']) || $username === strtolower($user['email'])) && $passwordMatches){

        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
            
        addMessage('success','You have been logged in');
        redirect ('index.php');
    }

    else{
        addMessage('error','The username or password do not match our records');
    }
}

require 'partials/header.php';
require 'partials/navigation.php';
?>

<!-- Start of Content -->
    <div class="container">
        <div class="row">
            
            <?= showMessages() ?>
            
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">Login</div>
                            
                            <div class="panel-body">
                                
                                <form class="form-horizontal" role="form" method="POST" action="login.php">
                                    
                                    <!-- Email Input -->
                                    <div class="form-group">
                                        <label for="username" class="col-md-4 control-label">Username/ Email</label>

                                        <div class="col-md-6">
                                            <input id="username" type="username" class="form-control" name="username" value="" required="" autofocus="">
                                        </div>
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-group">
                                        <label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required="">
                                        </div>
                                    </div>

                                     <!-- Submit Button -->
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>
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