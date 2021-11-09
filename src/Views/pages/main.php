<?php

use App\Views\Ui\Button;
use App\Views\Ui\Item;
use App\Views\Ui\Image;

include_once COMPONENTS_PATH . 'header.php'; 
?>
    <?php foreach($content as $key => $item):?>
        <?php if($key > $limit): break?>
        <?php endif ?>
        <div class="news">
            <?php
                list($title, $image, $text, $link) = array_values($item);
                echo Image::createImage($image);
                echo Item::createItem($title, $text);
                echo Button::createButton($link);
            ?>
        </div>
        
    <?php endforeach;?>

<?php include_once COMPONENTS_PATH . 'footer.php'; ?>
