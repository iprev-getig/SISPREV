<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Sistemas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Acessos'), ['controller' => 'Acessos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Acesso'), ['controller' => 'Acessos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sistemas form col-md-10 columns content">
    <?= $this->Form->create($sistema) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Sistema') ?>
        </legend>
        <?php
            echo $this->Form->input('sigla', ['autofocus' => 'autofocus']);
            echo $this->Form->input('nome');
            echo $this->Form->input('descricao');
            echo $this->Form->input('icone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
