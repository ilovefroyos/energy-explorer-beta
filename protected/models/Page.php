<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property integer $section_id
 * @property integer $template_id
 * @property integer $position
 * @property string $name
 * @property string $html
 * @property integer $publish
 *
 * The followings are the available model relations:
 * @property Templates $template
 * @property Sections $section
 */
class Page extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
	return 'pages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
	// NOTE: you should only define rules for those attributes that
	// will receive user inputs.
	return array(
	    array('template_id, section_id, position, name, html', 'required'),
	    array('section_id, template_id, position, publish', 'numerical', 'integerOnly' => true),
	    array('name', 'length', 'max' => 128),
	    //array('publish', 'range', 'in' => array(1,0)),
	    //array('html', 'safe'),
	    // The following rule is used by search().
	    // @todo Please remove those attributes that should not be searched.
	    array('id, section_id, template_id, position, name, html, publish', 'safe', 'on' => 'search'),
	);
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
	// NOTE: you may need to adjust the relation name and the related
	// class name for the relations automatically generated below.
	return array(
	    'template' => array(self::BELONGS_TO, 'Template', 'template_id'),
	    'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
	);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
	return array(
	    'id' => 'ID',
	    'section_id' => 'Section',
	    'template_id' => 'Template',
	    'position' => 'Position',
	    'name' => 'Name',
	    'html' => 'Html',
	    'publish' => 'Publish',
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
    public function search() {
	// @todo Please modify the following code to remove attributes that should not be searched.

	$criteria = new CDbCriteria;

	$criteria->compare('id', $this->id);
	$criteria->compare('section_id', $this->section_id);
	$criteria->compare('template_id', $this->template_id);
	$criteria->compare('position', $this->position);
	$criteria->compare('name', $this->name, true);
	$criteria->compare('html', $this->html, true);
	$criteria->compare('publish', $this->publish);
	$criteria->order = 'position ASC';
	$criteria->condition = '`display`=1';
	return new CActiveDataProvider($this, array(
	    'criteria' => $criteria,
	    'pagination'=>false,
	));
    }
    
    public function searchAll() {
	// @todo Please modify the following code to remove attributes that should not be searched.

	$criteria = new CDbCriteria;

	$criteria->compare('id', $this->id);
	$criteria->compare('section_id', $this->section_id);
	$criteria->compare('template_id', $this->template_id);
	$criteria->compare('position', $this->position);
	$criteria->compare('name', $this->name, true);
	$criteria->compare('html', $this->html, true);
	$criteria->compare('publish', $this->publish);
	$criteria->order = 'position ASC';
	$criteria->condition = '`display`!=2';
	return new CActiveDataProvider($this, array(
	    'criteria' => $criteria,
	));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__) {
	return parent::model($className);
    }
    
    public function setReorder($data) {		
	foreach($data as $key=>$itm){	    
	    Yii::app()->db->createCommand("UPDATE `pages` SET `position`=".(int)$key." WHERE id=".(int)$itm)->query();
	    Yii::app()->db->createCommand("UPDATE `pages` SET `display`=1 WHERE id=".(int)$itm)->query();
	}
    }
    
    public function unpublishDeletePage($type,$id) {
	switch($type){
	    case 'unpblish':
		Yii::app()->db->createCommand("UPDATE `pages` SET `publish`=0 WHERE id=".(int)$id)->query();
	    break;
	    case 'delete':
		Yii::app()->db->createCommand("DELETE FROM `pages` WHERE id=".(int)$id)->query();
	    break;
	}
	
    }
    
    public function addNewPage($code,$section_id,$template_id) {
	$code = stripslashes($code);
	Yii::app()->db->createCommand()->insert('pages',array('html'=>$code,'section_id'=>(int)$section_id,'template_id'=>$template_id,'name'=>'Template_Name'));
	return Yii::app()->db->getLastInsertID();
    }
    
    public function updatePage($code,$id) {
	Yii::app()->db->createCommand()->update('pages',array('html'=>$code,'publish'=>1),'id=:id',array(':id'=>$id));
    }

}
