
<h2>条件を絞って売り上げランキング検索</h2>
<?php

echo $this->Form->create('Category');
//echo $this->Form->input('name');

echo $this->Form->input(
    'gender',
    array('options' => $genders)
    );
echo $this->Form->input(
    'generation',
    array('options' => $generations)
    );
echo $this->Form->input(
    'period',
    array('options' => $periods)
    );
echo $this->Form->input(
    'offset',
    array('options' => $offsets)
    );
echo $this->Form->input(
    'name',
    array('options' => $categories)
    );
echo $this->Form->end('Search Ranking');
?>
<h2>売り上げランキング結果</h2>
<ul class ="listview">
    <?php foreach ($ranking_data as $hit) { ?>
    <li> 
        <?php //debug($hit);?>    
        <img src="<?php echo h($hit->Image->Medium); ?>" width="100" height="100" >
        <!--<p>JanCode:<?php echo h($hit->JanCode); ?>
        Code:--><?php 
        $itemcode=$hit->Code;
        //echo h($itemcode); 
        $linkurl="./itemLookup?itemcode=".$itemcode;
        ?>
        <!--Url:<?php echo h($hit->Url); ?></p>
        code:<?php echo h($hit->Code); ?></p>-->
         <a href=<?php echo($linkurl);?>>
             <p class="itemname"><?php echo h($hit->Name); ?></p>
        </a>
       <!-- <p class="itemdescription"><?php echo h($hit->Description); ?></p>
        <p class="reviewrate"><?php echo h($hit->Review->Count); ?></p>-->
        <p class="storename"><?php echo h($hit->Store->Name); ?></p>
    </li>
    <?php } ?>

</ul>

<!--
<?php foreach ($ranking_data as $hit) { ?>
<div class="Item">
    JanCode:<?php echo h($hit->JanCode); ?>
    Code:<?php 
    $itemcode=$hit->Code;
    echo h($itemcode); 
    $linkurl="./itemLookup?itemcode=".$itemcode;
    ?>
    Url:<?php echo h($hit->Url); ?>
    <a href=<?php echo($linkurl);?>>
        <h2><?php echo h($hit->Name); ?></h2>
        <p><img src="<?php echo h($hit->Image->Medium); ?>" /><?php echo h($hit->Description); ?>code:<?php echo h($hit->Code); ?></p>
    </a>
</div>
<?php } ?>
-->







