<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Cidade']), ['action' => 'edit', $cidade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Cidade']), ['action' => 'delete', $cidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cidade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cidades']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Estados']), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Estado']), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Coordenadorias']), ['controller' => 'Coordenadorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Coordenadoria']), ['controller' => 'Coordenadorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Setores']), ['controller' => 'Setores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Setore']), ['controller' => 'Setores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cidades view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($cidade->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Estado</th>
            <td><?= $cidade->has('estado') ? $this->Html->link($cidade->estado->nome, ['controller' => 'Estados', 'action' => 'view', $cidade->estado->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <?php if (!empty($cidade->coordenadorias)): ?>
            <h4>
                <?= $this->Html->tag('i', '', array('class' => 'fas fa-user')) ?>
                <?= __('Related {0}', ['Coordenadorias']) ?>
            </h4>
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Usuario Id</th>
                <th>Cidade Id</th>
                <th>Created</th>
                <th>Modified</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cidade->coordenadorias as $coordenadorias): ?>
            <tr>
                <td><?= h($coordenadorias->id) ?></td>
                <td><?= h($coordenadorias->nome) ?></td>
                <td><?= h($coordenadorias->usuario_id) ?></td>
                <td><?= h($coordenadorias->cidade_id) ?></td>
                <td><?= h($coordenadorias->created) ?></td>
                <td><?= h($coordenadorias->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Coordenadorias', 'action' => 'view', $coordenadorias->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Coordenadorias', 'action' => 'edit', $coordenadorias->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Coordenadorias', 'action' => 'delete', $coordenadorias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coordenadorias->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($cidade->setores)): ?>
            <h4>
                <?= $this->Html->tag('i', '', array('class' => 'fas fa-user')) ?>
                <?= __('Related {0}', ['Setores']) ?>
            </h4>
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Cidade Id</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cidade->setores as $setores): ?>
            <tr>
                <td><?= h($setores->id) ?></td>
                <td><?= h($setores->nome) ?></td>
                <td><?= h($setores->sigla) ?></td>
                <td><?= h($setores->cidade_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Setores', 'action' => 'view', $setores->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Setores', 'action' => 'edit', $setores->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Setores', 'action' => 'delete', $setores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setores->id)]) ?>

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
    <?= h($cidade->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($cidade->modified) ?>
    </tr>
</tr>
</table>
</div>
