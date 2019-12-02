<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Tipos Acessos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tiposAcessos form col-md-10 columns content">
    <?= $this->Form->create($tiposAcesso) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Tipos Acesso') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('controller');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
