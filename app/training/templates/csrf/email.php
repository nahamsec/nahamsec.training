<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="/logout" style="margin:10px" class="btn btn-danger pull-right">Logout</a>
<div class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <ol class="breadcrumb">
                <li><a href="/">Dashboard</a></li>
                <li class="active">Update Email</li>
            </ol>

            <?php if( $data["success"] ){ ?>
                <div class="alert alert-success">
                    <p class="text-center">Email Address Updated</p>
                </div>
            <?php }else{ ?>
            <div class="panel panel-default" style="margin-top:20px">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Email</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div><label>New Email Address</label></div>
                        <div><input name="email" class="form-control" value="<?php echo $data["email"]; ?>"></div>
                        <input style="margin-top:20px" type="submit" class="btn btn-success pull-right" value="Update">
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>