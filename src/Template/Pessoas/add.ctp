<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Pessoas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pessoas form col-md-10 columns content">
    <?= $this->Form->create($pessoa) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Pessoa') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('cpf');
            echo $this->Form->input('matricula');
            echo $this->Form->input('data_nasc', ['type' => 'text', 'empty' => true, 'default' => '', 'class' => 'datepicker-start']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
