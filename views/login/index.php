
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
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
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