<?php
        $dirname = "../assets/santri/";
        $images = glob($dirname."*.jpg");
        $NO = 1;
?>
        <?php foreach($images as $image):?>
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
                <tbody>
                    <tr>
                    <th scope="row"><?=$NO++;?></th>
                    <td><a href="<?=$image;?>"><img class="img-thumbnail rounded" src="<?=$image;?>" height="300px" width="300px" /></a></td>
                    <td><a href="<?=$image;?>" class="btn btn-primary" type="submit" name="dowmload" value="<?=$image;?>" download=""<?=$image;?>"">Download</a></td>
                    </tr>
                </tbody>
            </table>  
                </div>
            </div>
            
            </div>
            
        <?php endforeach;?>
    </div>