<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-default" style="margin-top:20px">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $data["title"]; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo $data["contents"]; ?>
                    <div style="margin-top:10px"><i>Article Created: <?php echo $data["created_at"]; ?></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>