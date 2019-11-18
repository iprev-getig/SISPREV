<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Cadastros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Cadastros'), ['controller' => 'Cadastros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Cadastro'), ['controller' => 'Cadastros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cadastros form col-md-10 columns content">
    <?= $this->Form->create($cadastro) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Cadastro') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('sigla');
            echo $this->Form->input('cadastro_id');
            echo $this->Form->input('bloqueado');
            echo $this->Form->input('descricao');
            echo $this->Form->input('cpf', ['class' => 'cpf']);
            echo $this->Form->input('data', ['type' => 'text', 'empty' => true, 'default' => '', 'class' => 'datepicker-start']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
