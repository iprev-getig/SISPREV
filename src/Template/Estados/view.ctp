<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Estado']), ['action' => 'edit', $estado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Estado']), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Estados']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Estado']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cidades']), ['controller' => 'Cidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['controller' => 'Cidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estados view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($estado->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Uf</th>
            <td><?= h($estado->uf) ?></td>
        </tr>
    </table>
    <div class="related">
        <?php if (!empty($estado->cidades)): ?>
            <h4>
                <?= $this->Html->tag('i', '', array('class' => 'fas fa-user')) ?>
                <?= __('Related {0}', ['Cidades']) ?>
            </h4>
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Estado Id</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->cidades as $cidades): ?>
            <tr>
                <td><?= h($cidades->id) ?></td>
                <td><?= h($cidades->nome) ?></td>
                <td><?= h($cidades->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cidades', 'action' => 'view', $cidades->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cidades', 'action' => 'edit', $cidades->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cidades', 'action' => 'delete', $cidades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cidades->id)]) ?>

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
    <?= h($estado->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($estado->modified) ?>
    </tr>
</tr>
</table>
</div>
