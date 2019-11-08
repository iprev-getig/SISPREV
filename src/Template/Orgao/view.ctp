<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Orgao']), ['action' => 'edit', $orgao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Orgao']), ['action' => 'delete', $orgao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orgao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Orgao']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Orgao']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Ordem']), ['controller' => 'Ordem', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Ordem']), ['controller' => 'Ordem', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orgao view col-lg-10 col-md-9">
    <h3><?= h($orgao->id) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <td><?= h($orgao->nome) ?></td>
        </tr>
        <tr>
            <th>Sigla</th>
            <td><?= h($orgao->sigla) ?></td>
        </tr>
        <tr>
            <th>'Id</th>
            <td><?= $this->Number->format($orgao->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related {0}', ['Ordem']) ?></h4>
        <?php if (!empty($orgao->ordem)): ?>
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Solucao</th>
                <th>Localizacao Id</th>
                <th>Beneficiario</th>
                <th>Matricula</th>
                <th>Requerente</th>
                <th>Descricao</th>
                <th>Tipo Atendimento Id</th>
                <th>Operador Id</th>
                <th>Orgao Id</th>
                <th>Cpf</th>
                <th>Ip</th>
                <th>Foto</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($orgao->ordem as $ordem): ?>
            <tr>
                <td><?= h($ordem->id) ?></td>
                <td><?= h($ordem->solucao) ?></td>
                <td><?= h($ordem->localizacao_id) ?></td>
                <td><?= h($ordem->beneficiario) ?></td>
                <td><?= h($ordem->matricula) ?></td>
                <td><?= h($ordem->requerente) ?></td>
                <td><?= h($ordem->descricao) ?></td>
                <td><?= h($ordem->tipo_atendimento_id) ?></td>
                <td><?= h($ordem->operador_id) ?></td>
                <td><?= h($ordem->orgao_id) ?></td>
                <td><?= h($ordem->cpf) ?></td>
                <td><?= h($ordem->ip) ?></td>
                <td><?= h($ordem->foto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ordem', 'action' => 'view', $ordem->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ordem', 'action' => 'edit', $ordem->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ordem', 'action' => 'delete', $ordem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordem->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
