<?php
//loading konfigurasi website
$site = $this->konfigurasi_model->listing();
?>


<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Pesisir Selatan</h2>
              <p>Negeri Sejuta Pesona</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Useful Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('about')?>" class="py-2 d-block">About Us</a></li>
                <li><a href="<?php echo base_url('room')?>" class="py-2 d-block">Rooms</a></li>
                <li><a href="<?php echo base_url('review')?>" class="py-2 d-block">Review</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Kabupaten Pesisir Selatan, IND</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 813 1680 0877</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">nberlianaa60@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>Pesisir Selatan Resort | Negeri Sejuta Pesona <i class="icon-heart color-danger" aria-hidden="true"></i> Since2020 </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo base_url() ?>assets/template/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/aos.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/bootstrap-datepicker.js"></script>
  <!-- // <script src="js/jquery.timepicker.min.js"></script> -->
  <script src="<?php echo base_url() ?>assets/template/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url() ?>assets/template/js/google-map.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/main.js"></script>
    
  </body>
</html>