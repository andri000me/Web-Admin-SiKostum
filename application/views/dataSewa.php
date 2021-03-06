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
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							
							<h4 class="page-title">Data Sewa</h4>
						</div>
						
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="mydata" class="table table-striped table-hover" >
								<thead>
									<tr>
										<th>No</th>
										<th>Penyewa</th>
										<th>Tanggal Transaksi</th>
										<th>Bukti Sewa</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								
								<tbody id="show_data">
									<?php $id = 1; foreach ($sewa as $key) : ?>
									<tr>
										<td><?php echo $id ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->tgl_transaksi ?></td>
										<td><?php if(empty($key->bukti_sewa)){
											?> <button class="btn btn-danger" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
											Belum Transfer</button><?php
										}else{
											?> <button class="btn btn-success" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
											Sudah Transfer</button> <?php
										}?></td>
										<td><?php echo $key->status_sewa ?></td>
										
										<td> <a href="<?php echo base_url('Sewa/detailSewa/') .$key->id_sewa?>" class="btn btn-primary">Detail</a></td>
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