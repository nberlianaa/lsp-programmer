<?php
//notifikasi eror
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/tipe/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
   <label class="col-md-2 control-label">Tipe Kamar</label>
         <div class="col-md-5">
         <input type="text" name="tipe_room" class="form-control" placeholder="Tipe Kamar" value="<?php echo set_value('tipe_room') ?>" required>
      </div>
 </div>

<div class="form-group">
   <label class="col-md-2 control-label">Nama Kamar</label>
         <div class="col-md-5">
         <input type="text" name="nama_room" class="form-control" placeholder="Nama Kamar" value="<?php echo set_value('nama_room') ?>" required>
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