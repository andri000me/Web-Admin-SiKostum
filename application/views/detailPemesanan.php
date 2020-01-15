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
							<h4 class="page-title">Detail Pemesanan <?php echo $detailku[0]->nama_tempat?></h4>
							
							
							<div class="card-body">
								
								
								<div class="row">
									
									
									<div class="col">
										
										
										<?php $id = 1; foreach ($detailku as $key) : ?>
										
										<?php $id++; endforeach ?>
										<table class="table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Kostum</th>
													<th>Jumlah </th>
													<th>Harga </th>
													<th>Total</th>
													<th>Status</th>
													<th>Aksi</th>
													
													
													
												</tr>
											</thead>
											
											<tbody id="show_data">
												<?php $total = 0; ?>
												<?php $id = 1; foreach ($detailku as $key) : ?>
												<tr>
													<td><?php echo $id ?></td>
													<td><?php echo $key->nama_kostum?></td>
													<td><?php echo $key->jumlah?></td>
													<td><?php echo "Rp. ".$key->harga_kostum?></td>
													<td><?php echo "Rp. ".$key->harga_kostum*$key->jumlah?></td>
													<td><?php echo $key->status_log ?></td>
													<?php $total += $key->harga_kostum * $key->jumlah;?>
													<td>
														<?php
														if ($key->status_log == "pesan") {
														?>
														<div class="row">
															<div class="col-3">
																<?php echo form_open_multipart('Sewa/updateValid/'.$key->id_sewa); ?>
																<input type="hidden" name="id_log" value="<?php echo $key->id_log ?>">
																<input type="hidden" name="id_tempat" value="<?php echo $key->id_tempat ?>">
																<input type="submit" name="submit" value="Valid" class="btn btn-primary">
																
																<?php echo form_close(); ?>
															</div>
															<div class="col-3">
																
																<?php echo form_open_multipart('Sewa/updateTidak/'.$key->id_sewa); ?>
																<input type="hidden" name="id_log" value="<?php echo $key->id_log ?>">
																<input type="hidden" name="id_tempat" value="<?php echo $key->id_tempat ?>">
																<input type="submit" name="submit" value="Tidak Valid" class="btn btn-danger">
																
																<?php echo form_close(); ?>
																
															</div>
															
														</div>
														
														<?php
														
														}else if ($key->status_log == "tidak valid"){
															?>
																
																<span class="btn btn-danger" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
														Transaksi tidak valid</span>

															<?php

														}else if ($key->status_log == "ambil") {
														?>
														<?php echo form_open_multipart('Sewa/updateTransfer/'.$key->id_sewa); ?>
														<input type="hidden" name="id_log" value="<?php echo $key->id_log ?>">
														<input type="hidden" name="id_tempat" value="<?php echo $key->id_tempat ?>">
														<input type="submit" name="submit" value="Transfer" class="btn btn-primary">
														
														<?php echo form_close(); ?>
														<?php
														
														}elseif ($key->status_log == "selesai") {
														?><span class="btn btn-success" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
														Sewa Penyewa Selesai</span><?php
															}else if($key->status_log == "valid"){
														?><span class="btn btn-success" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
														Penyewa mengambil Kostum</span><?php
															}else if($key->status_log == "transfer"){
														?><span class="btn btn-success" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
														Transfer Selesai</span><?php
															}
															else{
														?><span class="btn btn-success" style="padding: 0px; padding-right: 5px; padding-left: 5px; font-size: 12px;">
														Menunggu proses</span><?php
															}
														?>
													</td>
													
												</tr>
												<?php $id++; endforeach ?>
												<tr>
													<td colspan="7" class="text-right"> Total Pembayaran : <?php echo "Rp. ".$total;?> </td>
												</tr>
												
												
											</tbody>
										</table>
										
										
										
										
										
									</div>
									
								</div>
								<div class="row" style="padding-top: 15px;">
									<div class="col text-right">
										
										<a href="<?php echo base_url('Sewa/detailSewa/') .$key->id_sewa?>" class="btn btn-success">Kembali</a>
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