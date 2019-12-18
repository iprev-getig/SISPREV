<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $atendimento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $atendimento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Atendimentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Cidades'), ['controller' => 'Cidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Cidade'), ['controller' => 'Cidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Tipos Atendimentos'), ['controller' => 'TiposAtendimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Tipos Atendimento'), ['controller' => 'TiposAtendimentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Orgaos'), ['controller' => 'Orgaos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Orgao'), ['controller' => 'Orgaos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="atendimentos form col-md-10 columns content">
    <?= $this->Form->create($atendimento) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Edit {0}', 'Atendimento') ?>
        </legend>
        <?php
            echo $this->Form->input('inicio', ['autofocus' => 'autofocus']);
            echo $this->Form->input('usuario_id', ['options' => $usuarios, 'empty' => true]);
            echo $this->Form->input('cidade_id', ['options' => $cidades, 'empty' => true]);
            echo $this->Form->input('tipo_atendimento_id', ['options' => $tiposAtendimentos, 'empty' => true]);
            echo $this->Form->input('requerente_id');
            echo $this->Form->input('beneficiario_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('orgao_id', ['options' => $orgaos, 'empty' => true]);
            echo $this->Form->input('solucao');
            echo $this->Form->input('conclusao');
            echo $this->Form->input('fim');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
