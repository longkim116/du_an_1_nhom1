<?php
get_header();
?>
<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title"> <?php echo $list_page['page_title'] ?></h3>
                        <div class="breadcrumb__list">
                            <span><a href="trang-chu.html">Trang chủ</a></span>
                            <span><?php echo $list_page['page_title'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->


    <!-- contact area start -->
    <section class="tp-contact-area pb-100">
        <div class="container">
            <div class="tp-contact-inner">
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="tp-contact-wrapper">
                            <?php echo $list_page['page_content'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->

    <!-- map area start -->
    <section class="tp-map-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-map-wrapper">
                        <div class="tp-map-hotspot">
                            <span class="tp-hotspot tp-pulse-border">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6" cy="6" r="6" fill="#821F40" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-map-iframe">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8420.201380351864!2d105.74669299054153!3d21.041126335538316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1701067444848!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- map area end -->

</main>

<!-- End content  -->
<?php
get_footer();
?>