<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Cadastro']), ['action' => 'edit', $cadastro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Cadastro']), ['action' => 'delete', $cadastro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cadastro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cadastros']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cadastro']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cadastros']), ['controller' => 'Cadastros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cadastro']), ['controller' => 'Cadastros', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cadastros view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($cadastro->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Sigla</th>
            <td><?= h($cadastro->sigla) ?></td>
        </tr>
        <tr>
            <th>Cpf</th>
            <td><?= h($cadastro->cpf) ?></td>
        </tr>
        <tr>
            <th>Cadastro Id</th>
            <td><?= $this->Number->format($cadastro->cadastro_id) ?></td>
        </tr>
        <tr>
            <th>Data</th>
            <td><?= h($cadastro->data) ?></tr>
        </tr>
        <tr>
            <th>Bloqueado</th>
            <td>
                <?php echo $cadastro->bloqueado 
                    ? $this->Html->tag('i', '', array('class' => 'far fa-check-square')) 
                    : $this->Html->tag('i', '', array('class' => 'far fa-square')) ; ?>
            </td>
         </tr>
    <tr>
        <th>Descricao</th>
        <td>
            <?= $this->Text->autoParagraph(h($cadastro->descricao)); ?>
        </td>
    </tr>
    </table>
    <div class="related">
        <?php if (!empty($cadastro->cadastros)): ?>
            <h4>
                <?= $this->Html->tag('i', '', array('class' => 'fas fa-user')) ?>
                <?= __('Related {0}', ['Cadastros']) ?>
            </h4>
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Cadastro Id</th>
                <th>Bloqueado</th>
                <th>Descricao</th>
                <th>Cpf</th>
                <th>Foto</th>
                <th>Data</th>
                <th>Created</th>
                <th>Modified</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cadastro->cadastros as $cadastros): ?>
            <tr>
                <td><?= h($cadastros->id) ?></td>
                <td><?= h($cadastros->nome) ?></td>
                <td><?= h($cadastros->sigla) ?></td>
                <td><?= h($cadastros->cadastro_id) ?></td>
                <td><?= h($cadastros->bloqueado) ?></td>
                <td><?= h($cadastros->descricao) ?></td>
                <td><?= h($cadastros->cpf) ?></td>
                <td><?= h($cadastros->foto) ?></td>
                <td><?= h($cadastros->data) ?></td>
                <td><?= h($cadastros->created) ?></td>
                <td><?= h($cadastros->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cadastros', 'action' => 'view', $cadastros->id], ['class'=>'btn btn-default btn-xs']) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cadastros', 'action' => 'edit', $cadastros->id], ['class'=>'btn btn-primary btn-xs']) ?>

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
    <?= h($cadastro->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($cadastro->modified) ?>
    </tr>
</tr>
</table>
</div>
