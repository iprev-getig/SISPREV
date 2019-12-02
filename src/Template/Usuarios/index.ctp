<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('New {0}', ['Usuario']), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Setores']), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Setore']), ['controller' => 'Setores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Acessos']), ['controller' => 'Acessos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Acesso']), ['controller' => 'Acessos', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="ajax-form">
    <div class="usuarios index col-md-10 columns content">
        <h3>
            <?= $this->Html->tag('i', '', array('class' => 'fas fa-chevron-right')) ?>
            Usuarios
        </h3>
        <div class="row">
            <?php echo $this->Form->create(); ?>
            <div class="col-md-11">
                <?php echo $this->Form->input('q', ['autofocus' => 'autofocus', 'value' => $busca, 'label' => False, 'placeholder' => 'Pesquisar por: COLOCAR AQUI CAMPOS STRING']); ?>
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
                        <th><?= $this->Paginator->sort('senha') ?></th>
                        <th><?= $this->Paginator->sort('bloqueado') ?></th>
                        <th><?= $this->Paginator->sort('ult_acesso') ?></th>
                        <th><?= $this->Paginator->sort('setor_id') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                        <td><?= $this->Number->format($usuario->id) ?></td>
                        <td><?= h($usuario->nome) ?></td>
                        <td><?= h($usuario->senha) ?></td>
                        <td>
                        <?php echo $usuario->bloqueado 
                            ? $this->Html->tag('i', '', array('class' => 'far fa-check-square')) 
                            : $this->Html->tag('i', '', array('class' => 'far fa-square')) ; ?>
                    </td>
                        <td><?= h($usuario->ult_acesso) ?></td>
                        <td><?= $usuario->has('setore') ? $this->Html->link($usuario->setore->id, ['controller' => 'Setores', 'action' => 'view', $usuario->setore->id]) : '' ?></td>
                        <td><?= h($usuario->created) ?></td>
                        <td class="actions" style="white-space:nowrap">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuario->id], ['class'=>'btn btn-default btn-xs']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id], ['class'=>'btn btn-primary btn-xs']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuario->id], ['class'=>'btn btn-danger btn-xs ajax-delete', 'escapeTitle' => false]) ?>
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