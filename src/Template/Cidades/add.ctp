<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Cidades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Coordenadorias'), ['controller' => 'Coordenadorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Coordenadoria'), ['controller' => 'Coordenadorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Setores'), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Setore'), ['controller' => 'Setores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cidades form col-md-10 columns content">
    <?= $this->Form->create($cidade) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Cidade') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('estado_id', ['options' => $estados, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
