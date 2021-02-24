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
            <?php if( $data["name"] ){ ?>
                <div class="alert alert-success">
                    <p class="text-center">Hello, <input value="<?php echo $data["name"]; ?>"></p>
                </div>
            <?php }else{ ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">What's your name?</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div><label>Name:</label></div>
                            <div><input class="form-control" name="name" ></div>
                            <div style="margin-top:7px"><input type="submit" class="btn btn-success pull-right" value="Enter"></div>
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