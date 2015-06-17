<?php

/**
 * This is the model class for table "{{staff}}".
 *
 * The followings are the available columns in table '{{staff}}':
 * @property integer $id
 * @property string $firstname
 * @property string $fathername
 * @property string $lastname
 * @property string $birthday
 * @property string $jobtitle
 * @property string $expe
 * @property integer $deps_id
 * @property string $email
 */
class Staff extends CActiveRecord
{
    private $fullName;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{staff}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('firstname, fathername, lastname, birthday, jobtitle, expe, deps_id, email', 'required'),
			array('deps_id', 'numerical', 'integerOnly'=>true),
			array('firstname, fathername, lastname, jobtitle, expe, email', 'length', 'max'=>255),
			array('birthday', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, firstname, fathername, lastname, birthday, jobtitle, expe, deps_id, email', 'safe', 'on'=>'search'),
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
            'deps' => array(self::BELONGS_TO, 'Deps','deps_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'firstname' => 'Имя',
			'fathername' => 'Отчество',
			'lastname' => 'Фамилия',
			'birthday' => 'Дата рождения',
			'jobtitle' => 'Должность',
			'expe' => 'Стаж работы (лет)',
			'deps_id' => 'Отделение',
			'email' => 'Контакт',
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
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('fathername',$this->fathername,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('jobtitle',$this->jobtitle,true);
		$criteria->compare('expe',$this->expe,true);
		$criteria->compare('deps_id',$this->deps_id);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
        public function getFullName()
    {
        return $this->firstname.' '.$this->fathername.' '.$this->lastname;
    }
    
        public static function all()
    {
        return Chtml::listData(self::model()->findAll(),'id','lastname');
    }
    
    //public static function all()
//    {
//        $Staff = Staff::model()->findAll();
//        $list = CHtml::listData($Staff, 'id','firstname','fathername');
//        //return Chtml::listData(self::model()->findAll(),'id','firstname,fathername,lastname');
//    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Staff the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
