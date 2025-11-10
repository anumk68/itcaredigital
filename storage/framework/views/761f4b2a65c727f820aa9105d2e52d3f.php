<?php $__env->startSection('content'); ?>

<style>
    .contact-box::before {
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
  
    left: -20%;
    background-repeat: no-repeat;
    background-position: center;
    top: 33%;

}
.contact-area {
    background: url("<?php echo e(asset('public/frontend/assets/images/contact-bg2.png')); ?>");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 120px 0 120px;
    position: relative;
}
        .breadcumb-area {

            background: url("<?php echo e(asset('public/frontend/assets/images/inner/breadcumb-bg.png')); ?>");
            padding: 230px 0 170px;
            background-repeat: no-repeat;
            background-size: contain;
            position: relative;
            margin: -77px 0px 0 -16px;
        }
    
/*inner page */
.breadcumb-area {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}

</style>


<!--==================================================-->
<!-- Start solutek breadcumb Area -->
<!--==================================================-->
<div class="breadcumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcumb-content">
					<h1>Contact</h1>
					<ul class="breadcumb-list">
						<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
						<li class="list-arrow">&lt;</li>
						<li>Contact</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- end solutek breadcumb Area -->
<!--==================================================-->




<!--==================================================-->
<!-- Start solutek contact Area -->
<!--==================================================-->

<div class="contact-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="section-title text-left">
					<h5 class="section-sub-title">CONTACT US</h5>
					<h2 class="section-main-title">Make an Online Appoinemnt Booking</h2>
					<h2 class="section-main-title">For Business Planing.</h2>
				</div>
					<div class="contact_from_box">
						
                        <?php echo $__env->make('frontend.common-form.commonForm', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
					<div id="status" class="error"></div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="contact-box">
					<div class="contact-video-icon">
						<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://www.youtube.com/watch?v=Wx48y_fOfiY">Play</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--==================================================-->
<!-- end solutek contact Area -->
<!--==================================================-->




<!--==================================================-->
<!-- Start solutek google map area-->
<!--==================================================-->

<!--==================================================-->
<!--End solutek google map area-->
<!--==================================================-->




<!--==================================================-->
<!-- Start solutek address Area -->
<!--==================================================-->


    <div class="address-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="address-box">
                        <div class="address-icon">
                            <img src="<?php echo e(asset('public/frontend/assets/images/address1.png')); ?>"
                                alt="custom seo and web design">
                        </div>
                        <div class="address-title">
                            <h3>Elevating Customer Experience.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="address-box2">
                        <div class="address-icon" style="font-size: 32px;  color: #fff;">
                           <i class="fa fa-envelope"></i>
                        </div>
                        <div class="solutek-btn">
                          <a>contact@itcaredigital.com
                                <div class="solutek-hover-btn hover-bx"></div>
                                <div class="solutek-hover-btn hover-bx2"></div>
                                <div class="solutek-hover-btn hover-bx3"></div>
                                <div class="solutek-hover-btn hover-bx4"></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<!--==================================================-->
<!-- end solutek address Area -->
<!--==================================================-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/prinhhby/itcaredigital.com/resources/views/frontend/contact.blade.php ENDPATH**/ ?>