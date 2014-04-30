<?php
/* @var $this RoleController */
/* @var $dataProvider CActiveDataProvider */

echo BsHtml::breadcrumbs(array(
    'Roles'
));
?>

<h1>Roles</h1>

<?php 
$this->beginWidget('bootstrap.widgets.BsPanel');

echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label'=>'Agregar Rol', 'url'=>array('create')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
    ), 
    array('style' => 'min-width:250px; display:inline-block; vertical-align: top; float:right; margin-left: 10px')
);

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
$this->endWidget();
?>
