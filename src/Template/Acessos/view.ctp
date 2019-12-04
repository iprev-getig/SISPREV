<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Acesso']), ['action' => 'edit', $acesso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Acesso']), ['action' => 'delete', $acesso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acesso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Acessos']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Acesso']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Tipos Acessos']), ['controller' => 'TiposAcessos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Tipos Acesso']), ['controller' => 'TiposAcessos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Usuarios']), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Usuario']), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Sistemas']), ['controller' => 'Sistemas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Sistema']), ['controller' => 'Sistemas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="acessos view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($acesso->id) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Tipos Acesso</th>
            <td><?= $acesso->has('tipos_acesso') ? $this->Html->link($acesso->tipos_acesso->nome, ['controller' => 'TiposAcessos', 'action' => 'view', $acesso->tipos_acesso->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Usuario</th>
            <td><?= $acesso->has('usuario') ? $this->Html->link($acesso->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $acesso->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Sistema</th>
            <td><?= $acesso->has('sistema') ? $this->Html->link($acesso->sistema->nome, ['controller' => 'Sistemas', 'action' => 'view', $acesso->sistema->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Index</th>
            <td>
                <?php echo $acesso->index 
                    ? $this->Html->tag('i', '', array('class' => 'far fa-check-square')) 
                    : $this->Html->tag('i', '', array('class' => 'far fa-square')) ; ?>
            </td>
         </tr>
        <tr>
            <th>Add</th>
            <td>
                <?php echo $acesso->add 
                    ? $this->Html->tag('i', '', array('class' => 'far fa-check-square')) 
                    : $this->Html->tag('i', '', array('class' => 'far fa-square')) ; ?>
            </td>
         </tr>
        <tr>
            <th>Edit</th>
            <td>
                <?php echo $acesso->edit 
                    ? $this->Html->tag('i', '', array('class' => 'far fa-check-square')) 
                    : $this->Html->tag('i', '', array('class' => 'far fa-square')) ; ?>
            </td>
         </tr>
        <tr>
            <th>Del</th>
            <td>
                <?php echo $acesso->del 
                    ? $this->Html->tag('i', '', array('class' => 'far fa-check-square')) 
                    : $this->Html->tag('i', '', array('class' => 'far fa-square')) ; ?>
            </td>
         </tr>
        <tr>
            <th>View</th>
            <td>
                <?php echo $acesso->view 
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
    <?= h($acesso->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($acesso->modified) ?>
    </tr>
</tr>
</table>
</div>
