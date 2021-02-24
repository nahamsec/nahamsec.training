<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if( $data["error"] ){ ?>
                <div class="alert alert-danger">
                    <p class="text-center">Invalid username / password</p>
                </div>
            <?php } ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div><label>Username:</label></div>
                        <div><input class="form-control" name="username" ></div>
                        <div><label>Password:</label></div>
                        <div><input class="form-control" type="password" name="password" ></div>
                        <div style="margin-top:7px">
                            <a href="/reset-password">Reset Password</a>
                            <input type="submit" class="btn btn-success pull-right" value="Login"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>