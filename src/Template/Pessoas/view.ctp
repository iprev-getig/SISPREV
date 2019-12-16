<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Pessoa']), ['action' => 'edit', $pessoa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Pessoa']), ['action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Pessoas']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Pessoa']), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoas view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($pessoa->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Cpf</th>
            <td><?= h($pessoa->cpf) ?></td>
        </tr>
        <tr>
            <th>Matricula</th>
            <td><?= h($pessoa->matricula) ?></td>
        </tr>
        <tr>
            <th>Data Nasc</th>
            <td><?= h($pessoa->data_nasc) ?></tr>
        </tr>
    </table>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($pessoa->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($pessoa->modified) ?>
    </tr>
</tr>
</table>
</div>
