<?php
use yii\helpers\Url;
?>

<div class="page-catalog-menu">
        	<?php foreach($categories as $category):?>
            <div class="page-catalog-menu-item">
                <button id="catalog-btn-<?=$category->id?>" class="page-catalog-black"><?=$category->title?></button>
                <ul id="catalog-list-<?=$category->id?>">
                	<?php foreach($category->getSubcategories() as $item):?>
                    <li><a href="<?=Url::to(['/catalog/subcategory','id' => $item->slug])?>"><?=$item->title?></a></li>
                    <?php endforeach;?>

                </ul>
            </div>
        	<?php endforeach;?>