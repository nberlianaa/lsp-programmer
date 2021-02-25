<div class="hero-wrap" style="background-image: url('<?php echo base_url('assets/upload/image/'.$room->gambar) ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span>Room Detail</span></p>
	            <h1 class="mb-4 bread"><?php echo $title ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<div class="single-slider owl-carousel">
                <?php 
                  if($gambar) { 
                  foreach($gambar as $gambar) {
                ?>
                  <div class="item">
                    <div class="room-img" style="background-image: url('<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>');"></div>
                  </div>
                <?php
                    }
                  }
                ?>
          			</div>
          		</div>
          		<div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                <div class="col-xs-4">
              </div>
          		</div>
          		<div class="col-md-12 room-single ftco-animate mb-5 mt-4">
          		</div>
          	</div>
          </div> 
          <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <div class="booking">
                <h4 class="mb-2"><span>Harga</span></h4>
                <p>Rp. <?php echo number_format($room->harga,'0',',','.')?>/malam</p>
                <h4 class="mb-2"><span>Fasilitas</span></h4>
                <p><?php echo $room->fasilitas ?></p>
                <p>
                  <?php 
                  if($room->status == "1") {
                  echo anchor('booking/proses/'.$room->id_room,'<span class="btn btn-primary btn-block btn-flat">Booking Room</span>');
                  }else{
                    echo "<span class='btn btn-danger btn-block btn-flat'>Room Unvailable</span>";
                }?>
                </p>
              </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
    <!-- .section -->