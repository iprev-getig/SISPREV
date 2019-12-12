<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Atendimentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="atendimentos form col-md-10 columns content">
    <?= $this->Form->create($atendimento) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Add {0}', 'Atendimento') ?>
        </legend>
        <?php
            echo $this->Form->input('inicio', ['autofocus' => 'autofocus']);
            echo $this->Form->input('usuario_id');
            echo $this->Form->input('cidade_id');
            echo $this->Form->input('tipo_atendimento_id');
            echo $this->Form->input('requerente_id');
            echo $this->Form->input('beneficiario_id');
            echo $this->Form->input('orgao_id');
            echo $this->Form->input('solucao');
            echo $this->Form->input('conclusao');
            echo $this->Form->input('fim');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
