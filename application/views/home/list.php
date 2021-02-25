<div class="hero">
      <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image:url(<?php echo base_url() ?>assets/template/images/bg1.jpeg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-8 ftco-animate">
              <div class="text mb-5 pb-5">
                <h1 class="mb-3">Pesisir Selatan Resort</h1>
                <h2>A Luxuries Hotel with Nature</h2>
              </div>
            </div>
          </div>
          </div>
        </div>

        <div class="slider-item" style="background-image:url(<?php echo base_url() ?>assets/template/images/bg2.jpeg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-8 ftco-animate">
              <div class="text mb-5 pb-5">
                <h1 class="mb-3">Pesisir Selatan Booking Resort</h1>
                <h2>Pesisir Selatan Negeri Sejuta Pesona</h2>
              </div>
            </div>
          </div>
          </div>
        </div>
      </section>
    </div>

    <section class="ftco-section bg-light ftco-room">
      <div class="container-fluid px-0">
        <div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Pesisir Selatan Resort</span>
            <h2 class="mb-4">A Luxuries Resort with Nature</h2>
          </div>
        </div>  
        <div class="row no-gutters">
          <?php foreach($resort as $resort) { ?>
          <div class="col-lg-6">
            <div class="room-wrap d-md-flex">
              <a href="<?php echo base_url('resort/detail/'.$resort->nama)?>" class="img" style="background-image: url(<?php echo base_url('assets/upload/image/'.$resort->gambarr) ?>);"></a>
              <div class="half left-arrow d-flex align-items-center">
                <div class="text p-4 p-xl-5 text-center">
                  <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                  <h3 class="mb-3"><a href="<?php echo base_url('resort/detail/'.$resort->nama)?>"><?php echo $resort->nama_resort ?></a></h3>
                  <p class="pt-1"><a href="<?php echo base_url('resort/detail/'.$resort->nama)?>" class="btn-custom px-3 py-2">View Resort Details <span class="icon-long-arrow-right"></span></a></p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section>


    <section class="instagram">
      <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-sm-12 col-md ftco-animate">
            <a href="<?php echo base_url() ?>assets/template/images/ig1.jpeg" class="insta-img image-popup" style="background-image: url(<?php echo base_url() ?>assets/template/images/ig1.jpeg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="<?php echo base_url() ?>assets/template/images/ig2.jpeg" class="insta-img image-popup" style="background-image: url(<?php echo base_url() ?>assets/template/images/ig2.jpeg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="<?php echo base_url() ?>assets/template/images/ig3.jpeg" class="insta-img image-popup" style="background-image: url(<?php echo base_url() ?>assets/template/images/ig3.jpeg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="<?php echo base_url() ?>assets/template/images/ig4.jpeg" class="insta-img image-popup" style="background-image: url(<?php echo base_url() ?>assets/template/images/ig4.jpeg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="<?php echo base_url() ?>assets/template/images/ig5.jpeg" class="insta-img image-popup" style="background-image: url(<?php echo base_url() ?>assets/template/images/ig5.jpeg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>