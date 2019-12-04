<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'SISPREV: Instituto de Previdência do Estado de Santa Catarina';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('icones') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<header class="row">
    <div class="header-image"><?= $this->Html->image('iprev.logo.jpeg', ['height'=>'100px', 'width'=>'100px']) ?></div>
    <div class="header-title">
        <h1>Instituto de Previdência do Estado de Santa Catarina</h1>
    </div>
</header>
<?php echo $this->Flash->render(); ?>
<div class="row">
    <?php foreach ($sistemas as $sistema): ?>
            <div class="dashboard-icon">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => $sistema->icone . ' fa-4x')), array('controller' => 'Dashboard', 'action' => 'index', $sistema->sigla), array('escape'=> false)); ?>
                <span><?= h($sistema->sigla) ?></span>
            </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <hr />
</div>

<div class="row">
    <div class="columns large-12 text-center">
        <h5 class="more">SISPREV</h5>
        <p>
           GETIG - Gerência de Tecnologia da Informação Governança Eletrônica
        </p>
    </div>
    <hr/>
</div>

<script src="https://kit.fontawesome.com/4e67fa5bd2.js" crossorigin="anonymous"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
