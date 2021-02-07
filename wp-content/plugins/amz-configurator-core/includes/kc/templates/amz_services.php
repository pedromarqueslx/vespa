<?php

// var_dump( $atts );

//Kingconfigurator wrapper class for each element
$wrap_class	= apply_filters( 'kc-el-class', $atts );
//custom class element
$wrap_class[] = 'amz-service';

?>
<div class="<?php echo implode(' ', $wrap_class);?>">
	<div class="icon">
		<i class="<?php echo $atts['icon'];?>"></i>
	</div>
	<div class="title">
		<?php echo $atts['title'];?>
	</div>
	<div class="description">
		<?php echo $atts['description'];?>
	</div>
	
</div>
