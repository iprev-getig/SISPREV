<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Setores'), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Setore'), ['controller' => 'Setores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form col-md-10 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Edit {0}', 'User') ?>
        </legend>
        <?php
            echo $this->Form->input('username', ['autofocus' => 'autofocus']);
            echo $this->Form->input('email');
            echo $this->Form->input('nome');
            echo $this->Form->input('password');
            echo $this->Form->input('bloqueado');
            echo $this->Form->input('ult_acesso');
            echo $this->Form->input('setor_id', ['options' => $setores, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
