<div class="row">

    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Peringkat Kabupaten/Kota hingga saat ini</h3>
            </div>


            <div class="box-body">
                <div class="pad margin no-print">
                
                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i> Note:</h4>
                        <ul>
                            <li>Point maksimal = 5</li>
                        </ul>
                    </div>
                    <br/>

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'kegiatan-form',
                        'enableAjaxValidation'=>false,
                    )); ?>

                        <div class="center">
                            <?php echo CHtml::dropDownList('bidang',$bidang,HelpMe::getBidangBosList()); ?>
                            <?php echo CHtml::dropDownList('tahun',$tahun,HelpMe::getYearForFilter()); ?>
                            <?php echo CHtml::submitButton('Tampilkan',array('class'=>'btn btn-success btn-xs btn-flat')); ?>
                        </div>

                    <?php $this->endWidget(); ?>
                </div>

                <table class="table table-hover table-striped table-bordered table-condensed">
                    <tr>
                        <th>No. </th>
                        <th>Kabupaten/Kota</th>
                        <th>Jumlah Kegiatan</th>
                        <th>Jumlah Target</th>
                        <th>Point</th>
                    </tr>
                    <?php foreach ($data as $key => $value) { ?>
                        <?php
                                echo '<tr>';

                                echo '<td>'.($key+1).'</td>';
                                echo '<td>'.CHtml::link($value['name'],array('report/kabupaten','id'=>$value['unitkerja'])).'</td>';
                                echo '<td>'.$value['jumlah_kegiatan'].'</td>';
                                echo '<td>'.$value['jumlah_target'].' </td>';
                                echo '<td>'.$value['point'].' </td>';
                                echo '</tr>';
                        ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>