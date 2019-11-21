<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('New {0}', ['Cadastro']), ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="ajax-form">
    <div class="cadastros index col-md-10 columns content">
        <h3>
            <?= $this->Html->tag('i', '', array('class' => 'fas fa-chart-line')) ?>
            <?= $sistema ?>
        </h3>
    </div>
</div>
</div>