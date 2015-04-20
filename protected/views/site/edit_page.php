<div class="container-fluid select_template">
    <div class="row-fluid white">
     
	<div class="span12 title"><?php echo $title?></div>	
    </div>
    <div class="other_bg">
    <div class="back_step position_absolute" onclick="window.history.back()">
	<span>BACK</span>
    </div>
	<span class="white_reorder_text">Homepage : Case Studies in Metro Vancovuer</span>
	<div class="row-fluid row_list">	    
	    <?php foreach ($pages as $key=>$itm): ?>
		<?php if($section_id == $itm->section_id):?>
		<div class="edit_page">	
		    <div class="arrow"></div>
		    <div class="edit_page_name paged<?php echo $itm->id;?>" data-position="<?php echo $key;?>">
			<?php echo $itm->name?>
		    </div>		
		</div>
		<?php endif;?>
	    <?php endforeach;?>
	    <div class="arrow white"></div>
	</div>

	<span class="white_reorder_text">Footer Template</span>
	<div class="save_reorder center not_display"></div>
    </div>
    <script type="text/javascript">
	jQuery(document).ready(function (){
	    builder_cee.initSortable('.row_list');
	    builder_cee.initReorderPage();	    	    
	});
    </script>
</div>