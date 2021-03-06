<?php
/* @var $this MessageController */
/* @var $model BbiiMessage */
/* @var $count Array */

$this->bbii_breadcrumbs=array(
	Yii::t('BbiiModule.bbii', 'Forum')=>array('forum/index'),
	Yii::t('BbiiModule.bbii', 'Inbox'),
);

$item = array(
	array('label'=>Yii::t('BbiiModule.bbii', 'Inbox') .' ('. $count['inbox'] .')', 'url'=>array('message/inbox')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Outbox') .' ('. $count['outbox'] .')', 'url'=>array('message/outbox')),
	array('label'=>Yii::t('BbiiModule.bbii', 'New message'), 'url'=>array('message/create'))
);
?>
<div id="bbii-wrapper">
	<?php echo $this->renderPartial('_header', array('item'=>$item)); ?>
	
	<div class="progress"><div class="progressbar" style="width:<?php echo ($count['inbox'] < 100)?$count['inbox']:100; ?>%"> </div></div>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'inbox-grid',
		'dataProvider'=>$model->search(),
		'rowCssClassExpression'=>'($data->read_indicator)?"":"unread"',
		'columns'=>array(
			array(
				'name'=>'sendfrom',
				'value'=>'$data->sender->member_name'
			),
            array(
                'name' => 'subject',
                'type'  => 'raw',
                'value'=> 'CHtml::tag("a",array("href"=>$data->id,"class" => "view"),$data->subject)',
            ),
			array(
				'name' => 'create_time',
				'value' => 'DateTimeCalculation::long($data->create_time)',
			),
			array(
				'name' => 'type',
				'value' => '($data->type)?Yii::t("bbii", "notification"):Yii::t("bbii", "message")',
			),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{view}{reply}{delete}',
				'buttons' => array(
					'view' => array(
						'url'=>'$data->id',
						'imageUrl'=>$this->module->getRegisteredImage('view.png'),
						'click'=>'js:function() { viewMessage($(this).attr("href"), "' . $this->createAbsoluteUrl('message/view') .'");return false; }',
					),
					'reply' => array(
						'url'=>'array("reply", "id"=>$data->id)',
						'label'=>Yii::t('BbiiModule.bbii','Reply'),
						'imageUrl'=>$this->module->getRegisteredImage('reply.png'),
						'options'=>array('style'=>'margin-left:5px;'),
					),
					'delete' => array(
						'imageUrl'=>$this->module->getRegisteredImage('delete.png'),
						'options'=>array('style'=>'margin-left:5px;'),
					),
				)
			),
		),
	)); ?>
	
	<div id="bbii-message"></div>

</div>