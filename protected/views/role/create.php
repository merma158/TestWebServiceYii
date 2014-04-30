<?php
/* @var $this RoleController */
/* @var $model Role */

echo BsHtml::breadcrumbs(array(
    'Roles'=>array('index'),
	'Agregar',
));
?>

<h1>Agregar Rol</h1>

<?php 
$this->beginWidget('bootstrap.widgets.BsPanel');

echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
    ), 
    array('style' => 'min-width:250px; display:inline-flex; vertical-align: top; float:right; margin-left: 10px')
);

echo $this->renderPartial('_form', array('model'=>$model));

$this->endWidget();
?>