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
echo form_open_multipart(base_url('admin/room/tambah'),' class="form-horizontal"');
?>

 <div class="form-group">
   <label class="col-md-2 control-label">Resort</label>
      <div class="col-md-5">
         <select name="id_resort" class="form-control">
            <?php foreach($resort as $resort) { ?>
               <option value= "<?php echo $resort->id_resort ?>">
                  <?php echo $resort->nama_resort ?>
               </option>
            <?php } ?>
         </select>
      </div>
 </div>

 <div class="form-group">
   <label class="col-md-2 control-label">Kode Kamar</label>
         <div class="col-md-5">
         <input type="text" name="kode_room" class="form-control" placeholder="Kode Kamar" value="<?php echo set_value('kode_room') ?>" required>
      </div>
 </div>

 <div class="form-group">
   <label class="col-md-2 control-label">Nama Kamar</label>
         <div class="col-md-5">
         <input type="text" name="nama_room" class="form-control" placeholder="Nama Kamar" value="<?php echo set_value('nama_room') ?>" required>
      </div>
 </div>

 <div class="form-group">
   <label class="col-md-2 control-label">Tipe Kamar</label>
      <div class="col-md-5">
         <select name="id_tipe" class="form-control">
            <?php foreach($tipe as $tipe) { ?>
               <option value= "<?php echo $tipe->id_tipe ?>">
                  <?php echo $tipe->tipe_room ?>
               </option>
            <?php } ?>
         </select>
      </div>
 </div>

  <div class="form-group">
   <label class="col-md-2 control-label">Fasilitas</label>
         <div class="col-md-5">
         <textarea name="fasilitas" class="form-control" placeholder="Fasilitas"><?php echo set_value('fasilitas') ?></textarea>
      </div>
 </div>

 <div class="form-group">
   <label class="col-md-2 control-label">Status</label>
      <div class="col-md-5">
         <select name="status" class="form-control">
            <option value="">--Pilih Status--</option>
            <option value="1">Tersedia</option>
            <option value="0">Tidak Tersedia</option>
         </select>
      </div>
 </div>

 <div class="form-group">
   <label class="col-md-2 control-label">Harga</label>
         <div class="col-md-5">
         <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo set_value('harga') ?>" required>
      </div>
 </div>

<div class="form-group">
   <label class="col-md-2 control-label">Upload Gambar Produk</label>
         <div class="col-md-5">
         <input type="file" name="gambar" class="form-control" required="required">
      </div>
 </div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
      <div class="col-md-5">
         <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
         </button>
         <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
         </button>
      </div>
 </div>

 <?php echo form_close(); ?>