<div class="container-fluid select_template ">
    <div class="row-fluid">
	<div class="span12 title"><?php echo $title?></div>	
    </div>    
    <div class="other_bg">
	<div class="back_step position_absolute" onclick="window.history.back()">
	    <span>BACK</span>
	</div>
	<span class="black_reorder_text">Homepage : Case Studies in Metro Vancovuer</span>
	<div class="row-fluid row_list">	
	    <div class="arrow"></div>
	    <?php foreach ($pages as $key=>$itm): ?>
	    <div class="edit_page_name presave">
		ADD HERE
	    </div>		
	    <div class="arrow"></div>
		<span class="black_reorder_text paged<?php echo $itm->id;?>"><?php echo $itm->name?></span>
	    <div class="arrow"></div>
	    <?php endforeach;?>
	    <div class="edit_page_name presave">
		ADD HERE
	    </div>
	    <div class="arrow"></div>
	</div>

	<span class="black_reorder_text">Footer Template</span>
	<br>
	<div class="select_template two_button_block">
	    <div class="save_reorder" >
		<span>SAVE</span>
	    </div>
	    <div class="next_step">
		<span>NEXT</span>
	    </div>
	</div>
    </div>
    <script type="text/javascript">
	
	jQuery(document).ready(function (){
	    builder_cee.initPreSave('.presave',<?php echo $id_pg;?>);
	});
    </script>
    
</div>
