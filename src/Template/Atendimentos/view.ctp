<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Atendimento']), ['action' => 'edit', $atendimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Atendimento']), ['action' => 'delete', $atendimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atendimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Atendimentos']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Atendimento']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Usuarios']), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Usuario']), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cidades']), ['controller' => 'Cidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['controller' => 'Cidades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Tipos Atendimentos']), ['controller' => 'TiposAtendimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Tipos Atendimento']), ['controller' => 'TiposAtendimentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Pessoas']), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Pessoa']), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Orgaos']), ['controller' => 'Orgaos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Orgao']), ['controller' => 'Orgaos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atendimentos view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($atendimento->id) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Usuario</th>
            <td><?= $atendimento->has('usuario') ? $this->Html->link($atendimento->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $atendimento->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Cidade</th>
            <td><?= $atendimento->has('cidade') ? $this->Html->link($atendimento->cidade->nome, ['controller' => 'Cidades', 'action' => 'view', $atendimento->cidade->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Tipos Atendimento</th>
            <td><?= $atendimento->has('tipos_atendimento') ? $this->Html->link($atendimento->tipos_atendimento->nome, ['controller' => 'TiposAtendimentos', 'action' => 'view', $atendimento->tipos_atendimento->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Pessoa</th>
            <td><?= $atendimento->has('pessoa') ? $this->Html->link($atendimento->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $atendimento->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Orgao</th>
            <td><?= $atendimento->has('orgao') ? $this->Html->link($atendimento->orgao->nome, ['controller' => 'Orgaos', 'action' => 'view', $atendimento->orgao->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Requerente Id</th>
            <td><?= $this->Number->format($atendimento->requerente_id) ?></td>
        </tr>
        <tr>
            <th>Inicio</th>
            <td><?= h($atendimento->inicio) ?></tr>
        </tr>
        <tr>
            <th>Fim</th>
            <td><?= h($atendimento->fim) ?></tr>
        </tr>
    <tr>
        <th>Solucao</th>
        <td>
            <?= $this->Text->autoParagraph(h($atendimento->solucao)); ?>
        </td>
    </tr>
    <tr>
        <th>Conclusao</th>
        <td>
            <?= $this->Text->autoParagraph(h($atendimento->conclusao)); ?>
        </td>
    </tr>
    </table>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($atendimento->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($atendimento->modified) ?>
    </tr>
</tr>
</table>
</div>
