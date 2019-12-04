<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Setores'), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Setore'), ['controller' => 'Setores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Acessos'), ['controller' => 'Acessos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Acesso'), ['controller' => 'Acessos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Coordenadorias'), ['controller' => 'Coordenadorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Coordenadoria'), ['controller' => 'Coordenadorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuarios form col-md-10 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Usuario') ?>
        </legend>
        <?php
            echo $this->Form->input('login', ['autofocus' => 'autofocus']);
            echo $this->Form->input('email');
            echo $this->Form->input('nome');
            echo $this->Form->input('senha');
            echo $this->Form->input('bloqueado');
            echo $this->Form->input('ult_acesso');
            echo $this->Form->input('setor_id', ['options' => $setores, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
