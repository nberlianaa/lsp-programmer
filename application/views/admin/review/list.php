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
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>COMMENT</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($review as $review){ ?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $review->nama_tamu ?></td>
		<td><?php echo $review->email ?></td>
		<td><?php echo $review->comment ?></td>
	</tr>
		<?php $no++; }?>
	</tbody>
</table>