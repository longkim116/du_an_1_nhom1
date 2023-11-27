<?php
get_header();
?>
<main>
    <!-- blog details area start -->

    <section class="tp-postbox-details-area pb-120 pt-95">
        <div class="container">
            <div class="breadcrumb__list">
                <span><a href="trang-chu.html">Trang chủ</a></span>
                <span><a href="bai-viet.html">Tin tức</a></span>
                <span><?php echo $detail_blog['slug'] ?></span>
            </div>
            <div class="row">
                <div class="col-xl-9">
                    <div class="tp-postbox-details-top">
                        <h3 class="tp-postbox-details-title"><?php echo $detail_blog['post_title'] ?></h3>
                        <div class="tp-postbox-details-meta mb-50">
                            <span data-meta="author">
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.4104 8C9.33922 8 10.9028 6.433 10.9028 4.5C10.9028 2.567 9.33922 1 7.4104 1C5.48159 1 3.91797 2.567 3.91797 4.5C3.91797 6.433 5.48159 8 7.4104 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13.4102 15.0001C13.4102 12.2911 10.721 10.1001 7.41016 10.1001C4.09933 10.1001 1.41016 12.2911 1.41016 15.0001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                By <a href="#">Autosmart</a>
                            </span>
                            <span>
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.5972 10.7259L8.42721 9.43093C8.04921 9.20693 7.74121 8.66793 7.74121 8.22693V5.35693" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <?php echo $detail_blog['created_date'] ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="tp-postbox-details-thumb">
                        <img style="width: 100%;" src="admin/img/<?php echo $detail_blog['post_img'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="tp-postbox-details-main-wrapper">
                        <div class="tp-postbox-details-content">
                            <?php echo $detail_blog['post_content'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog details area end -->


</main>
<?php
get_footer();
?>