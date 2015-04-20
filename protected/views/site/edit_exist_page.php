<div id="preview_page">
    <?php echo $code;?>
</div>

<div class="select_template button_block">
    <div class="back_step" onclick="window.history.back()">
	<span>BACK</span>
    </div>
    <div class="save_reorder" onclick="builder_cee.saveTemplate(<?php echo $step;?>,<?php echo $display;?>);return false;">
	<span>SAVE</span>
    </div>
    <div class="next_step" onclick="builder_cee.saveTemplate(<?php echo $step;?>,<?php echo $display;?>);return false;">
	<span>NEXT</span>
    </div>
</div>

<script type="text/javascript">
    jQuery(function(){
	$('#page .border-right.admin_site').css({'marginTop':0});
	$('.close_step').hide();    
    });
    jQuery(document).ready(function (){
	builder_cee.buildComponentEdit();
    });
</script>
