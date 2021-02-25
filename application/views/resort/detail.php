<div class="hero-wrap" style="background-image: url('<?php echo base_url('assets/upload/image/'.$resort->gambarr) ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span>Resort Detail</span></p>
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
                  if($gambarr) { 
                  foreach($gambarr as $gambarr) {
                ?>
                  <div class="item">
                    <div class="room-img" style="background-image: url('<?php echo base_url('assets/upload/image/'.$gambarr->gambarr) ?>');"></div>
                  </div>
                <?php
                    }
                  }
                ?>
          			</div>
          		</div>

          		<div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
          			<h2 class="mb-4"><span>About <?php echo $title ?> </span></h2>
    						<p> <?php echo $resort->keterangan ?></p>
          		</div>
          		<div class="col-md-12 room-single ftco-animate mb-5 mt-4">
          		</div>
          	</div>
          </div> 
          <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                  <?php 
                    if($id_resort=1) {
                    foreach ($tipe as $tipe) {  ?>
                    <li><a href="<?php echo base_url('room/detail/'.$tipe->slug_tipe)?>"><?php echo $tipe->nama_room ?><span>(<?php echo $tipe->tipe_room ?>)</span></a></li>
                  <?php }} ?>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
    <!-- .section -->