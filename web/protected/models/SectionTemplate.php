<?php

/**
 * This is the model class for table "section_templates".
 *
 * The followings are the available columns in table 'section_templates':
 * @property integer $id
 * @property integer $section_id
 * @property integer $template_id
 *
 * The followings are the available model relations:
 * @property Templates $template
 * @property Sections $section
 */
class SectionTemplate extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
	return 'section_templates';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
	// NOTE: you should only define rules for those attributes that
	// will receive user inputs.
	return array(
	    array('section_id, template_id', 'required'),
	    array('section_id, template_id', 'numerical', 'integerOnly' => true),
	    // The following rule is used by search().
	    // @todo Please remove those attributes that should not be searched.
	    array('id, section_id, template_id', 'safe', 'on' => 'search'),
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

	return new CActiveDataProvider($this, array(
	    'criteria' => $criteria,
	    'pagination'=>false,
	));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SectionTemplate the static model class
     */
    public static function model($className = __CLASS__) {
	return parent::model($className);
    }

}
