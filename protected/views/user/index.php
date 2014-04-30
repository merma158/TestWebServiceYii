<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

echo BsHtml::breadcrumbs(array(
    'Usuarios'
));

?>

<h1>Usuarios</h1>
<?php 

$this->beginWidget('bootstrap.widgets.BsPanel');
echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label' => 'Agregar Usuario','url' => array('create')),
        array('label' => 'Administrar Usuarios','url' => array('admin'))
    ), 
    array('style' => 'min-width:250px; display:inline-block; vertical-align: top; float:right; margin-left: 10px')
);
$this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
            //'itemsCssClass'=>'mermax'
));

$this->endWidget();
?>