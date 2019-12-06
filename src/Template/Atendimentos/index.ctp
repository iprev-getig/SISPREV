<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('New {0}', ['Atendimento']), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Export'), ['_ext' => 'xlsx'], ['class'=>'add']) ?></li>
    </ul>
</nav>

<div class="ajax-form">
    <div class="atendimentos index col-md-10 columns content">
        <h3>
            <?= $this->Html->tag('i', '', array('class' => 'fas fa-chevron-right')) ?>
            Atendimentos
        </h3>
        <div class="row">
            <?php echo $this->Form->create(); ?>
            <div class="col-md-11">
                                                                                                                                                                                                                                                                                                            <?php echo $this->Form->input('q', ['autofocus' => 'autofocus', 'value' => $busca, 'label' => False, 'placeholder' => 'Pesquisar por: ']); ?>
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
                        <th><?= $this->Paginator->sort('inicio') ?></th>
                        <th><?= $this->Paginator->sort('fim') ?></th>
                        <th><?= $this->Paginator->sort('tipo_atendimento_id') ?></th>
                        <th><?= $this->Paginator->sort('usuario_id') ?></th>
                        <th><?= $this->Paginator->sort('cidades_id') ?></th>
                        <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($atendimentos as $atendimento): ?>
                <tr>
                        <td><?= $this->Number->format($atendimento->id) ?></td>
                        <td><?= h($atendimento->inicio) ?></td>
                        <td><?= h($atendimento->fim) ?></td>
                        <td><?= $this->Number->format($atendimento->tipo_atendimento_id) ?></td>
                        <td><?= $this->Number->format($atendimento->usuario_id) ?></td>
                        <td><?= $this->Number->format($atendimento->cidades_id) ?></td>
                        <td><?= $this->Number->format($atendimento->pessoa_id) ?></td>
                        <td class="actions" style="white-space:nowrap">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $atendimento->id], ['class'=>'btn btn-default btn-xs']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $atendimento->id], ['class'=>'btn btn-primary btn-xs']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $atendimento->id], ['class'=>'btn btn-danger btn-xs ajax-delete', 'escapeTitle' => false]) ?>
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