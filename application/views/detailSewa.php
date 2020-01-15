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
				<li class="nav-item">
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
				<li class="nav-item active">
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
				<div class="col-12" >
					<div class="card">
						<div class="card-header">
							<h4 class="page-title">Detail Sewa</h4>
							
							<?php echo form_open_multipart('Sewa/statusTransfer/' .$this->uri->segment(3)); ?>
							<?php echo form_hidden('id_sewa',$sewa[0]->id_sewa);?>
							<div class="card-body">
								<form>
									
									<div class="row">
										
										
										<div class="col">
											
											<div class="form-group">
												<label class="col-3">Penyewa</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $sewa[0]->nama;?></label>
											</div>
											<div class="form-group">
												<label class="col-3">Transaksi</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $sewa[0]->tgl_transaksi;?></label>
											</div>
											<div class="form-group">
												<label class="col-3">Tanggal Sewa</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $sewa[0]->tgl_sewa;?></label>
											</div>
											<div class="form-group">
												<label class="col-3">Tanggal Kembali</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $sewa[0]->tgl_kembali;?></label>
											</div>
											
											<div class="form-group">
												<label class="col-3">Status</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $sewa[0]->status_sewa;?></label>
											</div>
											<div class="form-group">
												<label class="col-3">Bukti Sewa</label>
												<label class="col-3"> : </label>
												<label class="col-3 img-responsive text-center">
													<?php
													if (empty($sewa[0]->bukti_sewa)) {
													?>
													<button class="btn btn-danger" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">Belum melakukan transfer</button>
													<?php
													}else{
													?>
													<img src="http://localhost/RESTT/uploads/<?php echo $sewa[0]->bukti_sewa;?>" data-toggle="modal" data-target="#image-gallery<?=$sewa[0]->id_sewa?>" width="100px;">
													<?php }?>
												</label>
											</div>

											<div class="form-group">
												<label class="col-3">Total Pembayaran</label>
												<label class="col-3"> : </label>
												<label class="col-3">
													<?php $hasil = 0; ?>
													<?php $id = 1; foreach ($total as $key) : ?>
													<?php  $hasil += $key->jumlah*$key->harga_kostum ?>

													<?php $id++; endforeach ?>
													<?php echo "Rp.".$hasil;?>

												</label>
											</div>

											<div class="form-group">
													<label class="col-3">Status Transaksi</label>
													<label class="col-3"> : </label>
													<label class="col-3"><?php
															if ($sewa[0]->status_sewa == "batal") {
														?>
														<br>
														<input type="radio" name="status_sewa" value="batal" checked="checked"> Batal &nbsp;
														<input type="radio" name="status_sewa" value="selesai"> Selesai
														<?php
														
														}else if ($sewa[0]->status_sewa == "selesai") {
														?>
														<br>
														<input type="radio" name="status_sewa" value="batal" > Batal &nbsp;
														<input type="radio" name="status_sewa" value="selesai" checked="checked"> Selesai
														<?php
														}else{
														?>
														<br>
														<input type="radio" name="status_sewa" value="batal" > Batal &nbsp;
														<input type="radio" name="status_sewa" value="selesai"> Selesai
														
														<?php
														}
													?></label>
													<div class="col form-group">
														<label class="col-3"></label>
														<label class="col-3">  </label>
														<label class="col-3">
															<input type="submit" name="submit" class="btn btn-primary pull-right" value="Simpan">
														</label>
													</div>
													<?php echo form_close(); ?>
													
												</form>
											</div>

										</div>
										<div class="col">
											<h2>Data Pemesanan</h2>

											<?php $id = 1; foreach ($detail as $key) : ?>
										

									<?php $id++; endforeach ?>
									<table class="table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>Tempat Sewa</th>
											<th>Tanggal </th>
											<th>Status </th>
											<th>Aksi</th>
		
											
											
										</tr>
									</thead>
									
									<tbody id="show_data">
										<?php $id = 1; foreach ($detail as $key) : ?>
										<tr>
											<td><?php echo $id ?></td>
											<td><?php echo $key->nama_tempat?></td>
											<td><?php echo $key->tgl_log?></td>
											<td><?php echo $key->status_log?></td>
											<td>
											<?php echo form_open_multipart('Sewa/detailPemesanan/' .$this->uri->segment(3)); ?>
											<input type="hidden" name="id_tempat" value="<?php echo $key->id_tempat ?>">
											<input type="submit" name="submit" value="Detail" class="btn btn-primary">
							
											<?php echo form_close(); ?>

												
											</td>
											
										</tr>
										<?php $id++; endforeach ?>
										
										
								</tbody>
								</table>
											
											
											

													
						
									</div>
									
								</div>
								<div class="row" style="padding-top: 15px;">
									<div class="col text-right">
										
										<a href="<?php echo base_url('Sewa') ?>" class="btn btn-success">Kembali</a>&nbsp;
									</div>
								</div>

							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('body/footer'); ?>
	<?php $no=0; foreach($sewa as $key): $no++; ?>
	<div class="modal fade" id="image-gallery<?=$sewa[0]->id_sewa?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<?php echo $key->bukti_sewa;?>
					<h4 class="modal-title" id="image-gallery-title"></h4>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
					</button>
				</div>
				<div class="modal-body">
					<label class="col-md-1"></label>
					<img src="http://localhost/RESTT/uploads/<?php echo $key->bukti_sewa;?>"  id="image-gallery-image" class="img-responsive col-md-10" >
					<label class="col-md-1"></label>
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>


	<!-- MODAL EDIT -->
<?php $no=0; foreach($detail as $key): $no++; ?>
<div class="row">
	<div id="modal-edit<?=$key->id_sewa;?>" class="modal fade">
		<div class="modal-dialog modal-lg ">
			<form action="<?php echo site_url('Kategori/editKategori'); ?>" method="post">
				<div class="modal-content ">
					<div class="modal-header bg-primary">
						
						<h3 class="modal-title" id="myModalLabel">Detail Pemesanan <?php echo $key->nama_tempat?></h3>
					</div>
					<div class="modal-body">

				</form>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<!-- END MODAL EDIT -->