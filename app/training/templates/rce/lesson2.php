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
    <h1 class="text-center">Ping Tool</h1>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6 col-md-offset-3">

            <div class="text-center" style="margin-bottom:20px">
            <form method="post">
                <input name="target" placeholder="target" value="8.8.8.8"> <input type="submit" class="btn btn-success" value="PING">
            </form>
            </div>

            <?php if( isset($_POST["target"]) ){ ?>
                <textarea class="form-control" rows="10"><?php echo system('ping -c 4 '.$_POST["target"]); ?></textarea>
            <?php } ?>

        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>