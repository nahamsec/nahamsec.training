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
    <h1 class="text-center">Upload Contacts</h1>
    <h3 class="text-center">Upload your contacts here!</h3>
    <div class="text-center"><a href="/contacts.xml" target="_blank">Sample Contact File</a></div>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6 col-md-offset-3">
            <div class="row">
                <?php if( $data["done"] ){ ?>
                    <div class="alert alert-success text-center" style="margin-top:15px">
                        <p>Upload Complete</p>
                    </div>
                <?php } ?>
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
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>