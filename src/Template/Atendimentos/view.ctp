<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Atendimento']), ['action' => 'edit', $atendimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Atendimento']), ['action' => 'delete', $atendimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atendimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Atendimentos']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Atendimento']), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atendimentos view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($atendimento->id) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Tipo Atendimento Id</th>
            <td><?= $this->Number->format($atendimento->tipo_atendimento_id) ?></td>
        </tr>
        <tr>
            <th>Usuario Id</th>
            <td><?= $this->Number->format($atendimento->usuario_id) ?></td>
        </tr>
        <tr>
            <th>Cidades Id</th>
            <td><?= $this->Number->format($atendimento->cidades_id) ?></td>
        </tr>
        <tr>
            <th>Pessoa Id</th>
            <td><?= $this->Number->format($atendimento->pessoa_id) ?></td>
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
