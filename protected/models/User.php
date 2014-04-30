<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone1
 * @property string $lang
 * @property string $country
 * @property string $city
 * @property string $address
 * @property string $institution
 * @property string $url
 */
class User extends CActiveRecord
{
                private $urlimg;
                private $descripcion;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('username, firstname, lastname, email, phone1', 'length', 'max'=>100),
			array('lang', 'length', 'max'=>30),
			array('country', 'length', 'max'=>2),
			array('city', 'length', 'max'=>120),
			array('address, institution, url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, firstname, lastname, email, phone1, lang, country, city, address, institution, url', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
			'phone1' => 'Phone1',
			'lang' => 'Lang',
			'country' => 'Country',
			'city' => 'City',
			'address' => 'Address',
			'institution' => 'Institution',
			'url' => 'Url',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
                 
                 public function onFileUploaded($fullFileName,$userdata) {
                    // userdata es el mismo valor que pusiste en config/main
                    // fullFileName es la ruta del archivo listo para leer.            
                        //echo '{"success":true,"filename":"paisaje","size":248211,"ext":"jpg","path":"assets/","fullpath":"assets/Test/_001/paisaje.jpg"}';            
                        return true;
                 }
                 
                 public function getDetalleUser(){
                     $utils = new Utils();
                     $utils->setParamByF(array("funcion"=>"get_user_bfd","username"=>$this->username));
                     $rs = $utils->funcionCall("get_user_bfd");
                     $this->urlimg    =  $rs[0]['profileimageurl'];
                     $this->descripcion  = $rs[0]['description'];
                 }
                 
                 public function getUrlImg(){
                     return $this->urlimg;
                 }
                 
                 public function getDescripcion(){
                     return $this->descripcion;
                 }
}