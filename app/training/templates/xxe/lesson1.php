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

    <h1 class="text-center">Sitemap Tool</h1>
    <h3 class="text-center">Get a list of links from a sitemap.xml file</h3>
    <div class="text-center"><a href="/sitemap.xml" target="_blank">Sample File</a></div>

    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6 col-md-offset-3">
            <div class="row">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-xs-9">
                        <input type="file" name="file">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" class="btn btn-success" value="Go">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if( isset( $data["urls"]) ){ ?>
        <h3 class="text-center">URL Results</h3>
        <?php foreach( $data["urls"] as $url ){ ?>
            <div class="text-center"><a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a></div>
        <?php } ?>
    <?php } ?>

</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>