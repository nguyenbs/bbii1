<?php
/* @var $this ForumController */
/* @var $forum BbiiForum */
/* @var $topic BbiiTopic */
/* @var $post BbiiPost */

$this->bbii_breadcrumbs=array(
	Yii::t('BbiiModule.bbii', 'Forum')=>array('/forum/forum/index'),
	$forum->name => array('/forum/forum/forum', 'id'=>$forum->id),
	$topic->title => array('/forum/forum/topic', 'id'=>$topic->id),
	Yii::t('BbiiModule.bbii', 'Change'),
);

$item = array(
	array('label'=>Yii::t('BbiiModule.bbii', 'Forum'), 'url'=>array('/forum/forum/index')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Members'), 'url'=>array('/forum/member/index'))
);
?>
<div id="bbii-wrapper">
	<?php echo $this->renderPartial('_header', array('item'=>$item)); ?>
	
	<?php echo $this->renderPartial('_form', array('post'=>$post)); ?>
</div>