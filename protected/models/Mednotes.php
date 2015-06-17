<?php

/**
 * This is the model class for table "{{mednotes}}".
 *
 * The followings are the available columns in table '{{mednotes}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $deps_id
 * @property integer $staff_id
 * @property string $meetdate
 * @property string $meettime
 * @property integer $office_num
 */
class Mednotes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mednotes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, deps_id, staff_id, office_num', 'numerical', 'integerOnly'=>true),
			array('meetdate, meettime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, deps_id, staff_id, meetdate, meettime, office_num', 'safe', 'on'=>'search'),
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
            'deps' => array(self::BELONGS_TO,'Deps','deps_id'),
            'user' => array(self::BELONGS_TO,'User','user_id'),
            'staff' => array(self::BELONGS_TO,'Staff','staff_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID мед.записи',
			'user_id' => 'Пациент',
			'deps_id' => 'Отделение',
			'staff_id' => 'Врач',
			'meetdate' => 'Дата записи',
			'meettime' => 'Время записи',
			'office_num' => 'Кабинет',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('deps_id',$this->deps_id);
		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('meetdate',$this->meetdate,true);
		$criteria->compare('meettime',$this->meettime,true);
		$criteria->compare('office_num',$this->office_num);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function beforeSave()
    {
        if($this->isNewRecord)
            
            if(!Yii::app()->user->isGuest)
            $this->user_id = Yii::app()->user->id;
            //$this->birthdate_id = Yii::app()->user->birthdate;
            //$this->birthdate_id = Yii::app()->DateFormatter->formatDateTime($birthdate,'birthdate',null);
            
            return parent::beforeSave();
    }
    
    public static function all($deps_id)
    {
        $criteria=new CDbCriteria;
		$criteria->compare('deps_id',$deps_id);        
        
        return new CActiveDataProvider('Mednotes', array(
			'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mednotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
