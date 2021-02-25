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
			<th>NAMA RESORT</th>
			<th>NAMA KAMAR</th>
			<th>NAMA PEMESAN</th>
			<th>EMAIL</th>
			<th>TELEPON</th>
			<th>CHECK IN</th>
			<th>CHECK OUT</th>
			<th>HARGA</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($booking as $booking){ ?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $booking->nama_resort ?></td>
		<td><?php echo $booking->nama_room ?></td>
		<td><?php echo $booking->nama_pemesan ?></td>
		<td><?php echo $booking->email ?></td>
		<td><?php echo $booking->telepon?></td>
		<td><?php echo $booking->checkin ?></td>
		<td><?php echo $booking->checkout ?></td>
		<td><?php echo number_format($booking->harga,'0',',','.') ?></td>
	</tr>
		<?php $no++; }?>
	</tbody>
</table>