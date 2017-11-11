<?php
/* @var $this JadwalTugasController */
/* @var $model JadwalTugas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-tugas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nama_kegiatan'); ?>
		<?php echo $form->textArea($model,'nama_kegiatan',array('form-groups'=>6, 'cols'=>50, 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'nama_kegiatan'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pegawai_id'); ?>
		<?php echo $form->dropDownList($model,'pegawai_id',
				CHtml::listData(Pegawai::model()->findAll(),'nip','nama'),
				array('empty'=>'- Pilih Pegawai-', 'class'=>"form-control")); ?>
		

		<?php echo $form->error($model,'pegawai_id'); ?>
	</div>


	<table class="table table-hover table-striped table-bordered">
		<tr>
			<th><?php echo $form->labelEx($model,'tanggal_mulai'); ?></td>
			<th><?php echo $form->labelEx($model,'tanggal_berakhir'); ?></td>
		</tr>
		
		<tr>
			<td>
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', 
					array(
						'model'=>$model,
						'attribute'=>'tanggal_mulai',
						'options' => array(
							'dateFormat'=>'yy-mm-dd',
							'changeYear'=>true,
							'changeMonth'=>true
						)
					)
				);
			?>
			</td>

			<td>

			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', 
					array(
						'model'=>$model,
						'attribute'=>'tanggal_berakhir',
						'options' => array(
							'dateFormat'=>'yy-mm-dd',
							'changeYear'=>true,
							'changeMonth'=>true
						)
					)
				);
			?>
			</td>
		</tr>
	</table>

	<div class="form-group">
		<?php echo $form->labelEx($model,'penjelasan'); ?>
		<?php echo $form->textArea($model,'penjelasan',array('form-groups'=>6, 'cols'=>50, 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'penjelasan'); ?>
	</div>

	<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>"btn btn-info pull-right")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->