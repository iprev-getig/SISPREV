<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Tipos Acesso']), ['action' => 'edit', $tiposAcesso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Tipos Acesso']), ['action' => 'delete', $tiposAcesso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiposAcesso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Tipos Acessos']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Tipos Acesso']), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tiposAcessos view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($tiposAcesso->nome) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Controller</th>
            <td><?= h($tiposAcesso->controller) ?></td>
        </tr>
        <tr>
            <th>Principal</th>
            <td>
                <?php echo $tiposAcesso->principal 
                    ? $this->Html->tag('i', '', array('class' => 'far fa-check-square')) 
                    : $this->Html->tag('i', '', array('class' => 'far fa-square')) ; ?>
            </td>
         </tr>
    </table>
<table class="table table-striped table-hover">
<tr>
    <th><?= __('Created') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'far fa-edit')) ?>
    <?= h($tiposAcesso->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($tiposAcesso->modified) ?>
    </tr>
</tr>
</table>
</div>
