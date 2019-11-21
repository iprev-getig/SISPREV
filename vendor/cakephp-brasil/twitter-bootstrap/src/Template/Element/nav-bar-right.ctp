<ul class="nav navbar-nav navbar-right">
  <li>
    <a href="http://intranet.iprev.sc.gov.br/" target="_blank"><?= $this->Html->tag('i', '', array('class' => 'fas fa-network-wired')); ?> Intranet</a>
  </li>
  <li>
    <a href="http://iprev.sc.gov.br/" target="_blank"><?= $this->Html->tag('i', '', array('class' => 'fas fa-globe')); ?> IPREV</a>
  </li>
  

  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <?= $this->Html->tag('i', '', array('class' => 'far fa-user')); ?> Usuário
      <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li>
        <a href="#">
          <?= $this->Html->tag('i', '', array('class' => 'far fa-user')); ?> Perfil
        </a>
      </li>
      <li>
        <a href="#">
          <?= $this->Html->tag('i', '', array('class' => 'fas fa-cog')); ?> Configurações
        </a>
      </li>
      <li role="separator" class="divider"></li>
      <li>
        <a href="#">
          <?= $this->Html->tag('i', '', array('class' => 'fas fa-sign-out-alt')); ?> Sair
        </a>
      </li>
    </ul>
  </li>
</ul>
<!-- <form class="navbar-form navbar-right" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> -->
