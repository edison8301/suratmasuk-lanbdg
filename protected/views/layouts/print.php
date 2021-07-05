
<div style="padding:20px">
	<?php echo $content; ?>
</div>


<?php Yii::app()->clientScript->registerScript('print','
		$(document).ready(function() {
			window.print();
		});

'); ?>
