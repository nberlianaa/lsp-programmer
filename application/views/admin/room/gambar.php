<?php
//error upload
if(isset($error)) {
   echo '<p class="alert alert-warning">';
   echo $error;
   echo '</p>';
}

//notifikasi eror
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open_multipart(base_url('admin/room/gambar/'.$room->id_room),' class="form-horizontal"');
?>


<div class="form-group">
   <label class="col-md-2 control-label">Judul Gambar</label>
         <div class="col-md-8">
         <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar" value="<?php echo set_value('judul_gambar') ?>" required>
      </div>
 </div>

 <div class="form-group">
   <label class="col-md-2 control-label">Unggah Gambar</label>
         <div class="col-md-3">
         <input type="file" name="gambar" class="form-control" placeholder="Gambar Kamar" value="<?php echo set_value('judul_gambar') ?>" required>
      </div>
 <div class="col-md-5">
 	  <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan dan Unggah Gambar
         </button>
         <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset   
         </button>
   </div>
</div>

 <?php echo form_close(); ?>

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
			<TH>GAMBAR</TH>
			<th>JUDUL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td>1</td>
		<td>
			<img src="<?php echo base_url('assets/upload/image/thumbs/' .$room->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
		</td>
		<td><?php echo $room->nama_room ?></td> 
		<td>
			
		</td>
	</tr>

		<?php $no=2; foreach($gambar as $gambar){ ?>
	<tr>
		<td><?php echo $no ?></td>
		<td>
			<img src="<?php echo base_url('assets/upload/image/thumbs/' .$gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
		</td>
		<td><?php echo $gambar->judul_gambar ?></td> 
		<td>
			<a href="<?php echo base_url('admin/room/delete_gambar/'.$room->id_room.'/'.$gambar->id_gambar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
		</td>
	</tr>
		<?php $no++; }?>
	</tbody>
</table>