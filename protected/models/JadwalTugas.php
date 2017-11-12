<?php

/**
 * This is the model class for table "jadwal_tugas".
 *
 * The followings are the available columns in table 'jadwal_tugas':
 * @property integer $id
 * @property string $nama_kegiatan
 * @property string $tanggal_mulai
 * @property string $tanggal_berakhir
 * @property string $pegawai_id
 * @property string $penjelasan
 * @property string $created_time
 * @property string $updated_time
 * @property integer $created_by
 * @property integer $updated_by
 */
class JadwalTugas extends HelpAR
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jadwal_tugas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_kegiatan, tanggal_mulai, tanggal_berakhir, pegawai_id, penjelasan, created_time, updated_time, created_by, updated_by', 'required'),
			array('created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('pegawai_id', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nama_kegiatan, tanggal_mulai, tanggal_berakhir, pegawai_id, penjelasan, created_time, updated_time, created_by, updated_by', 'safe', 'on'=>'search'),
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
			'pegawai' => array(self::BELONGS_TO, 'Pegawai', 'pegawai_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_kegiatan' => 'Nama Kegiatan',
			'tanggal_mulai' => 'Tanggal Mulai',
			'tanggal_berakhir' => 'Tanggal Berakhir',
			'pegawai_id' => 'Pegawai',
			'penjelasan' => 'Penjelasan',
			'created_time' => 'Created Time',
			'updated_time' => 'Updated Time',
			'created_by' => 'Created By',
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
		$criteria->compare('nama_kegiatan',$this->nama_kegiatan,true);
		$criteria->compare('tanggal_mulai',$this->tanggal_mulai,true);
		$criteria->compare('tanggal_berakhir',$this->tanggal_berakhir,true);
		$criteria->compare('pegawai_id',$this->pegawai_id,true);
		$criteria->compare('penjelasan',$this->penjelasan,true);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('updated_time',$this->updated_time,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchByPegawai($id){
		$curr_year=date('Y');

		$sql="SELECT * FROM jadwal_tugas WHERE pegawai_id='".$id."' 
			AND (YEAR(tanggal_mulai)='".$curr_year."' OR YEAR(tanggal_berakhir)='".$curr_year."') LIMIT 365;";

		$dataProvider=new CSqlDataProvider($sql);

		return $dataProvider->getData();
	}

	public function isAvailable($id, $tstart, $tend){
		$sql="SELECT count(*) FROM jadwal_tugas WHERE pegawai_id='".$id."' 
			AND (('".$tstart."' BETWEEN tanggal_mulai AND tanggal_berakhir) OR 
			('".$tend."' BETWEEN tanggal_mulai AND tanggal_berakhir) OR 
			(tanggal_mulai>'".$tstart."' AND tanggal_berakhir<'".$tend."'))";

		$connection = Yii::app()->db;

		$command = $connection->createCommand($sql);
		return $command->queryScalar();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JadwalTugas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
