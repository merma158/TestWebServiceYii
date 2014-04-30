<?php
/* @var $this UserController */
/* @var $model User */

echo BsHtml::breadcrumbs(array(
    'Usuarios'=>array('index'),
	'Agregar',
));
?>

<h1>Agregar Usuario</h1>

<?php 
$this->beginWidget('bootstrap.widgets.BsPanel');

echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label' => 'Listar Usuarios', 'url'=>array('index')),
        array('label'=>'Administrar Usuarios', 'url'=>array('admin'))
    ), 
    array('style' => 'min-width:250px; display:inline-flex; vertical-align: top; float:right; margin-left: 10px')
);

echo $this->renderPartial('_form', array('model'=>$model)); 

$this->endWidget();
?>