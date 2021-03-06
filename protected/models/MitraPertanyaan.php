<?php

/**
 * This is the model class for table "mitra_pertanyaan".
 *
 * The followings are the available columns in table 'mitra_pertanyaan':
 * @property integer $id
 * @property string $pertanyaan
 * @property string $description
 * @property integer $teruntuk
 * @property string $created_time
 * @property integer $created_by
 * @property string $updated_time
 * @property integer $updated_by
 */
class MitraPertanyaan extends HelpAr
{
	public $option1, $option2, $option3, $option4;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mitra_pertanyaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pertanyaan, teruntuk, created_time, created_by, updated_time, updated_by, option1, option2, option3, option4', 'required'),
			array('teruntuk, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pertanyaan, description, teruntuk, created_time, created_by, updated_time, updated_by', 'safe', 'on'=>'search'),
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

	public function getOptions(){
		$options = array();
		
		for($i=1;$i<=4;++$i){
			$option = MitraOption::model()->findByAttributes(
				array(
					'id_pertanyaan'=>$this->id, 
					'skala'=>$i
				)
			);

			if($option!=null){
				$options[] = array('skala'=>$i, 'label'=>$option->description);
			}
			else{
				$options[] = array('skala'=>$i, 'label'=>'');
			}
		}

		return $options;
	}

	public function getFullContent(){
		$str_result = "";
		$str_result.= $this->pertanyaan;
		$str_result.="<br/> <b>Pilihan jawaban:</b>";
		$str_result.= "<ul>";
		for($i=1;$i<=4;++$i){
			$option = MitraOption::model()->findByAttributes(
				array(
					'id_pertanyaan'=>$this->id, 
					'skala'=>$i)
			);

			if($option!=null){
				$str_result.= "<li>".$i." => ".$option->description."</li>";
			}
			else{
				$str_result.= "<li>".$i." => -</li>";
			}
		}

		$str_result.= "</ul>";

		return $str_result;
	}

	public function getPeruntukanLabel(){
		if($this->teruntuk==1) return 'PML';
		else if($this->teruntuk==2) return 'PCL';
		else return 'PCL dan PML';
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pertanyaan' => 'Pertanyaan',
			'description' => 'Deskripsi',
			'teruntuk' => 'Peruntukan Pertanyaan',
			'created_time' => 'Created Time',
			'created_by' => 'Created By',
			'updated_time' => 'Updated Time',
			'updated_by' => 'Updated By',
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
		$criteria->compare('pertanyaan',$this->pertanyaan,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('teruntuk',$this->teruntuk);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_time',$this->updated_time,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MitraPertanyaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
