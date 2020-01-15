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

			<li class="nav-item active">
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
			<div class="col-md-12" >
				<div class="card">
					<div class="card-header">
						<h4 class="page-title">Detail Pengguna</h4>
					
							 <?php echo form_open_multipart('Pengguna/verifikasiPengguna/' .$this->uri->segment(3)); ?>
							 <?php echo form_hidden('id_user',$pengguna[0]->id_user);?>
							 <?php echo form_hidden('id_identitas',$pengguna[0]->id_identitas);?>
							<div class="card-body">
								<form>
									
									<div class="row">
										
										
										<div class="col">
											<div class="text-center">
										<img src="http://localhost/RESTT/uploads/<?php echo $pengguna[0]->foto_user;?>" width="200px;">
										</div>
											<div class="form-group">
												<label class="col-3">Nama</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $pengguna[0]->nama;?></label>
											</div>
											<div class="form-group">
												<label class="col-3">Jenis Kelamin</label>
												<label class="col-3"> : </label>
												<?php if ($pengguna[0]->jenis_kelamin == "P") {
												?>
												<label class="col-3">Perempuan</label>
												<?php
												} else{
												?>
												<label class="col-3">Laki-Laki</label>
												<?php
												}
											?></label>
										</div>
										<div class="form-group">
											<label class="col-3">Email</label>
											<label class="col-3"> : </label>
											<label class="col-3"><?php echo $pengguna[0]->email;?></label>
										</div>
										<div class="form-group">
											<label class="col-3">No Hp</label>
											<label class="col-3"> : </label>
											<label class="col-3"><?php echo $pengguna[0]->no_hp;?></label>
										</div>
										
									
											<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOne">
														<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
															<button class="btn btn-primary col-12">Alamat <span class="caret"></span></button>
														</a>
														</h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
														<div class="panel-body">
															<table class="table table-striped table-hover" >
																<thead>
																	<tr>
																		<th>No</th>
																		<th>Keterangan</th>
																		<th>Alamat</th>
																		<th>Kota</th>
				
																	</tr>
																</thead>
																
																<tbody id="show_data">
																	<?php $id = 1; foreach ($alamat as $key) : ?>
											
																	<tr>
																		<td><?php echo $id ?></td>
																		<td><?php echo $key->label_alamat ?></td>
																		<td><?php echo $key->alamat ?></td>
																		<td><?php echo $key->kota ?></td>
	
																	</tr>
																	<?php $id++; endforeach ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>

										</div>
										
									</div>
									
									
									<div class="col">
										<label class="col-12">Foto KTP</label>

										<label class="col-12 text-center"><img src="http://localhost/RESTT/uploads/<?php echo $pengguna[0]->foto_ktp;?>" data-toggle="modal" data-target="#image-gallery<?=$pengguna[0]->id_user?>"></label>
										<label class="col-2">Status</label>
										<label class="col-2"> : </label>
										<label class="col-4"> <?php echo $pengguna[0]->status;?></label>
										<br>
										
												<label class="col-2">Verifikasi</label>
												<label class="col-2"> : </label>
												<label class="col-4">
												<?php
												if ($pengguna[0]->status == "menunggu") {
												?>
												<br>
												<input type="radio" name="status" value="valid" > Valid &nbsp;
												<input type="radio" name="status" value="tidak valid"> Tidak Valid
												<?php
												} elseif ($pengguna[0]->status == "valid") {
													?>
												<br>
												<input type="radio" name="status" value="valid" checked="checked"> Valid &nbsp;
												<input type="radio" name="status" value="tidak valid" > Tidak Valid
												<?php
												}else{
												?>
												<br>
												<input type="radio" name="status" value="valid" > Valid &nbsp;
												<input type="radio" name="status" value="tidak valid" checked="checked"> Tidak Valid

												<?php
												}

												?>
											</label>

									</div>
									
									
									
								</div>
								<div class="row" style="padding-top: 15px;">
									<div class="col text-right">
										<input type="submit" name="submit" class="btn btn-primary pull-right" value="Simpan">
										<a href="<?php echo base_url('Pengguna') ?>" class="btn btn-success">Kembali</a>&nbsp;
									</div>
								</div>
								<?php echo form_close(); ?>
								<div class="clearfix"></div>
							</form>
							
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('body/footer'); ?>

<?php $no=0; foreach($pengguna as $key): $no++; ?>
<div class="modal fade" id="image-gallery<?=$pengguna[0]->id_user?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    	<?php echo $key->foto_ktp;?>
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	<label class="col-md-1"></label>
                    	<img src="http://localhost/RESTT/uploads/<?php echo $key->foto_ktp;?>"  id="image-gallery-image" class="img-responsive col-md-10"  >
                        <label class="col-md-1"></label>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
   <?php endforeach; ?>