<div class="container-fluid select_template unpb_page">
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
		    <div class="edit_page_name paged<?php echo $itm->id;?>" data-position="<?php echo $key;?>">
			<?php echo $itm->name?>

		    <div class="panel_unpbl">
			<div class="view_pg" onclick="window.location='/site/editexistpage/<?php echo $itm->id;?>'"></div>
			<div class="unpbl_pg"></div>
			<div class="del_pg"></div>
		    </div>
		    </div>
		</div>
	    <?php endif;?>
	<?php endforeach;?>
    </div>
    
    <span class="white_reorder_text">Footer Template</span>
    <br>
    </div>
    <script type="text/javascript">
	jQuery(document).ready(function (){
	    builder_cee.initPublishedActions();
	});
    </script>
</div>