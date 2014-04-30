<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WsuserController
 *
 * @author JUrbano
 */
class WsuserController extends CController{
    //put your code here
    public function actions() { 
        return array('ws'=>array('class'=>'CWebServiceAction'));
    }
    
    /**
     * @param mixed Listado Usuario
     * @return mixed Resultado de Operación
     * @soap 
     */ 
    public function setIntouser($p){
        header('Content-type: application/json');
        $objectArray = json_decode($p);
        $rs = FALSE;
        
        $transaction= Yii::app()->db->beginTransaction();
        try{
            foreach ($objectArray as $key => $value) {
                if (!$this->isUser(array("user"=>$value->username,"email"=>$value->email))){
                    /* :::::::::::::::::::::::::::::::::: INSERT USER ::::::::::::::::::::::::::::::::::::::::::::: */
                    $sqlUser = "INSERT INTO tbl_user (username,firstname,lastname,email,phone1,lang,country,city,address,institution,url)
                                    VALUES ('$value->username','$value->firstname','$value->lastname','$value->email','$value->phone1',
                                            '$value->lang','$value->country','$value->city','$value->address','$value->institution','$value->url')";
                    /* :::::::::::::::::::::::::::::::::: INSERT ROLE ::::::::::::::::::::::::::::::::::::::::::::: */
                    $sqlRole = "INSERT INTO tbl_role (name,archetype) VALUES ('$value->name','$value->archetype')";
                    /* :::::::::::::::::::::::::::::::: EJECUTANDO SENTENCIAS SQL ::::::::::::::::::::::::::::::::: */
                    Yii::app()->db->createCommand($sqlUser)->execute();
                    if (!$this->isRol($value->archetype))
                        Yii::app()->db->createCommand($sqlRole)->execute();
                }
            }
            //.... other SQL executions
            $transaction->commit();
            $rs = TRUE;
        }catch(Exception $e){ // se arroja una excepción si una consulta falla
            $transaction->rollBack();
        }
        return json_encode(array("resultset"=> $rs),JSON_FORCE_OBJECT);
    }
    /**
     * Verifica si existe el usuario dado nickname - email
     * @param mixed $p
     * @return boolean
     */
    public function isUser($p){
        $dataProvider = new CActiveDataProvider('User',array('criteria'=>array('condition'=>"upper(username) like '%". strtoupper($p['user'])."%' or
                                                                                             upper(email)    like '%". strtoupper($p['email'])."%'")));
        return $dataProvider->getTotalItemCount() > 0 ? TRUE : FALSE;
    }
    /**
     * Verifica si existe el rol dado archetype
     * @param string $p
     * @return boolean
     */
    public function isRol($p){
        $dataProvider = new CActiveDataProvider('Role',array('criteria'=>array('condition'=>"upper(archetype) like '%". strtoupper($p)."%'")));
        return $dataProvider->getTotalItemCount() > 0 ? TRUE : FALSE;
    }
}

?>