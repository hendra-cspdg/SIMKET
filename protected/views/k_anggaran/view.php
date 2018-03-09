<?php
/* @var $this K_anggaranController */
/* @var $model KegiatanForAnggaran */

$this->breadcrumbs=array(
	'Kegiatan For Anggarans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KegiatanForAnggaran', 'url'=>array('index')),
	array('label'=>'Create KegiatanForAnggaran', 'url'=>array('create')),
	array('label'=>'Update KegiatanForAnggaran', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KegiatanForAnggaran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KegiatanForAnggaran', 'url'=>array('admin')),
);
?>

<h1>View KegiatanForAnggaran #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_induk',
		'tahun',
		'jenis',
		'keterangan',
		'created_by',
		'created_time',
		'updated_by',
		'updated_time',
	),
)); ?>
