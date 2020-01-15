<form action="<?php echo site_url('Keranjang/tambahSewa'); ?>" method="post">
				<div class="modal-body">
					<input name="id_kategori" id="id_kategori" class="form-control" type="hidden" placeholder="Kode kategori" style="width:335px;" required>
					<div class="form-group">
						<label class="control-label col-xs-3" >Nama Kategori</label>
						<div class="col-xs-9">
							<input name="nama_kategori" id="nama_kategori" class="form-control" type="text" placeholder="Nama kategori" style="width:335px;" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" type="button" >Kembali</button>
					<input type="submit" class="btn btn-primary pull-right" name="submit" value="Simpan">
				</div>
			</form>