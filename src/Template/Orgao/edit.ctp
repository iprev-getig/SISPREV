<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orgao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orgao->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Orgao'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Ordem'), ['controller' => 'Ordem', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Ordem'), ['controller' => 'Ordem', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orgao form col-md-10 columns content">
    <?= $this->Form->create($orgao) ?>
    <fieldset>
        <legend><?= __('Edit {0}', 'Orgao') ?></legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
            echo $this->Form->input('sigla');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
