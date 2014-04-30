<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

echo BsHtml::breadcrumbs(array(
    'Usuarios'=>array('index'),
	'Imagen',
));
?>
<h1>Subir Imagen</h1>
<div class="form">
<?php
    $this->beginWidget('bootstrap.widgets.BsPanel');
        $form=$this->beginWidget('CActiveForm', array(
                'id'=>'user-form',
                'enableAjaxValidation'=>false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),));
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
                                                'userdata'=>"_imgTest",
                                            )); //array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken)
                                ?>
                 </div>
                    
<?php    
        $this->endWidget(); 
    $this->endWidget();
?>
</div><!-- form -->