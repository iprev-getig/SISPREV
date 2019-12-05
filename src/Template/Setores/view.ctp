<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Setore']), ['action' => 'edit', $setore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Setore']), ['action' => 'delete', $setore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Setores']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Setore']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cidades']), ['controller' => 'Cidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['controller' => 'Cidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="setores view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($setore->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Sigla</th>
            <td><?= h($setore->sigla) ?></td>
        </tr>
        <tr>
            <th>Cidade</th>
            <td><?= $setore->has('cidade') ? $this->Html->link($setore->cidade->nome, ['controller' => 'Cidades', 'action' => 'view', $setore->cidade->id]) : '' ?></td>
        </tr>
    </table>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($setore->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($setore->modified) ?>
    </tr>
</tr>
</table>
</div>
