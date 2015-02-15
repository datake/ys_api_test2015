<h1>review検索</h1>

<?php
echo $this->Form->create('Search');

echo $this->Form->input(
    'categories',
    array('options' => $categories)
    );


echo $this->Form->end('Search ');
?>

結果一覧:
<?php foreach ($results as $result) { ?>
<div class="Item">
    <?php //debug($result);?>
    <h2><a href="<?php echo h($result->Url); ?>"><?php echo h($result->ReviewTitle); ?></a></h2>
   <p>Description:<?php echo h($result->Description); ?></p>
   <p>Rate:<?php echo h($result->Ratings->Rate); ?></p>
   <p>商品名:<?php echo h($result->Target->Name); ?></p>
</div>
<?php } ?>


