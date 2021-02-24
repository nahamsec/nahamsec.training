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

    <?php foreach( $data as $article ){ ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="margin-top:20px">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $article["title"]; ?></h3>
                </div>
                <div class="panel-body">
                    <div><?php echo substr($article["contents"],0,150); ?>...</div>
                    <div style="margin-top:10px" class="pull-right"><a href="/article?id=<?php echo $article["id"];?> ">read more...</a></div>
                    <div style="margin-top:20px"><i>Article Created: <?php echo $article["created_at"]; ?></i></div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <p class="pull-right"><span class="article_count"></span> article(s) created this month</p>
        </div>
    </div>




</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $.getJSON('/article-count?date=<?php echo urlencode(date("F Y")); ?>',function(resp){
        $('span.article_count').html( resp.count );
    })
</script>
</body>
</html>