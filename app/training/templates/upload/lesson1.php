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

    <h1 class="text-center">Photo Store</h1>
    <h3 class="text-center">We can store your photos!</h3>
    <div class="text-center">( jpg, jpeg, gif and png only )</div>

    <div class="row" style="margin-top: 50px">
        <div class="col-md-6 col-md-offset-3">

            <?php if( $data["error"] ){ ?>
                <div class="alert alert-danger text-center">
                    <p>Invalid file extension</p>
                </div>
            <?php } ?>

            <div class="row">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-xs-9">
                        <input type="file" name="file">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" class="btn btn-success" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h3 class="text-center">Uploaded Files</h3>
    <?php foreach( $data["files"] as $file){ ?>
        <div class="text-center"><a href="/uploads/<?php echo $file["name"]; ?>" target="_blank"><?php echo $file["name"]; ?></a></div>
    <?php } ?>


</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>