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
    <h1 class="text-center">View Product</h1>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6 col-md-offset-1">
            <img class="img-responsive" src="/images/pic.jpg">
        </div>
        <div class="col-md-4">
            <h3>Hacker Stickers</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique arcu sed lacus fringilla auctor. Phasellus rutrum, metus non sodales fermentum, odio lacus fringilla magna, ac finibus risus magna et ante. Curabitur eleifend tellus vel rutrum consequat. In a nisi rutrum nisi eleifend consectetur quis non orci. Aenean id eleifend justo, id sagittis dui. Aliquam erat volutpat. Etiam euismod mauris et sollicitudin ultricies</p>
            <input type="button" class="btn btn-xs btn-success checkstock" value="Check Stock">
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $('input.checkstock').click( function() {
        $.getJSON('/stock-check/?product_id=1', function (resp) {
            alert('There are ' + resp.stock + ' item(s) in stock');
        }).fail(function () {
            alert('Could not find stock information');
        });
    });
</script>
</body>
</html>