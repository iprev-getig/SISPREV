<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['User']), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['User']), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Users']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['User']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Setores']), ['controller' => 'Setores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Setore']), ['controller' => 'Setores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view col-lg-10 col-md-9">
    <h3>
        <?= $this->Html->tag('i', '', array('class' => 'fas fa-eye')) ?>
        <?= h($user->id) ?>
    </h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Login</th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?= h($user->nome) ?></td>
        </tr>
        <tr>
            <th>Senha</th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th>Setore</th>
            <td><?= $user->has('setore') ? $this->Html->link($user->setore->nome, ['controller' => 'Setores', 'action' => 'view', $user->setore->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Ult Acesso</th>
            <td><?= h($user->ult_acesso) ?></tr>
        </tr>
        <tr>
            <th>Bloqueado</th>
            <td>
                <?php echo $user->bloqueado 
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
    <?= h($user->created) ?>
    </tr>
</tr>
<tr>
    <th><?= __('Modified') ?></th>
    <td>
    <?= $this->Html->tag('i', '', array('class' => 'fas fa-edit')) ?>
    <?= h($user->modified) ?>
    </tr>
</tr>
</table>
</div>
