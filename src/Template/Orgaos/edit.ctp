<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orgao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orgao->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Orgaos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Cidades'), ['controller' => 'Cidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Cidade'), ['controller' => 'Cidades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orgaos form col-md-10 columns content">
    <?= $this->Form->create($orgao) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Edit {0}', 'Orgao') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('sigla');
            echo $this->Form->input('codigo');
            echo $this->Form->input('cidade_id', ['options' => $cidades, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
