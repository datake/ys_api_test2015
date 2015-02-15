<h1>ショッピングデモサイト - 設定した値で商品リストを表示する - 「<?php echo h($query); ?>」の検索結果</h1>
<?php
echo $this->Form->create('Search');
//echo $this->Form->input('name');

echo $this->Form->input(
    'sort',
    array('options' => $sortOrder)
    );
echo $this->Form->input(
    'categories',
    array('options' => $categories)
    );
echo $this->Form->input(
    'price_from',
    array('options' => $price_from_select)
    );
echo $this->Form->input(
    'price_to',
    array('options' => $price_to_select)
    );
echo $this->Form->input(
    'offset',
    array('options' => $offset_select)
    );
echo $this->Form->input(
    'discount',
    array('options' => $discount_select)
    );

echo $this->Form->text(
    'query'
    );

echo $this->Form->end('Search ');
?>

結果一覧:<?php //debug($hits);?>

<?php foreach ($hits as $hit) { ?>
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
    <?php
   
    /*
    ?以下のリンクがうまくできない(%5B0%5Dがはいる)
    /itemLookup?itemcode%5B0%5D=yurakuseika_110001 となる
    $itemcodeArray["itemcode"]=$itemcode;
    echo $this->Html->link('リンク', array(
    'controller' => 'Posts',
    'action' => 'itemLookup',
    '?'=>$itemcodeArray
    ));*/
    ?>
   
</div>
<?php } ?>


