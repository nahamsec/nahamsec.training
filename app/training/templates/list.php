<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nahamsec Training Udemy Course</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h1 class="text-center">Nahamsec Training</h1>
            <h5 class="text-center">These labs have been developed for the udemy course organized by <a href="https://twitter.com/nahamsec">Nahamsec</a></h5>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Challenges</h3>
                </div>
                <div class="panel-body">
                    <ul>
                    <?php
                    $host = str_replace("www.","", $_SERVER["HTTP_HOST"] );
                    foreach( $data as $module=>$foobar ){ ?>
                        <li><a href="http://<?php echo $module.'.'.$host;?>" target="_blank"><?php echo $module; ?></a></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
