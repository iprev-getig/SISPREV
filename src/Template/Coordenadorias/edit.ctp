<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coordenadoria->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coordenadoria->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Coordenadorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Cidades'), ['controller' => 'Cidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Cidade'), ['controller' => 'Cidades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coordenadorias form col-md-10 columns content">
    <?= $this->Form->create($coordenadoria) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Edit {0}', 'Coordenadoria') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('usuario_id', ['options' => $usuarios, 'empty' => true]);
            echo $this->Form->input('cidade_id', ['options' => $cidades, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
