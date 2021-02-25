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
echo form_open_multipart(base_url('admin/resort/edit/' .$resort->id_resort),' class="form-horizontal"');
?>

<div class="form-group">
   <label class="col-md-2 control-label">Resort</label>
         <div class="col-md-5">
         <input type="text" name="nama_resort" class="form-control" placeholder="Nama Resort" value="<?php echo $resort->nama_resort ?>" required>
      </div>
 </div>

<div class="form-group">
   <label class="col-md-2 control-label">Keterangan</label>
         <div class="col-md-5">
         <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $resort->keterangan ?></textarea>
      </div>
</div>

<div class="form-group">
   <label class="col-md-2 control-label">Upload Gambar Resort</label>
         <div class="col-md-5">
         <input type="file" name="gambarr" class="form-control" >
      </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
      <div class="col-md-5">
         <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i>Simpan
         </button>
         <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times"></i>Reset
         </button>
      </div>
 </div>


 <?php echo form_close(); ?>