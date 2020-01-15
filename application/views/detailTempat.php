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
			<li class="nav-item active">
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
						<h4 class="page-title">Detail Tempat Sewa</h4>
					
							 <?php echo form_open_multipart('Tempat_Sewa/izinTempat/' .$this->uri->segment(3)); ?>
							 <?php echo form_hidden('id_tempat',$tempat[0]->id_tempat	);?>
							<div class="card-body">
								<form>
									
									<div class="row">
										<div class="col">
											<img src="http://localhost/RESTT/uploads/<?php echo $tempat[0]->foto_tempat;?>" class="img-responsive col-md-10" >
										</div>
										
										
										<div class="col">
									
											<div class="form-group">
												<label class="col-3">Nama</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $tempat[0]->nama_tempat;?></label>
											</div>

											<div class="form-group">
												<label class="col-3">Slogan</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $tempat[0]->slogan_tempat;?></label>
											</div>

											<div class="form-group">
												<label class="col-3">Deskripsi</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $tempat[0]->deskripsi_tempat;?></label>
											</div>

											<div class="form-group">
												<label class="col-3">Alamat</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $tempat[0]->alamat;?>, <?php echo $tempat[0]->kota;?></label>
											</div>

											<div class="form-group">
												<label class="col-3">Status</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php echo $tempat[0]->status_tempat;?></label>
											</div>

											<div class="form-group">
												<label class="col-3">Izin</label>
												<label class="col-3"> : </label>
												<label class="col-3"><?php
												if ($tempat[0]->izin == "ya") {
												?>
												<br>
												<input type="radio" name="izin" value="ya" checked="checked"> Diizinkan &nbsp;
												<input type="radio" name="izin" value="tidak"> Tidak Diizinkan
												<?php
												
												}else{
												?>
												<br>
												<input type="radio" name="izin" value="ya" > Diizinkan &nbsp;
												<input type="radio" name="izin" value="tidak" checked="checked"> Tidak Diizinkan
												<?php
												}

												?></label>


											</div>

											

										</div>
										
									</div>

									<div class="row" style="padding-top: 10px;">
										<div class="col-md-12">
											<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOne">
														<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
															<button class="btn btn-primary col-5">Kostum<span class="caret"></span></button>
														</a>
														</h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
														<div class="panel-body">
															<table id="mydata" class="table table-striped table-hover" >
																<thead>
																	<tr>
																		<th>No</th>
																		<th>Nama</th>
																		<th>Foto</th>
																		<th>Jumlah</th>
																		<th>Harga</th>
																		<th>Aksi</th>
				
																	</tr>
																</thead>
																
																<tbody id="show_data">
																	<?php $id = 1; foreach ($kostum as $key) : ?>
											
																	<tr>
																		<td><?php echo $id ?></td>
																		<td><?php echo $key->nama_kostum ?></td>
																		<td><img src="http://localhost/RESTT/uploads/<?php echo $key->foto_kostum;?>" width="50px;" ></td>
																		<td><?php echo $key->jumlah_kostum ?></td>
																		<td><?php echo $key->harga_kostum ?></td>
																		<td><a data-toggle="modal" data-target="#modal-detail<?=$key->id_kostum;?>" class="btn btn-primary" data-popup="tooltip" data-placement="top" title="Detail" style="color: #ffffff;"> Detail </a></td>
	
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
								<div class="row" style="padding-top: 15px;">
									<div class="col text-right">
										<input type="submit" name="submit" class="btn btn-primary pull-right" value="Simpan">
										<a href="<?php echo base_url('Tempat_Sewa') ?>" class="btn btn-success">Kembali</a>&nbsp;
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

<!-- MODAL EDIT -->
<?php $no=0; foreach($kostum as $key): $no++; ?>
<div class="row">
	<div id="modal-detail<?=$key->id_kostum;?>" class="modal fade">
		<div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    	<h3>Detail Kostum</h3>
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	<form class="form-group">
                    		<label class="col-md-4"></label>
                    	<img src="http://localhost/RESTT/uploads/<?php echo $key->foto_kostum;?>"  id="image-gallery-image" class="img-responsive col-md-4"  >
                        <label class="col-md-4"></label>
                    	</form>
                    	<form class="form-group">
                    		<label class="col-md-2">Nama</label>
                        <label class="col-md-1"> : </label>
                        <label class="col-md-6"><?php echo $key->nama_kostum;?></label>
                    	</form>
                    	<form class="form-group">
                    		<label class="col-md-2">Jumlah</label>
                        <label class="col-md-1"> : </label>
                        <label class="col-md-6"><?php echo $key->jumlah_kostum;?></label>
                    	</form>
                    	<form class="form-group">
                    		<label class="col-md-2">Harga</label>
                        <label class="col-md-1"> : </label>
                        <label class="col-md-6"><?php echo $key->harga_kostum;?></label>
                    	</form>
                    	<form class="form-group">
                    		<label class="col-md-2">Deskripsi</label>
                        <label class="col-md-1"> : </label>
                        <label class="col-md-6"><?php echo $key->deskripsi_kostum;?></label>
                    	</form>
                    	
                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
		</div>
	</div>
	<?php endforeach; ?>
	<!-- END MODAL EDIT -->