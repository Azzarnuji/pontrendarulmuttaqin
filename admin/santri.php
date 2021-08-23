<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
Testing
<?php
        $dirname = "../assets/santri/";
        $images = glob($dirname."*.png");
        $NO = 1;
?>
            <div class="container">
            <div class="row">
                <div class="col-12">
                <table class="table table-sm">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Images</th>
                    <th scope="col">Button</th>
                    </tr>
                </thead>
            <?php foreach($images as $image):?>
                <tbody>
                    <tr>
                    <th scope="row"><?=$NO++;?></th>
                    <td><a href="<?=$image;?>"><img class="img-thumbnail rounded" src="<?=$image;?>" height="300px" width="300px" /></a></td>
                    <td><a href="<?=$image;?>" class="btn btn-primary" type="submit" name="dowmload" value="<?=$image;?>" download=""<?=$image;?>"">Download</a></td>
                    </tr>
                </tbody>
            <?php endforeach;?>
            </table>  
                </div>
            </div>
            
            </div>
            
    </div>
</html>