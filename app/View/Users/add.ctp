<!--http://book.cakephp.org/2.0/ja/tutorials-and-examples/blog-auth-example/auth.html-->
<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('mail');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


<div class="actions">
     <?php if ($auth->loggedIn()) : ?>
    <?php echo h($auth->user('username')); ?> さん、<br>こんにちは<br><br> <a href="/cakephp-blog/Users/logout">logout</a>
    <?php else: ?>
    <a href="/cakephp-blog/Users/login">login</a>
    <?php endif ?>
    <br>
    <br>
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
    </ul>
</div>



<!--<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
    <fieldset>
        <legend><?php echo __('Add Post'); ?></legend>
    <?php
        echo $this->Form->input('title');
        echo $this->Form->input('body');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
 
        <li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
    </ul>
</div>-->