<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username');
        //echo $this->Form->input('mail');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); 

?>
</div>
<!--<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
    </ul>
</div>
-->
<div class="actions">
    <!-- <?php if ($auth->loggedIn()) : ?>
    <?php echo h($auth->user('username')); ?> さん、<br>こんにちは<br><br> <a href="/cakephp-blog/Users/logout">logout</a>
    <?php else: ?>
    <a href="/cakephp-blog/Users/login">login</a>
    <?php endif ?>-->

    <br>
    <br>
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
    </ul>
</div>
<!--
<?php echo $this->Html->link(__('New User?'), array('controller'=>'users','action' => 'add')); ?>
-->