<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Orgao']), ['action' => 'edit', $orgao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Orgao']), ['action' => 'delete', $orgao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orgao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Orgaos']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Orgao']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cidades']), ['controller' => 'Cidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['controller' => 'Cidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orgaos view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($orgao->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Sigla</th>
            <td><?= h($orgao->sigla) ?></td>
        </tr>
        <tr>
            <th>Cidade</th>
            <td><?= $orgao->has('cidade') ? $this->Html->link($orgao->cidade->nome, ['controller' => 'Cidades', 'action' => 'view', $orgao->cidade->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Codigo</th>
            <td><?= $this->Number->format($orgao->codigo) ?></td>
        </tr>
    </table>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($orgao->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($orgao->modified) ?>
    </tr>
</tr>
</table>
</div>
