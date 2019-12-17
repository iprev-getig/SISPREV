<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('New {0}', ['Sistema']), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Acessos']), ['controller' => 'Acessos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Acesso']), ['controller' => 'Acessos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Export'), ['_ext' => 'xlsx'], ['class'=>'add']) ?></li>
    </ul>
</nav>

<div class="ajax-form">
    <div class="sistemas index col-md-10 columns content">
        <h3>
            <?= $this->Html->tag('i', '', array('class' => 'fas fa-chevron-right')) ?>
            Sistemas
        </h3>
        <div class="row">
            <?php echo $this->Form->create(); ?>
            <div class="col-md-3">
                <?php echo $this->Form->input('field', ['type' => 'select', 'options' => $options, 'label' => False, 'value' => $field]); ?>
            </div>
            <div class="col-md-8">
                <?php echo $this->Form->input('q', ['autofocus' => 'autofocus', 'value' => $busca, 'label' => False, 'placeholder' => __('_search')]); ?>
            </div>
            <div class="col-md-1">
                <?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'fas fa-filter')), ['type' => 'submit']); ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
        <table class="table list table-striped table-hover">
            <thead>
                <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('sigla') ?></th>
                        <th><?= $this->Paginator->sort('nome') ?></th>
                        <th><?= $this->Paginator->sort('descricao') ?></th>
                        <th><?= $this->Paginator->sort('icone') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sistemas as $sistema): ?>
                <tr>
                        <td><?= $this->Number->format($sistema->id) ?></td>
                        <td><?= h($sistema->sigla) ?></td>
                        <td><?= h($sistema->nome) ?></td>
                        <td><?= h($sistema->descricao) ?></td>
                        <td><?= h($sistema->icone) ?></td>
                        <td><?= h($sistema->created) ?></td>
                        <td><?= h($sistema->modified) ?></td>
                        <td class="actions" style="white-space:nowrap">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sistema->id], ['class'=>'btn btn-default btn-xs']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sistema->id], ['class'=>'btn btn-primary btn-xs']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sistema->id], ['class'=>'btn btn-danger btn-xs ajax-delete', 'escapeTitle' => false]) ?>
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
            </center>
        </div>
    </div>
</div>
</div>