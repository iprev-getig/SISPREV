<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Acessos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Tipos Acessos'), ['controller' => 'TiposAcessos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Tipos Acesso'), ['controller' => 'TiposAcessos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="acessos form col-md-10 columns content">
    <?= $this->Form->create($acesso) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Acesso') ?>
        </legend>
        <?php
            echo $this->Form->input('index', ['autofocus' => 'autofocus']);
            echo $this->Form->input('add');
            echo $this->Form->input('edit');
            echo $this->Form->input('del');
            echo $this->Form->input('view');
            echo $this->Form->input('tipo_acesso_id', ['options' => $tiposAcessos, 'empty' => true]);
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('sistema_id', ['options' => $sistemas, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
