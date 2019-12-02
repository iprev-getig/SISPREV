<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estado->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Estados'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Cidades'), ['controller' => 'Cidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Cidade'), ['controller' => 'Cidades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estados form col-md-10 columns content">
    <?= $this->Form->create($estado) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Edit {0}', 'Estado') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('uf');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
