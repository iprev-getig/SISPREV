<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Estados']), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Estado']), ['controller' => 'Estados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Atendimentos']), ['controller' => 'Atendimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Atendimento']), ['controller' => 'Atendimentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Coordenadorias']), ['controller' => 'Coordenadorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Coordenadoria']), ['controller' => 'Coordenadorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Orgaos']), ['controller' => 'Orgaos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Orgao']), ['controller' => 'Orgaos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Setores']), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Setore']), ['controller' => 'Setores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Export'), ['_ext' => 'xlsx'], ['class'=>'add']) ?></li>
    </ul>
</nav>

<div class="ajax-form">
    <div class="cidades index col-md-10 columns content">
        <h3>
            <?= $this->Html->tag('i', '', array('class' => 'fas fa-chevron-right')) ?>
            Cidades
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
                        <th><?= $this->Paginator->sort('nome') ?></th>
                        <th><?= $this->Paginator->sort('estado_id') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cidades as $cidade): ?>
                <tr>
                        <td><?= $this->Number->format($cidade->id) ?></td>
                        <td><?= h($cidade->nome) ?></td>
                        <td><?= $cidade->has('estado') ? $this->Html->link($cidade->estado->nome, ['controller' => 'Estados', 'action' => 'view', $cidade->estado->id]) : '' ?></td>
                        <td><?= h($cidade->created) ?></td>
                        <td><?= h($cidade->modified) ?></td>
                        <td class="actions" style="white-space:nowrap">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cidade->id], ['class'=>'btn btn-default btn-xs']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cidade->id], ['class'=>'btn btn-primary btn-xs']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cidade->id], ['class'=>'btn btn-danger btn-xs ajax-delete', 'escapeTitle' => false]) ?>
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