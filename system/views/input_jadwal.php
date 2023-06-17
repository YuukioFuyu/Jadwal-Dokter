<div class="panel panel-default">
    <div class="panel-body">
		<div class="panel panel-primary">
			<button type="button" class="btn btn-default dropdown-toggle" id="tambah" data-toggle="dropdown">
				<a href="#myModal" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
			</button>
		</div>
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th class="hidden"></th>
                        <th>Nama Poli</th>
                        <th>Nama Dokter</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($dataTable as $t):
                        ?>
                        <tr class="gradeA">
                            <td class="hidden"><?= $i++; ?></td>
                            <td><?= $t['nama_poli']; ?></td>
                            <td><?= $t['nama']; ?></td>
                            <td><?= $t['hari']; ?></td>
                            <td><?= $t['jam_mulai'] . " - " . $t['jam_selesai']; ?></td>
                            <td>
                                <a href="#myModal" data-toggle="modal" data-target="#myModal" class="edit" id="<?= $t['id']; ?>"><i class="fa fa-pencil"></i> Ubah</a> |
                                <a href="<?= base_url(); ?>input_jadwal/delete/<?= $t['id']; ?>" onclick="return confirm('Yakin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div><!-- table-responsive -->
    </div><!-- panel-body -->
</div><!-- panel -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
            	<div id="modal_content">
					<form id="basicForm" method="POST" action="<?= base_url(); ?>input_jadwal/process" class="form-horizontal">
						<input type="hidden" name="jadwal_id" value="" />
						<div class="form-group">
							<label class="col-sm-3 control-label">Poli <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<select class="form-control chosen-select" name="poli_id" id="poli_id" data-placeholder="Pilih Poli" required>
									<option value=""></option>
									<?php
									foreach ($poli as $s):
										?>
										<option value="<?= $s['id']; ?>"><?= $s['nama']; ?></option>
										<?php
									endforeach;
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokter <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<select class="form-control chosen-select" name="dokter_id" id="dokter_id" data-placeholder="Pilih Dokter" required>
									<option value=""></option>
									<?php
									foreach ($dokter as $s):
										?>
										<option value="<?= $s['id']; ?>"><?= $s['nama']; ?></option>
										<?php
									endforeach;
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Hari <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<select class="form-control chosen-select" name="hari" id="hari" data-placeholder="Pilih Hari" required>
									<option value=""></option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
									<option value="Sabtu">Sabtu</option>
									<option value="Minggu">Minggu</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jam Mulai <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="jam_mulai" class="form-control" placeholder="Jam Mulai" value=":00" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jam Selesai <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="jam_selesai" class="form-control" placeholder="Jam Selesai" required value=":00" /> Wajib diisi
							</div>
						</div>
					</form>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_modal" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="save" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="copyright text-center my-auto">
	<span>Copyright &copy; 2022 - <?= date('Y'); ?> <a href="https://yuuki0.net" target="_blank">Yuukio Fuyu</a>. All Rights Reserved</span>
</div>
		
<script>
	$('#tambah').click(function() {
		$("input[name='jadwal_id']").val("");
		$("#poli_id").val("").trigger("chosen:updated");
		$("#dokter_id").val("").trigger("chosen:updated");
		$("#hari").val("").trigger("chosen:updated");
		$("input[name='jam_mulai']").val("");
		$("input[name='jam_selesai']").val("");
	});

	$('.edit').click(function() {
		jQuery.ajax({
			type: "POST",
			url: "<?= base_url(); ?>input_jadwal/form",
			dataType: 'JSON',
			data: {id: $(this).attr("id")},
			success: function(data) {
				$("input[name='jadwal_id']").val(data[0]['id']);
				$("#poli_id").val(data[0]['poli']).trigger("chosen:updated");
				$("#dokter_id").val(data[0]['dokter']).trigger("chosen:updated");
				$("#hari").val(data[0]['hari']).trigger("chosen:updated");
				$("input[name='jam_mulai']").val(data[0]['jam_mulai']);
				$("input[name='jam_selesai']").val(data[0]['jam_selesai']);
			}
		});
	});

	$('#save').click(function() {
		$('#basicForm').submit();
	});
</script>
