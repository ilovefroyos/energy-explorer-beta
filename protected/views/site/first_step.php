<div class="container-fluid first_step">
    <div class="row-fluid">
	<div class="span12 title"><?php echo $title?></div>
	
    </div>    
    <div class="row-fluid row_sections">
	<?php foreach ($sections as $itm): ?>
	    <div class="span4 sections_bg ini_isotope" style="background: url('<?php echo $itm->img_url;?>') no-repeat;">
		<a href='<?php echo (empty($itm->message))?$ahref.$itm->ahref:'javascript:;';?>' <?php echo (empty($itm->message))?'':'onclick="alert(\''.addslashes($itm->message).'\');"';?>><?php echo $itm->name?></a>
	    </div>
	<?php endforeach;?>
    </div>
</div>