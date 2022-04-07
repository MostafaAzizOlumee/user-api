<?php 
    require_once '../../config/session-start.php'; // Autoloader library can be used which makes life easier
    require_once '../../config/Database.php'; // Autoloader library can be used which makes life easier
    require_once '../../models/User.php'; // Autoloader library can be used which makes life easier


    //model objects
    $objDb = new Database;
    $objUser = new User;
    
    // if user had already signed in then direct user to user-single.php api
    if( $objUser->isLoggedIn() ):
        header("Location: ../../api/authentication/user-single.php?id=".$_SESSION['id']); die;
    endif;

    // global variables
    $errorMsgs = [];
    $successMsgs = [];

    if( isset($_POST['login-data-submit']) ){
        // check the user credentials 
        $isLoggedIn = $objUser->login($objDb, $_POST['user_email'], $_POST['user_password']);

        if($isLoggedIn):
             // saving into session Global variable
             $objUser->saveSessionData();
             header("Location: ../../api/authentication/user-single.php?id=".$_SESSION['id']);
        else:
            $errorMsgs[] = "Sorry your user or password is incorrect!!";
        endif;
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication | Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="card">
                    <form style="color:#563798;" method="post">
                        <div class="card-header text-center">
                            <img class="mb-4" src="../assets/img/temis-logo-resized.png" alt="temis-logo">
                            <h1 class="h3 mb-3 fw-bold">Please sign in</h1>
                        </div><!-- card-header -->
                            <div class="card-body">
                                <!-- Displaying error messages -->
                                <?php if( !empty($errorMsgs) ):?>
                                    <?php  foreach($errorMsgs as $errorMsg): ?>
                                        <div class="alert alert-danger">
                                            <?= $errorMsg ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif;?>
                                <!-- Displaying error  messages -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="user_email" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="user_password" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </div><!-- card-body -->
                            <div class="card-footer">
                                <button class="w-100 btn btn-lg btn-primary" name="login-data-submit" type="submit">Sign in</button>
                            </div><!-- card-footer -->
                    </form>
                </div><!-- card -->
            </div><!-- col-8 -->

        </div><!-- row -->
    </main><!-- container -->
    <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>