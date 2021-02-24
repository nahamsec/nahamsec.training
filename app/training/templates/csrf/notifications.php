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
                <li class="active">Notifications</li>
            </ol>
            <div class="panel panel-default" style="margin-top:20px">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Notifications</h3>
                </div>
                <div class="panel-body">
                    <p>Notifications are currently set to <?php echo ( $data["notifications"] ) ? '<strong style="color:#52a74d">ACTIVE</strong>' : '<strong style="color:#F00">DISABLED</strong>'; ?></p>
                    <?php if( $data["notifications"] ){ ?>
                        <a href="/notifications?enabled=false" class="btn btn-danger pull-right">Disable Notifications</a>
                    <?php }else{ ?>
                        <a href="/notifications?enabled=true" class="btn btn-success pull-right">Enable Notifications</a>
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