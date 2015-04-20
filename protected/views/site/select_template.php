<div class="container-fluid select_template">
    <div class="row-fluid">
	<div class="span12 title"><?php echo $title?></div>
	
    </div>    
    <div class="back_step position_absolute" onclick="window.history.back()">
    </div>
    <div class="row-fluid row_sections">
	<?php foreach ($sections as $itm): ?>
	    <div class="span4 sections_bg ini_isotope">
		<a href='<?php echo(!empty($itm->ahref))?$itm->ahref:'javascript:;';?>'>
		    <img src="<?php echo $itm->img_url;?>" /><br>
		    <span>
			<?php echo $itm->name?>
		    </span>
		</a>
	    </div>
	<?php endforeach;?>
    </div>
</div>