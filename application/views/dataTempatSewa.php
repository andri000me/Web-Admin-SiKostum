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
					<p>Tempat Sewa
					</p>
					
				</a>
			</li>

			<li class="nav-item">
				<a href="<?php echo base_url('Sewa');?>" >
					<i class="fas fa-cart-arrow-down"></i>
					<p>Sewa<?php foreach ($proses as $key) {
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
						<div class="d-flex align-items-center">
							
							<h4 class="page-title">Data Tempat Sewa</h4>
						</div>
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
						
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="mydata" class="table table-striped table-hover" >
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Foto</th>
										<th>Slogan</th>
										<th>Deskripsi</th>
										<th>Status Izin</th>
										<th>Aksi</th>
									</tr>
								</thead>
								
								<tbody id="show_data">
									<?php $id = 1; foreach ($tempat as $key) : ?>
									<tr>
										<td><?php echo $id ?></td>
										<td><?php echo $key->nama_tempat ?></td>
										<td><img src="http://localhost/RESTT/uploads/<?php echo $key->foto_tempat;?>" width="150px;"></td>
										<td><?php echo $key->slogan_tempat ?></td>
										<td><?php echo $key->deskripsi_tempat ?></td>
										<td><?php
												if ($key->izin == "ya") {
											?>
											<button class="btn btn-success" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
											Diizinkan</button>
											<?php
											}elseif($key->izin == "tidak"){
											?>
											<button class="btn btn-danger" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
											Tidak Diizinkan</button>
											<?php
											}else{
											?>
											menunggu
											<?php
											}
											?>
											
										</td>
										<td> <a href="<?php echo base_url('Tempat_Sewa/detailTempat/') .$key->id_tempat?>" class="btn btn-primary">Detail</a></td>
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