<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tiposAtendimento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tiposAtendimento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Tipos Atendimentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tiposAtendimentos form col-md-10 columns content">
    <?= $this->Form->create($tiposAtendimento) ?>
    <fieldset>
        <legend>
            <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
            <?= __('Edit {0}', 'Tipos Atendimento') ?>
        </legend>
        <?php
            echo $this->Form->input('nome', ['autofocus' => 'autofocus']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
