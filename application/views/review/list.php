<div class="hero-wrap" style="background-image: url('<?php echo base_url() ?>assets/template/images/bg8.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span>Review</span></p>
	            <h1 class="mb-4 bread">Review</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

<?echo form_open(base_url('review')); ?>
		<section class="ftco-section contact-section bg-light">
        <div class="row block-9 ">
          <div class="col-md-6 order-md-last d-flex container">
            <form action="" method="post" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" name="nama_tamu" class="form-control" placeholder="Nama" value="<?php echo set_value('nama_tamu') ?>" required>
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
              </div>
              <div class="form-group">
                 <textarea name="comment" class="form-control" placeholder="Message"><?php echo set_value('comment') ?></textarea>
              </div>
              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary py-2 px-5">Send</button>
              </div>
            </form>
          </div> 
        </div>
      </section>
<?php echo form_close(); ?>