<?php
$a = 'active';
$b = 'active nav-active';

$input_jadwal = '';
$dokter = '';
$poli = '';

switch ($menu) {
    case 'input_jadwal' :
        $input_jadwal = $a;
        break;

    case 'dokter' :
        $dokter = $a;
        break;
        
    case 'poli' :
        $poli = $a;
        break;

    default :
        $input_jadwal = $a;
        break;
}
?>

<ul class="nav nav-pills nav-stacked nav-bracket">
    <li class="<?= $input_jadwal; ?>"><a href="<?= base_url(); ?>input_jadwal"><i class="fa fa-calendar"></i> <span>Jadwal Dokter</span></a></li>
    <li class="<?= $dokter; ?>"><a href="<?= base_url(); ?>dokter"><i class="fa  fa-stethoscope"></i> <span>Dokter</span></a></li>
    <li class="<?= $poli; ?>"><a href="<?= base_url(); ?>poli"><i class="fa fa-users"></i> <span>Poli</span></a></li>
</ul>