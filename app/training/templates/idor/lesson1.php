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
                    <h3 class="panel-title">User Settings</h3>
                </div>
                <div class="panel-body">
                    <div><label>Username:</label></div>
                    <div><input name="username" class="form-control"></div>
                    <div style="margin-top:7px"><label>Email:</label></div>
                    <div><input name="email" class="form-control"></div>
                    <div style="margin-top:7px"><label>Telephone Number:</label></div>
                    <div><input name="tel" class="form-control"></div>
                    <input style="margin-top:20px" type="submit" class="btn btn-success pull-right" value="Update">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $.get('/settings/12',function(resp){
        $('input[name="username"]').val( resp.username );
        $('input[name="email"]').val( resp.email );
        $('input[name="tel"]').val( resp.tel );
    });
</script>
</body>
</html>