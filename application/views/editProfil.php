<?php $this->load->view('body/header'); ?>
<!-- Sidebar -->

<div id="myMenu">
	<ul class="nav nav-primary">
		<li class="nav-item active">
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
						<h4 class="page-title">Edit Profil</h4>
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
							
							<div class="card-body">
								<?php echo form_open_multipart('Profil/editProfil'.$this->uri->segment(3)); ?>
								<?php echo validation_errors(); ?>
								<form enctype="multipart/form-data" method="POST">
									
									
									<div class="row">
										
										
										<div class="col">
											<div class="form-group">
												<label class="bmd-label-floating">Nama</label>
												<input type="hidden" id="id_user" name="id_user" class="form-control" value="<?php echo $user[0]->id_user ?>">
												<input type="text" id="nama" name="nama" class="form-control" value="<?php echo $user[0]->nama ?>">
											</div>
											
											
											
											
											<div class="form-group">
												<label class="bmd-label-floating">Jenis Kelamin</label>
												<?php
												if ($user[0]->jenis_kelamin == "P") {
												?>
												<br>
												<input type="radio" name="jenis_kelamin" value="P" checked="checked"> Perempuan <br>
												<input type="radio" name="jenis_kelamin" value="L"> Laki-Laki
												<?php
												} else{
												?>
												<br>
												<input type="radio" name="jenis_kelamin" value="P" > Perempuan <br>
												<input type="radio" name="jenis_kelamin" value="L" checked="checked"> Laki-Laki
												<?php
												}
												?>
												
											</div>
											
											
											
											
											<div class="form-group">
												<label class="bmd-label-floating">Email</label>
												<input type="email" id="email" name="email" class="form-control" value="<?php echo $user[0]->email ?>">
											</div>
											
											
											
											
										</div>
										
										
										<div class="col">
											<div class="form-group">
												<label class="bmd-label-floating">No Hp</label>
												<input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $user[0]->no_hp ?>">
											</div>

											<div class="form-group">
												<label class="bmd-label-floating">Username</label>
												<input type="text" id="username" name="username" class="form-control" value="<?php echo $user[0]->username ?>">
											</div>
											
											
											
											<div class="form-group">
												<label class="bmd-label-floating">Password</label>
												<input type="text" id="password" name="password" class="form-control" value="<?php echo $user[0]->password ?>">
											</div>
										</div>
										
										
										
									</div>
									<div class="row">
										<div class="col text-right">
											<input type="submit" name="submit" class="btn btn-primary pull-right" value="Simpan">
											
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
	<script type="text/javascript">
	window.setTimeout(function(){
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
		});
	},3000);
</script>