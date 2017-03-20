<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portfolio</title>

    <!-- Styles -->
    <!-- Bootstrap -->
    <link href="css/app.css" rel="stylesheet">

</head>
<body>
    <div id="app">

        <!-- Start of Navigation -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="index.php">
                        Portfolio
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End of Navigation -->

        <!-- Start of Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Instructions</div>
                        <div class="panel-body">
                        <ul>
                            <li>
                                Setup file structure for project (Includes, Partials, Function files)
                            </li>
                            <li>
                                Use draw.io to design a database based on the input field on dashboard.php page.
                            </li>
                            <li>
                                Once database is designed, ask for it to be reviewed by Ash or Danny.
                            </li>
                            <li>
                                When approved you will set the database up in PhpMyAdmin or Sequel Pro.
                            </li>
                            <li>
                                Add some dummy data for projects to be used for display.
                            </li>
                            <li>
                                Then create a config.php file and connect the database up. (Hint: connectDatabase() from Boogle)
                            </li>
                            <li>
                                Create a foreach loop for the index page and loop over all projects in the database. (Hint: getWebsites() from Boogle)
                            </li>
                            <li>
                                Once done, wait for more instructions or add some fancy features of your own.
                            </li>
                            <hr>
                            <li>
                                After successfully showing projects from the database, use the form in dashboard.php to insert projects into the table. (Hint: addFeedbackToDatabase() from Boogle)
                            </li>
                            <li>
                                You have successfully completed the CR out of CRUD (Short for Create, Read, Update, Delete/Destroy) Google it for more information.
                            </li>
                            <li>
                                Once done, wait for more instructions and add some PHP validation (Groan).
                            </li>
                            <li>
                                Once done, wait for more instructions and add some PHP validation (Groan).
                            </li>
                            <hr>
                            <li>
                                Add a button on each of the projects on the index.php page to delete. Style accordingly and research how to add JavaScript to confirm delete.
                            </li>
                            <li>
                                Do the delete. That is all.
                            </li>
                        </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content -->
    </div>

    <!-- Scripts -->
    <!-- Bootstrap JavaScript -->
    <script src="js/app.js"></script>

</body>
</html>
