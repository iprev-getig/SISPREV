<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('New {0}', ['Estado']), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List {0}', ['Cidades']), ['controller' => 'Cidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', ['Cidade']), ['controller' => 'Cidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Export'), ['_ext' => 'xlsx'], ['class'=>'add']) ?></li>
    </ul>
</nav>

<div class="ajax-form">
    <div class="importador index col-md-10 columns content">
        <h3>
            <?= $this->Html->tag('i', '', array('class' => 'fas fa-chevron-right')) ?>
            Importador
        </h3>
        <div class="row">
            <?php echo $this->Form->create('importador', ['url' => ['action' => 'importar']]); //['action' => 'importar'] ?>
            <div class="col-md-3">
                <?php echo $this->Form->input('Orgaos', array('type' => 'checkbox', 'checked' => true)); ?>
            </div>
            <div class="col-md-3">
			<?php echo $this->Form->input('Caminho', ['value' => '/home/ivo/TesteSAGEN.fdb']); //172.16.200.32:3050/c:/bd/sagen/sagen.fdb?>
            </div>			
            <div class="col-md-1">
                <?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'fas fa-filter')), ['type' => 'submit']); ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
        
    </div>
</div>
</div>


<?php /*


<div class="panel panel-default">

<!-- <div class="panel-heading">
            <h3><?php echo __('Importar');?>
            	<small><?php echo __('Registros') ?></small>
            </h3>
        </div> -->
	
	<div class="panel-body">

		<div class="importador form">
        <?php echo $this->Form->create(); ?>

				<fieldset>

<?php //echo $this->Form->input('Caminho', array('value' => 'D:\\Delphi\\PosGraduacao\\exe\\BANCO.FDB')); ?>
<?php //echo $this->Form->input('Caminho', ['value' => '172.16.200.32:3050/c:/bd/sagen/sagen.fdb']); ?>

<div id="importados">
	<div class="importar">
		<?php //echo $this->Form->input('Programas', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('TipoAtendimento', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Orgao', array('type' => 'checkbox')); ?>
	</div>
    <div class="importar">
		<?php echo $this->Form->input('Cidade', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Operador', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Coordenadoria', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Localizacao', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Ordem', array('type' => 'checkbox')); ?>
	</div>
</div>

<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Importar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>
<br>
<?php echo $this->Html->link('<i class="fa fa-print"></i> Relatório', array('controller' => 'importador', 'action' => 'relatorio'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Relatório'), 'data-toggle'=>'tooltip')); ?>


		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

*/
?>

