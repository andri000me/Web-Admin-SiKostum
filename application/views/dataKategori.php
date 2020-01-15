<?php $this->load->view('body/header'); ?>
<!-- Sidebar -->

<div id="myMenu">
	<ul class="nav nav-primary">
		<li class="nav-item">
			<a href="<?php echo base_url('Beranda');?>" >
				<i class="fas fa-home"></i>
				<p>Beranda</p>
				
			</a>
			
			<li class="nav-section">
				<span class="sidebar-mini-icon">
					<i class="fa fa-ellipsis-h"></i>
				</span>
				
			</li>
			<li class="nav-item ">
			<a href="<?php echo base_url('user');?>" >
				<i class="fas fa-users"></i>
				<p>Pengguna</p>
				
			</a>

			<li class="nav-item">
				<a href="<?php echo base_url('Pengguna');?>" >
					<i class="fas fa-id-card"></i>
					<p>Identitas
						<?php foreach ($menunggu as $key) {
						if ($key->jumlah == '0' ) {
						echo " ";
						}else{
						?>
						<span class="bubble">
							<?php echo $key->jumlah; ?>
						</span>
						<?php
						}
						
						} ?>
					</p>
					
				</a>
				
			</li>
			<li class="nav-item active">
				<a href="<?php echo base_url('Kategori'); ?>" >
					<i class="fas fa-tshirt"></i>
					
					<p>Kategori Kostum</p>
				</a>
				
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url('Tempat_Sewa'); ?>" >
					<i class="fas fa-store"></i>
					<p>Tempat Sewa</p>
					
				</a>
			</li>

			<li class="nav-item">
				<a href="<?php echo base_url('Sewa');?>" >
					<i class="fas fa-cart-arrow-down"></i>
					<p>Sewa
					<?php foreach ($proses as $key) {
						if ($key->jumlah == '0' ) {
						echo " ";
						}else{
						?>
						<span class="bubble">
							<?php echo $key->jumlah; ?>
						</span>
						<?php
						}
						
						} ?></p>
				</a>
			</li>
			
			
			<li class="nav-item">
				<a href="<?php echo base_url('Komentar'); ?>">
					<i class="fas fa-pen-square"></i>
					<p>Komentar</p>
					
				</a>
			</li>
			
			<li class="mx-4 mt-2">
				
				<a href="<?php echo base_url('Login/logout'); ?>" class="btn btn-primary btn-block">
					<i class="fas fa-sign-out-alt"></i>
					<span class="btn-label mr-2"> </span>Keluar</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="page-title">Data Kategori</h4>
						<?php
							$hasil = $this->session->flashdata('hasil');
							if (empty($hasil)) {
								echo " ";
							}else{
						?>
						<div class="alert alert-primary">
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
							<?php echo $hasil  ?><br>
						</div>
						
						<?php
						}
						?>
						
						<div class="d-flex align-items-center">
							
							<div class="pull-right"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah</button></div>
						</div>
						
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="mydata" class="table table-striped table-hover" >
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Aksi</th>
									</tr>
								</thead>
								
								<tbody id="show_data">
									<?php $id = 1; foreach ($kategori as $key) : ?>
									<tr>
										<td><?php echo $id ?></td>
										<td><?php echo $key->nama_kategori ?></td>
										
										<td>
											
											<a data-toggle="modal" data-target="#modal-edit<?=$key->id_kategori;?>" class="btn btn-link btn-primary btn-lg" data-popup="tooltip" data-placement="top" title="Edit Data"> <i class="fas fa-edit"></i></a>
											<a data-toggle="modal" data-target="#modal-hapus<?=$key->id_kategori;?>" class="btn btn-link btn-danger btn-lg" data-popup="tooltip" data-placement="top" title="Hapus Data"> <i class="fas fa-trash"></i></a>
											
										</td>
									</tr>
									<?php $id++; endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php $this->load->view('body/footer'); ?>
<script type="text/javascript">
	window.setTimeout(function(){
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
		});
	},3000);
</script>
<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				
				<h3 class="modal-title" id="myModalLabel">Tambah Kategori</h3>
			</div>
			<form action="<?php echo site_url('Kategori/tambahKategori'); ?>" method="post">
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
		</div>
	</div>
</div>
<!--END MODAL ADD-->
<!-- MODAL EDIT -->
<?php $no=0; foreach($kategori as $key): $no++; ?>
<div class="row">
	<div id="modal-edit<?=$key->id_kategori;?>" class="modal fade">
		<div class="modal-dialog">
			<form action="<?php echo site_url('Kategori/editKategori'); ?>" method="post">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						
						<h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
					</div>
					<div class="modal-body">
						<input type="hidden" readonly value="<?php echo $key->id_kategori;?>" name="id_kategori" class="form-control" >
						<div class="form-group">
							<label class='col-md-3'>Nama Kategori</label>
							<div class='col-md-9'><input type="text" name="nama_kategori" autocomplete="off" value="<?=$key->nama_kategori;?>" required placeholder="Masukkan Modal" class="form-control" ></div>
						</div>
						<br>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" type="button" >Kembali</button>
						<input type="submit" class="btn btn-primary pull-right" name="submit" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<!-- END MODAL EDIT -->
	<!-- MODAL Hapus -->
	<?php $no=0; foreach($kategori as $key): $no++; ?>
	<div class="row">
		<div id="modal-hapus<?=$key->id_kategori;?>" class="modal fade">
			<div class="modal-dialog">
				<form action="<?php echo site_url('Kategori/hapusKategori'); ?>" method="post">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							
							<h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
						</div>
						<div class="modal-body">
							<input type="hidden" readonly value="<?php echo $key->id_kategori;?>" name="id_kategori" class="form-control" >
							
							Apakah Anda yakin ingin menghapus data kategori <?php echo $key->nama_kategori ?> ?
							<br>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" type="button" >Tidak</button>
							<input type="submit" class="btn btn-danger pull-right" name="submit" value="Ya">
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<!-- END MODAL Hapus -->