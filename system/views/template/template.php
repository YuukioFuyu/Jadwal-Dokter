<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="Sistem Informasi Penjualan RAST">
        <meta name="author" content="null.co.id">
        <!--<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" type="image/png">-->

        <title>Panel Input Data</title>

        <link href="<?= base_url(); ?>assets/css/style.default.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>assets/css/bootstrap-xxs-master/bootstrap-xxs-tn.min.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>assets/css/dropzone.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>assets/css/jquery.datatables.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/jquery.growl.css" rel="stylesheet">
        
        <script src="<?= base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.growl.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery-ui-1.10.3.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/toggles.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/retina.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.cookies.js"></script>

        <!---->
        <script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/chosen.jquery.min.js"></script>
        <!---->
        <script src="<?= base_url(); ?>assets/js/jquery.datatables.min.js"></script>
        <!---->

        <script src="<?= base_url(); ?>assets/js/custom.js"></script>
        
        <!---->
        <script src="<?= base_url(); ?>assets/js/highcharts/js/highcharts.js"></script>
        <script src="<?= base_url(); ?>assets/js/highcharts/js/modules/exporting.js"></script>
        <!---->
        
        <style type="text/css" media="print">
            /*@media print {*/
                @page { size: auto; margin: 0mm; }
                body { overflow:hidden; border: solid 1px blue; margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */ }
                html { background-color: #FFFFFF; margin: 0px; /* this affects the margin on the html before sending to printer */ }
            /*}*/
        </style>
    </head>

    <body>
        <!-- Preloader -->
        <!--
        <script type="text/javascript">

            $.growl.notice({ message: "Halo, Selamat Datang di Panel Admin Jadwal Dokter" });
            //$.growl.warning({ message: "Bahan Baku Habis" });
        </script>
        -->
        <div id="preloader">
            <div id="status"></div>
        </div>
        <section>
            <div class="leftpanel">
                <div class="logopanel">
                    <!--<center><h1><span>Admin &nbsp; Panel</span></h1></center>-->
                    <center><img src="./assets/logo.png" width="50%" height="90%"></center>
                </div><!-- logopanel -->

                <div class="leftpanelinner">
                    <?= $this->load->view('template/menu', NULL, TRUE) ?>
                </div><!-- leftpanelinner -->
            </div><!-- leftpanel -->

            <div class="mainpanel" style="margin-top:-10px;">
                <div class="headerbar">
                    <?= $this->load->view('template/header', NULL, TRUE); ?>
                </div><!-- headerbar -->

                <div class="contentpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if ($this->session->userdata('pesan_sistem') != "" && $this->session->userdata('pesan_sistem') != NULL) {
                                $jenis_pesan = "";
                                if ($this->session->userdata('tipe_pesan') == "Sukses") {
                                    $jenis_pesan = "success";
                                } else {
                                    $jenis_pesan = "danger";
                                }
                                ?>
                                <div class="alert alert-<?= $jenis_pesan; ?>">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong><?= $this->session->userdata('pesan_sistem'); ?></strong>
                                </div>
                                <?php
                                $this->session->set_userdata('pesan_sistem', NULL);
                                $this->session->set_userdata('tipe_pesan', NULL);
                            }
                            ?>
                        </div>
                    </div>
                    
                    <?= $content; ?>
                </div><!-- contentpanel -->
            </div><!-- mainpanel -->
        </section>

        <script>
            jQuery(document).ready(function() {
                // Chosen Select
                jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});

                // Basic Form
                jQuery("#basicForm").validate({
                    highlight: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    success: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-error');
                    }
                });
                
                jQuery('#table').dataTable({
                    "sPaginationType": "full_numbers"
                });
                
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker1').datepicker();
                jQuery('#datepicker2').datepicker();
            });
        </script>
    </body>
</html>
