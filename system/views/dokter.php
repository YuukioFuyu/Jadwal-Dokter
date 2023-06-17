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
                        <th>Nama Dokter</th>
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
                            <td><?= $t['nama']; ?></td>
                            <td>
                                <a href="#myModal" data-toggle="modal" data-target="#myModal" class="edit" id="<?= $t['id']; ?>"><i class="fa fa-pencil"></i> Ubah</a> |
                                <a href="<?= base_url(); ?>dokter/delete/<?= $t['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data penting ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
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
					<form id="basicForm" method="POST" action="<?= base_url(); ?>dokter/process" class="form-horizontal">
						<input type="hidden" name="id" value="" />
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Dokter <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="nama" class="form-control" placeholder="Nama Dokter" value="" />
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
		$("input[name='id']").val("");
		$("input[name='nama']").val("");
	});

	$('.edit').click(function() {
		jQuery.ajax({
			type: "POST",
			url: "<?= base_url(); ?>dokter/form",
			dataType: 'JSON',
			data: {id: $(this).attr("id")},
			success: function(data) {
				$("input[name='id']").val(data[0]['id']);
				$("input[name='nama']").val(data[0]['nama']);
			}
		});
	});

	$('#save').click(function() {
		$('#basicForm').submit();
	});
</script>
