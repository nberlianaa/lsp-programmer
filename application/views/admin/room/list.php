<p>
	<a href="<?php echo base_url('admin/room/tambah')?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah Baru
	</a>
</p>

<?php
//notifikasi
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>NO</th>
			<th>RESORT</th>
			<th>KODE KAMAR</th>
			<th>NAMA KAMAR</th>
			<th>TIPE KAMAR</th>
			<th>FASILITAS</th>
			<th>STATUS</th>
			<th>HARGA</th>
			<TH>GAMBAR</TH>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($room as $room){ ?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $room->nama_resort ?></td>
		<td><?php echo $room->kode_room ?></td>
		<td><?php echo $room->nama_room ?></td>
		<td><?php echo $room->tipe_room ?></td>
		<td><?php echo $room->fasilitas ?></td>
		<td><?php
		if($room->status == "0")
		{
			echo "<span class = 'badge badge-danger'>Tidak tersedia</span>";
		}else{
			echo "<span class = 'badge badge-primary'>Tersedia</span>";
		}
		?></td>
		<td><?php echo number_format($room->harga,'0',',','.') ?></td>

		<td>
			<img src="<?php echo base_url('assets/upload/image/thumbs/' .$room->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
		</td>
		<td>
			<a href="<?php echo base_url('admin/room/gambar/' .$room->id_room) ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i> Gambar(<?php echo $room->total_gambar?>)</a>

			<a href="<?php echo base_url('admin/room/edit/' .$room->id_room) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

			<a href="<?php echo base_url('admin/room/delete/' .$room->id_room) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin hapus data ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
		</td>
	</tr>
		<?php $no++; }?>
	</tbody>
</table>