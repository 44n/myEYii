<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $full_description
 * @property string $meta_title
 * @property string $meta_keywords
 * @property integer $category_id
 * @property double $price
 */
class ItemModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemModel the static model class
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
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, short_description, full_description, meta_title, meta_keywords, category_id, price', 'required'),
			array('category_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title,meta_description', 'length', 'max'=>100),
			array('short_description', 'length', 'max'=>200),
			array('full_description, meta_title, meta_keywords', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title,meta_description, short_description, full_description, meta_title, meta_keywords, category_id, price', 'safe', 'on'=>'search'),
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
             'category'=>array(self::BELONGS_TO, 'CategoryModel', 'category_id'),
        );
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
			'title' => 'Title',
            'meta_description' => 'Meta Description',
			'short_description' => 'Short Description',
			'full_description' => 'Full Description',
			'meta_title' => 'Meta Title',
			'meta_keywords' => 'Meta Keywords',
			'category_id' => 'Category',
			'price' => 'Price',
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
		$criteria->compare('title',$this->title,true);
        $criteria->compare('meta_description',$this->meta_description,true);    
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('full_description',$this->full_description,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}