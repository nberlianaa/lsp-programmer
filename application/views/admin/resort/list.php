<p>
	<a href="<?php echo base_url('admin/resort/tambah')?>" class="btn btn-success btn-lg">
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
			<TH>KETERANGAN</TH>
			<TH>GAMBAR</TH>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($resort as $resort){ ?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $resort->nama_resort ?></td>
		<td><?php echo $resort->keterangan ?></td>
		<td>
			<img src="<?php echo base_url('assets/upload/image/thumbs/' .$resort->gambarr) ?>" class="img img-responsive img-thumbnail" width="60">
		</td>
		<td>
			<a href="<?php echo base_url('admin/resort/gambarr/' .$resort->id_resort) ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i> Gambar(<?php echo $resort->total_gambarr?>)</a>

			<a href="<?php echo base_url('admin/resort/edit/' .$resort->id_resort) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

			<a href="<?php echo base_url('admin/resort/delete/' .$resort->id_resort) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin hapus data ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
		</td>
	</tr>
		<?php $no++; }?>
	</tbody>
</table>