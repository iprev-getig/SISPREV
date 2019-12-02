<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Coordenadoria']), ['action' => 'edit', $coordenadoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Coordenadoria']), ['action' => 'delete', $coordenadoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coordenadoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Coordenadorias']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Coordenadoria']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Usuarios']), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Usuario']), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cidades']), ['controller' => 'Cidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['controller' => 'Cidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="coordenadorias view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($coordenadoria->id) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <td><?= h($coordenadoria->nome) ?></td>
        </tr>
        <tr>
            <th>Usuario</th>
            <td><?= $coordenadoria->has('usuario') ? $this->Html->link($coordenadoria->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $coordenadoria->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Cidade</th>
            <td><?= $coordenadoria->has('cidade') ? $this->Html->link($coordenadoria->cidade->id, ['controller' => 'Cidades', 'action' => 'view', $coordenadoria->cidade->id]) : '' ?></td>
        </tr>
    </table>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($coordenadoria->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($coordenadoria->modified) ?>
    </tr>
</tr>
</table>
</div>
