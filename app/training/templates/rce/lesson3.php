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
    <h1 class="text-center">Blog Post</h1>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-default">
                <div class="panel-heading">Blog Post</div>
                <div class="panel-body">In lacinia turpis ac maximus tincidunt. Proin aliquam dui lacus, sit amet venenatis odio vehicula ut. Nulla facilisis urna nisl, et posuere est ornare nec. Proin diam mi, congue vel lorem in, luctus bibendum justo. Nulla placerat ultricies convallis. Quisque vitae interdum neque, quis porta eros. Vivamus sapien nisi, hendrerit sed iaculis sit amet, dignissim ut augue. Pellentesque porttitor mauris sit amet dolor cursus, quis rhoncus dolor ultricies. </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>
                <div class="panel-body">
                    <div><label>Load Comment:</label></div>
                    <select name="comment_id" class="form-control">
                        <option value="0">Please Choose</option>
                        <?php foreach( scandir(getcwd().'/../data/blogcomments') as $file ){
                            if( substr($file,-4,4) == '.txt' ){
                                $id = (int)str_replace(".txt","",$file);
                            ?>
                            <option value="<?php echo $id; ?>"><?php echo date("d/m/y H:i:s",$id); ?></option>
                        <?php }} ?>
                    </select>
                    <div style="margin-top:10px"><iframe id="comment" height="400px" width="100%" src=""></iframe></div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Leave Comment</div>
                <div class="panel-body">
                    <form method="post">
                        <div><textarea name="comment" class="form-control"></textarea></div>
                        <div style="margin-top:10px"><input type="submit" class="btn btn-success pull-right" value="Leave Comment"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>

    $('select[name="comment_id"]').change( function(){
        $('iframe#comment').attr('src','/comment/' +  $(this).val() );
    });

</script>
</body>
</html>