<a class="menutoggle"><i class="fa fa-bars"></i></a>
<div class="header-left">
    <ul class="headermenu">
        <li style="margin-top: 3px;">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
<!-- 				<strong class="visible-lg visible-md visible-sm visible-xs">Page : <?= $descript; ?></strong> -->
				<strong class="hidden-xxs hidden-tn">Panel Input Data : <?= $descript; ?></strong>
			</button>
    	</li>
    </ul>
</div><!-- header-right -->
<div class="header-right">
    <ul class="headermenu">
    	<?php
    	if ($back_button != false) {
    	?>
    	<li style="margin-top: 3px;">
			<button type="button" class="btn btn-default dropdown-toggle" id="kembali" data-toggle="dropdown">
				<i class="fa fa-arrow-left"></i> Kembali
			</button>
    	</li>
    	<?php
    	}
    	if ($add_button != false) {
    	?>

    	<?php
    	}
    	?>
    </ul>
</div><!-- header-right -->
