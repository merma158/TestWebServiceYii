<?php
/* @var $this UserController */
/* @var $model User */

echo BsHtml::breadcrumbs(array(
    'Usuarios'=>array('index'),
	$model->id,
));

$model->getDetalleUser();
?>

<h1>Detalle Usuario <?php //echo $model->id; ?></h1>

<?php 

$this->beginWidget('bootstrap.widgets.BsPanel');

echo BsHtml::stackedPills(array(
        array('label' => 'Operaciones','url' => '#','active' => true),
        array('label' => 'Listar Usuarios', 'url'=>array('index')),
        array('label' => 'Agregar Usuario','url' => array('create')),
        array('label'=>'Modificar Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label' => 'Administrar Usuarios','url' => array('admin'))
    ), 
    array('style' => 'min-width:250px; display:inline-flex; vertical-align: top; float:right; margin-left: 10px')
);
?>
<img alt="" src="<?php  echo $model->getUrlImg(); ?>"/>
<?php
    $sw = false;
    $exten = array('.jpeg','.jpg','.gif','.png','.bmp');
    $ext = "";
    $dir = "./assets/imgProfile/_id{$model->id}_".date("Y-m-d");
    
    foreach ($exten as $key => $value) {
       if (file_exists($dir.$value)){ $ext = $value; $sw = true; break; }
   }
    
    if ($sw){
?>
<img alt="" src="<?php  echo $dir.$ext; ?>" width="100px" height="100px"/>
<?php } ?> 
<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'firstname',
		'lastname',
		'email',
		'phone1',
		'lang',
		'country',
		'city',
		'address',
		'institution',
		'url',
	),
));
?>
<div class="row">
                        <?php
                                        $this->widget('ext.coco.CocoWidget'
                                            ,array(
                                                'id'=>'cocowidget1',
                                                //'onCompleted'=>'function(id,filename,jsoninfo){ document.getElementById("DigBook_img").value = jsoninfo["fullpath"]; }',
                                                'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
                                                'onMessage'=>'function(m){ alert(m); }',
                                                'allowedExtensions'=>array('jpeg','jpg','gif','png','bmp'), //,'doc','docx','xls','ppt','pdf','zip','rar'
                                                'sizeLimit'=>2000000,
                                                'uploadDir' => 'assets/imgProfile',
                                                'dropFilesText' => 'Borrar Archivos Aquí',
                                                'buttonText' => 'Buscar & Subir',
                                                // para recibir el archivo subido:
                                                'receptorClassName'=>'application.models.User',
                                                'methodName'=>'onFileUploaded',                                
                                                'userdata'=>"_id{$model->id}_".date("Y-m-d"),
                                            )); //array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken)
                                ?>
</div>
<h2>Descripci&oacute;n</h2>
<?php 
echo $model->getDescripcion();
$this->endWidget(); 
?>
