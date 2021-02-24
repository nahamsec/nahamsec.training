<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="padding-top:60px;">

    <h1 class="text-center">Website Checker</h1>
    <h3 class="text-center">Check whether a website is up!</h3>

    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6 col-md-offset-3">
            <?php if( $data["error"] ){ ?>
                <div class="alert alert-danger text-center">
                    <p><?php echo $data["error"]; ?></p>
                </div>
            <?php } ?>
            <div class="row">
                <form method="post">
                    <div class="col-xs-9">
                        <input name="url" class="form-control">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" class="btn btn-success" value="Go">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php if( isset($data["source"]) ){ ?>
        <div class="text-center"><?php echo $data["source"]; ?></div>
    <?php } ?>


</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>