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
                    <p class="text-center">Invalid username</p>
                </div>
            <?php } ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Reset Password</h3>
                </div>
                <div class="panel-body">
                    <?php if( $data["success"]){ ?>
                        <div class="alert alert-success text-center">
                            <p>Password reset link sent to <strong><?php echo $data["success"]; ?></strong></p>
                            <div style="margin-top:7px"><a href="/" class="btn btn-danger">Back To Login</a></div>
                        </div>
                    <?php }else{ ?>
                    <form method="post">
                        <div><label>Username:</label></div>
                        <div><input class="form-control" name="username" ></div>
                        <div style="margin-top:7px">
                            <a href="/">Back To Login</a>
                            <input type="submit" class="btn btn-success pull-right" value="Reset Password"></div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>