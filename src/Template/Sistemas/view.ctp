<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Sistema']), ['action' => 'edit', $sistema->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Sistema']), ['action' => 'delete', $sistema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sistema->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Sistemas']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Sistema']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Acessos']), ['controller' => 'Acessos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Acesso']), ['controller' => 'Acessos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sistemas view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($sistema->id) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Sigla</th>
            <td><?= h($sistema->sigla) ?></td>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?= h($sistema->nome) ?></td>
        </tr>
        <tr>
            <th>Descricao</th>
            <td><?= h($sistema->descricao) ?></td>
        </tr>
        <tr>
            <th>Icone</th>
            <td><?= h($sistema->icone) ?></td>
        </tr>
    </table>
    <div class="related">
        <?php if (!empty($sistema->acessos)): ?>
            <h4>
                <?= $this->Html->tag('i', '', array('class' => 'fas fa-user')) ?>
                <?= __('Related {0}', ['Acessos']) ?>
            </h4>
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Index</th>
                <th>Add</th>
                <th>Edit</th>
                <th>Del</th>
                <th>View</th>
                <th>Tipo Acesso Id</th>
                <th>Usuario Id</th>
                <th>Sistema Id</th>
                <th>Created</th>
                <th>Modified</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sistema->acessos as $acessos): ?>
            <tr>
                <td><?= h($acessos->id) ?></td>
                <td><?= h($acessos->index) ?></td>
                <td><?= h($acessos->add) ?></td>
                <td><?= h($acessos->edit) ?></td>
                <td><?= h($acessos->del) ?></td>
                <td><?= h($acessos->view) ?></td>
                <td><?= h($acessos->tipo_acesso_id) ?></td>
                <td><?= h($acessos->usuario_id) ?></td>
                <td><?= h($acessos->sistema_id) ?></td>
                <td><?= h($acessos->created) ?></td>
                <td><?= h($acessos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Acessos', 'action' => 'view', $acessos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Acessos', 'action' => 'edit', $acessos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Acessos', 'action' => 'delete', $acessos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acessos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($sistema->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($sistema->modified) ?>
    </tr>
</tr>
</table>
</div>
