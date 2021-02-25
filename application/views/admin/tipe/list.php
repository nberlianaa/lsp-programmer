<p>
	<a href="<?php echo base_url('admin/tipe/tambah')?>" class="btn btn-success btn-lg">
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
			<th>NAMA KAMAR</th>
			<th>TIPE KAMAR</th>
			<th>SLUG TIPE</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($tipe as $tipe){ ?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $tipe->nama_room ?></td>
		<td><?php echo $tipe->tipe_room ?></td>
		<td><?php echo $tipe->slug_tipe ?></td>
		<td>
			<a href="<?php echo base_url('admin/tipe/edit/' .$tipe->id_tipe) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

			<a href="<?php echo base_url('admin/tipe/delete/' .$tipe->id_tipe) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin hapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
		</td>
	</tr>
		<?php $no++; }?>
	</tbody>
</table>