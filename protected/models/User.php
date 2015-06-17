<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $created
 * @property integer $ban
 * @property integer $role
 * @property string $email
 */
class User extends CActiveRecord
{
    private $fullName;
    
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';
	public $verifyCode;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
     
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, name, fname, lastname, birthdate', 'required'),
            array('username', 'unique', 'allowEmpty'=>false, 'attributeName'=>'username', 'className'=>'User'),
            array('email', 'unique', 'allowEmpty'=>false, 'attributeName'=>'email', 'className'=>'User'),
            array('email','email'),
            array('username','match','pattern'=>'/^([A-Za-z0-9 ]+)$/u','message'=>'Допустимые символы A-Za-z0-9 .'),
            array('name, fname, lastname','match','pattern'=>'/^([а-яА-ЯёЁa-zA-Z0-9]+)$/u','message'=>'Допустимые символы а-яА-ЯёЁa-zA-Z0-9 .'),
			array('created, ban, role', 'numerical', 'integerOnly'=>true),
			array('username, password, email, name, fname, lastname', 'length', 'max'=>255),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'),
			array('id, username, password, created, ban, role, email, name, fname, lastname, birthdate', 'safe', 'on'=>'search'),
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
			'id' => 'Уникальный ID',
			'username' => 'Логин',
            'name' => 'Имя',
            'fname' => 'Отчество',
            'lastname' => 'Фамилия',
            'birthdate' => 'Дата рождения',
			'password' => 'Пароль',
			'created' => 'Зарегистрирован',
			'ban' => 'Бан',
			'role' => 'Роль',
			'email' => 'E-mail',
            'verifyCode' => 'Код с картинки',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('fname',$this->fname,true);
        $criteria->compare('lastname',$this->lastname,true);
        $criteria->compare('birthdate',$this->birthdate);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('ban',$this->ban);
		$criteria->compare('role',$this->role);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function beforeSave()
    {
        if($this->isNewRecord){
            $this->created = time();
            $this->role = 1;
        }
        
        $this->password = md5('sdfsfd$3{].'.$this->password); 
        return parent::beforeSave();
        
    }
    
    public function getFullName()
        {
            return $this->name.' '.$this->fname.' '.$this->lastname;
        }
    
     public static function all()
    {
        return Chtml::listData(self::model()->findAll(),'id','username');
        //return Chtml::listData(self::model()->findAll(),'id','birthdate');
    }
    

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
