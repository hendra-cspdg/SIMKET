<?php $baseUrl = Yii::app()->theme->baseUrl; ?>
<style>
    @import url('<?php echo $baseUrl.'/dist/css/step.css';?>');
</style>
  
<br/>
<div id="step_tag">
	<div class="stepwizard">
		<div class="stepwizard-row setup-panel">
			<div class="stepwizard-step">
				<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
				<p>Data Kegiatan</p>
			</div>

			<div class="stepwizard-step">
				<?php if($model->isNewRecord){ ?>
					<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
				<?php }else{ 
						echo CHtml::link("2", array('form', 'id'=>$model->id), array('class'=>'btn btn-default btn-circle'));
					}
				?>
				<p>Kelola Pertanyaan</p>
			</div>
			<div class="stepwizard-step">
				<?php if($model->isNewRecord){ ?>
					<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
				<?php }else{ 
						echo CHtml::link("3", array('mitra', 'id'=>$model->id), array('class'=>'btn btn-default btn-circle'));
					}
				?>
				<p>Petugas Lapangan</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
				<p>Skoring Petugas</p>
			</div>

			<div class="stepwizard-step">
				<?php if($model->isNewRecord){ ?>
					<a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
				<?php }else{ 
						echo CHtml::link("5", array("resume", 'id'=>$model->id), array('class'=>'btn btn-default btn-circle'));
					}
				?>
				<p>Resume Kegiatan</p>
			</div>
		</div>
	</div>

	<hr/>

	<div class="row setup-content" id="step-1">
		<div class="col-xs-12">
			<div class="col-md-12">
				<div class="form">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'kegiatan-form',
						'enableAjaxValidation'=>false,
					)); ?>

						<p class="note text-center">Fields with <span class="required">*</span> are required.</p>

						<?php echo $form->errorSummary($model); ?>
<!-- 
						<div class="form-group">
							<?php echo $form->labelEx($model,'induk_id'); ?>
							<?php 
								echo $form->dropDownList($model,'induk_id',
										CHtml::listData(IndukKegiatan::model()->findAll(), 'id', 'name'),
										array('empty'=>'- Pilih Induk Kegiatan-', 'class'=>"form-control")); 
							?>
							<?php echo $form->error($model,'induk_id'); ?>
						</div> -->

						<div class="form-group">
							<?php echo $form->labelEx($model,'nama'); ?>
							<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>255, 'class'=>"form-control")); ?>
							<?php echo $form->error($model,'nama'); ?>
						</div>
<!-- 
						<div class="form-group">
							<?php echo $form->labelEx($model,'simket_id'); ?>
							<?php 
								echo $form->dropDownList($model,'simket_id',
										CHtml::listData(Kegiatan::model()->findAll(), 'id', 'kegiatan'),
										array('empty'=>'- Pilih Induk Kegiatan-', 'class'=>"form-control")); 
							?>
							<?php echo $form->error($model,'simket_id'); ?>
						</div>
						-->

						<?php if(Yii::app()->user->getLevel()==1 && $model->isNewRecord){ ?>
						<div class="form-group">
							<?php echo $form->labelEx($model,'kab_id'); ?>
							<?php 
								echo $form->dropDownList($model,'kab_id',
						CHtml::listData(HelpMe::getListKabupaten(), 'id', 'label'),
										array('empty'=>'- Pilih Kabupaten/Kota-', 'class'=>"form-control")); 
							?>
							<?php echo $form->error($model,'kab_id'); ?>
						</div> 
						<?php } ?>


						<?php if(!$model->isNewRecord){ 
							$options_arr = 	array('empty'=>'- Pilih Kabupaten/Kota-', 'class'=>"form-control");
							if(Yii::app()->user->getLevel()==2)
								$options_arr = array('empty'=>'- Pilih Kabupaten/Kota-', 'class'=>"form-control", 'disabled'=>'disabled');

						?>
							<div class="form-group">
								<?php echo $form->labelEx($model,'kab_id'); ?>
								<?php 
									echo $form->dropDownList($model,'kab_id',
							CHtml::listData(HelpMe::getListKabupaten(), 'id', 'label'), $options_arr); 
								?>
								<?php echo $form->error($model,'kab_id'); ?>
							</div> 
						<?php } ?>

						<?php if($model->isNewRecord){ ?>
						<div class="box-footer">
							<?php echo CHtml::submitButton('Simpan', array('class'=>'btn btn-primary nextBtn btn-lg pull-right')); ?>
						</div>
						<?php }else{
							if(HelpMe::isAuthorizeUnitKerja($model->kab_id)){ ?>

							<div class="box-footer">
								<?php echo CHtml::submitButton('Simpan', array('class'=>'btn btn-primary nextBtn btn-lg pull-right')); ?>
							</div>
						<?php }} ?>

					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>

  
<!-- <script src="<?php echo $baseUrl;?>/dist/js/step.js"></script> -->