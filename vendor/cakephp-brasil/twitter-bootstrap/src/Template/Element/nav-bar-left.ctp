<ul class="nav navbar-nav">
	<li class="active">
		<?= $this->Html->link($config_sistema, ['controller' => 'dashboard', 'action' => 'index', $config_sistema]) ?>
	</li>
	<li><a href="#"><?= $this->Html->tag('i', '', array('class' => 'fab fa-elementor')); ?> Tela Principal</a></li>
	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	  <?= $this->Html->tag('i', '', array('class' => 'fas fa-bars')); ?> Cadastros <span class="caret"></span>
	  </a>
	  <ul class="dropdown-menu">
	  	<?php foreach ($config_menus as $menu): ?>
			<li>
				<?= $this->Html->link($menu['TipoAcesso']['descricao'], ['controller' => $menu['TipoAcesso']['controller'], 'action' => 'index']) ?>
			</li>
		<?php endforeach; ?>
	    <!-- <li><a href="#">Action</a></li>
	    <li><a href="#">Another action</a></li>
	    <li><a href="#">Something else here</a></li>
	    <li role="separator" class="divider"></li>
	    <li><a href="#">Separated link</a></li>
	    <li role="separator" class="divider"></li>
	    <li><a href="#">One more separated link</a></li> -->
	  </ul>
	</li>
</ul>
