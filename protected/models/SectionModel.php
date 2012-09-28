<?php

/**
 * This is the model class for table "sections".
 *
 * The followings are the available columns in table 'sections':
 * @property integer $id
 * @property integer $parent_id
 * @property string $short_description
 * @property string $full_description
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $price
 */
class SectionModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SectionModel the static model class
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
		return 'sections';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, short_description, full_description, meta_title, meta_keywords, meta_description, price', 'required'),
			array('parent_id, price', 'numerical', 'integerOnly'=>true),
			array('short_description, meta_title, meta_keywords, meta_description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, short_description, full_description, meta_title, meta_keywords, meta_description, price', 'safe', 'on'=>'search'),
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
            'section'=>array(self::BELONGS_TO, 'SectionModel', 'parent_id'),  
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'short_description' => 'Short Description',
			'full_description' => 'Full Description',
			'meta_title' => 'Meta Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('full_description',$this->full_description,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function searchChild()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
       /* $criteria->addCondition('id=:id');  */

        $criteria->compare('parent_id',$this->id);
       /*$criteria->compare('parent_id',$id);
        $criteria->compare('short_description',$this->short_description,true);
        $criteria->compare('full_description',$this->full_description,true);
        $criteria->compare('meta_title',$this->meta_title,true);
        $criteria->compare('meta_keywords',$this->meta_keywords,true);
        $criteria->compare('meta_description',$this->meta_description,true);
        $criteria->compare('price',$this->price);   */

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
     public function searchItems()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $model=new ItemModel;
        $model->unsetAttributes();
        $model->section_id = $this->id;
        return $model->search();
       
    }
}