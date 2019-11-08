<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('New {0}', ['Orgao']), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Ordem']), ['controller' => 'Ordem', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Ordem']), ['controller' => 'Ordem', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orgao index col-md-10 columns content">
    <h3>Orgao</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('sigla') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orgao as $orgao): ?>
            <tr>
                <td><?= $this->Number->format($orgao->id) ?></td>
                <td><?= h($orgao->nome) ?></td>
                <td><?= h($orgao->sigla) ?></td>
                <td class="actions" style="white-space:nowrap">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orgao->id], ['class'=>'btn btn-default btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orgao->id], ['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orgao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orgao->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <center>
            <ul class="pagination">
                <?= $this->Paginator->prev('&laquo; ' . __('previous'), ['escape'=>false]) ?>
                <?= $this->Paginator->numbers(['escape'=>false]) ?>
                <?= $this->Paginator->next(__('next') . ' &raquo;', ['escape'=>false]) ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} records out of
         {{count}} total, starting on record {{start}}, ending on {{end}}')) ?></p>
        </div>
        </center>
</div>
</div>