<div class="hero-wrap" style="background-image: url('<?php echo base_url() ?>assets/template/images/bg8.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span><?php echo $title ?></span></p>
              <h1 class="mb-4 bread"><?php echo $title ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

<?echo form_open(base_url('booking')); ?>

    <section class="ftco-section contact-section bg-light">
        <div class="row block-9 ">
          <div class="col-md-6 order-md-last d-flex container">
            <form action="" method="post" class="bg-white p-5 contact-form">
              <?php if($this->session->flashdata('sukses')){ ?>
                <div class="alert alert-success">
                <?php echo $this->session->flashdata('sukses'); ?>
                <a href = "<?php echo base_url('detail_booking')?>">Click Here</a>
              </div>
             <?php  }?>
               
              <div class="form-group">
                <td>Resort</td>
                <input type="text" name="nama_resort" class="form-control" placeholder="Resort" value="<?php echo $room->nama_resort?>" readonly>
              </div>
              <div class="form-group">
                <td>Nama Kamar</td>
                <input type="text" name="nama_room" class="form-control" placeholder="Nama Kamar" value="<?php echo $room->nama_room ?>" readonly>
              </div>
              <div class="form-group">
                <td>Nama Pemesan</td>
                <input type="text" name="nama_pemesan" class="form-control" placeholder="Nama Pemesan" value="<?php echo set_value('nama_pemesan') ?>" required>
              </div>  
              <div class="form-group">
                <td>Email</td>
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
              </div> 
              <div class="form-group">
                <td>Telepon</td>
                <input type="text" name="telepon" class="form-control" placeholder="telepon" value="<?php echo set_value('telepon') ?>" required>
              </div> 
              <div class="form-group">
                <label>Check In</label>
                <input type="date" name="checkin" class="form-control" placeholder="Check-in date" value="<?php echo set_value('checkin') ?>">
              </div>
              <div class="form-group">
                <label>Check Out</label>
                <input type="date" name="checkout" class="form-control" placeholder="Check-out date" value="<?php echo set_value('checkout') ?>">
              </div> 
              <div class="form-group">
                <td>Harga</td>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="<?php echo number_format($room->harga,'0',',','.')?>" readonly>
              </div>    
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary py-2 px-5">Send</button>
              </div>
            </form>
          </div> 
        </div>
      </section>
<?php echo form_close(); ?>