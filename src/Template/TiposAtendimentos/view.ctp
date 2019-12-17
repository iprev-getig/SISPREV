<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Tipos Atendimento']), ['action' => 'edit', $tiposAtendimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Tipos Atendimento']), ['action' => 'delete', $tiposAtendimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiposAtendimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Tipos Atendimentos']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Tipos Atendimento']), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tiposAtendimentos view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($tiposAtendimento->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
    </table>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($tiposAtendimento->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($tiposAtendimento->modified) ?>
    </tr>
</tr>
</table>
</div>
