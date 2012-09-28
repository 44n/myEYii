<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $meta_description
 * @property integer $short_description
 * @property integer $full_description
 * @property integer $meta_title
 * @property integer $meta_keywords
 * @property integer $title
 * @property integer $section_id
 */
class CategoryModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CategoryModel the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('meta_description, short_description, full_description, meta_title, meta_keywords, title, section_id', 'required'),
			array('section_id', 'numerical', 'integerOnly'=>true),
			array('meta_description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, meta_description, short_description, full_description, meta_title, meta_keywords, title, section_id', 'safe', 'on'=>'search'),
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
             'section'=>array(self::BELONGS_TO, 'SectionModel', 'section_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'meta_description' => 'Meta Description',
			'short_description' => 'Short Description',
			'full_description' => 'Full Description',
			'meta_title' => 'Meta Title',
			'meta_keywords' => 'Meta Keywords',
			'title' => 'Title',
			'section_id' => 'Section',
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
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('short_description',$this->short_description);
		$criteria->compare('full_description',$this->full_description);
		$criteria->compare('meta_title',$this->meta_title);
		$criteria->compare('meta_keywords',$this->meta_keywords);
		$criteria->compare('title',$this->title);
		$criteria->compare('section_id',$this->section_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}