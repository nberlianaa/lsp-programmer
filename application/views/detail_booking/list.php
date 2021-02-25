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

   <section class="ftco-section contact-section bg-light">
   	     <div class="col-md-6 order-md-last d-flex container">
            <form action="" method="post" class="p-5 contact-form">
            	<p>Pembatalan booking hanya dapat dilakukan 1 jam setelah proses booking berhasil. Jika pesanan anda sudah benar segera klik Send Email untuk bukti pemesanan anda. Untuk melakukan pembayaran dapat dilakukan saat anda sudah berada di Resort pilihan anda.</p>
              <?php if($this->session->flashdata('sukses')){ ?>
                <div class="alert alert-success">
                <?php echo $this->session->flashdata('sukses'); ?>
              </div>
             <?php  }?>
               </form>
           </div>
        <div class="row block-12 ">
          <div class="col-md-10 order-md-last d-flex container">
			<table class="table table-bordered" id="example1">
			<thead>
				<tr>
					<th>RESORT</th>
					<th>NAMA KAMAR</th>
					<th>NAMA PEMESAN</th>
					<th>CHECK IN</th>
					<th>CHECK OUT</th>
					<th>HARGA</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach($booking as $booking){ ?>
			<tr>
				<td><?php echo $booking->nama_resort ?></td>
				<td><?php echo $booking->nama_room ?></td>
				<td><?php echo $booking->nama_pemesan ?></td>
				<td><?php echo $booking->checkin ?></td>
				<td><?php echo $booking->checkout ?></td>
				<td><?php echo number_format($booking->harga,'0',',','.') ?></td>
				<td>
					<a href="<?php echo base_url('detail_booking/delete/' .$booking->id_booking) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Cancel Booking? Proses cancel booking bisa dilakukan selama 1 jam dari proses booking dilakukan.')"><i class="fa fa-trash-o"></i>Cancel Booking</a>

					<a href="<?php echo base_url('detail_booking/send/' .$booking->id_booking) ?>" class="btn btn-success btn-xs"><i class="fa fa-trash-o"></i>Send Email</a>
				</td>
			</tr>
				<?php }?>
			</tbody>
		</table>
		</div>
       </div> 
      </div>
    </section>

