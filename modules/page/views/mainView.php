<?php
get_header();
?>
<main>

    <!-- section title area start -->
    <section class="tp-section-title-area pt-95 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="tp-section-title-wrapper-7">
                        <span class="tp-section-title-pre-7">Tin tức</span>
                        <h3 class="tp-section-title-7">Những thông tin bổ ích<br>Mới nhất về Autosmart</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section title area end -->


    <!-- blog grid area start -->
    <section class="tp-blog-grid-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="tp-blog-grid-wrapper">
                        <div class="tp-blog-grid-top d-flex justify-content-between mb-40">
                            <div class="tp-blog-grid-result">
                                <p>Hiển thị <?php echo count($list_posts) ?>– trên <?php echo count($mun_posts) ?> bài viết</p>
                            </div>
                            <div class="tp-blog-grid-tab tp-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.3328 6.01317V2.9865C16.3328 2.0465 15.9061 1.6665 14.8461 1.6665H12.1528C11.0928 1.6665 10.6661 2.0465 10.6661 2.9865V6.0065C10.6661 6.95317 11.0928 7.3265 12.1528 7.3265H14.8461C15.9061 7.33317 16.3328 6.95317 16.3328 6.01317Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.3328 15.18V12.4867C16.3328 11.4267 15.9061 11 14.8461 11H12.1528C11.0928 11 10.6661 11.4267 10.6661 12.4867V15.18C10.6661 16.24 11.0928 16.6667 12.1528 16.6667H14.8461C15.9061 16.6667 16.3328 16.24 16.3328 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.33281 6.01317V2.9865C7.33281 2.0465 6.90614 1.6665 5.84614 1.6665H3.1528C2.0928 1.6665 1.66614 2.0465 1.66614 2.9865V6.0065C1.66614 6.95317 2.0928 7.3265 3.1528 7.3265H5.84614C6.90614 7.33317 7.33281 6.95317 7.33281 6.01317Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.33281 15.18V12.4867C7.33281 11.4267 6.90614 11 5.84614 11H3.1528C2.0928 11 1.66614 11.4267 1.66614 12.4867V15.18C1.66614 16.24 2.0928 16.6667 3.1528 16.6667H5.84614C6.90614 16.6667 7.33281 16.24 7.33281 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="nav-link active" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false">
                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 7.11133H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                        </div> <!-- top end -->

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab" tabindex="0">
                                <!-- blog grid item wrapper -->
                                <div class="tp-blog-grid-item-wrapper">
                                    <div class="row tp-gx-30">
                                        <?php if (!empty($list_posts)) :
                                            foreach ($list_posts as $item) :
                                        ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="tp-blog-grid-item p-relative mb-30">
                                                        <div class="tp-blog-grid-thumb w-img fix mb-30">
                                                            <a href="bai-viet/<?php echo create_slug($item['slug']) . "-" . $item['post_id'] . ".html"; ?>">
                                                                <img src="admin/img/<?php echo $item['post_img'] ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="tp-blog-grid-content">
                                                            <div class="tp-blog-grid-meta">
                                                                <span>
                                                                    <span>
                                                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M10.5972 10.7259L8.42715 9.43093C8.04915 9.20693 7.74115 8.66793 7.74115 8.22693V5.35693" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                    </span>
                                                                    <?php echo $item['created_date'] ?>
                                                                </span>
                                                            </div>
                                                            <h3 class="tp-blog-grid-title">
                                                                <a href="bai-viet/<?php echo create_slug($item['slug']) . "-" . $item['post_id'] . ".html"; ?>"><?php echo $item['post_title'] ?></a>
                                                            </h3>
                                                            <p><?php echo $item['post_title'] ?></p>

                                                            <div class="tp-blog-grid-btn">
                                                                <a href="bai-viet/<?php echo create_slug($item['slug']) . "-" . $item['post_id'] . ".html"; ?>" class="tp-link-btn-3">
                                                                    Xem thêm
                                                                    <span>
                                                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab" tabindex="0">
                                <!-- blog list wrapper -->
                                <div class="tp-blog-list-item-wrapper">
                                    <?php if (!empty($list_posts)) :
                                        foreach ($list_posts as $item) :
                                    ?>
                                            <div class="tp-blog-list-item d-md-flex d-lg-block d-xl-flex">
                                                <div class="tp-blog-list-thumb">
                                                    <a href="bai-viet/<?php echo create_slug($item['slug']) . "-" . $item['post_id'] . ".html"; ?>">
                                                        <img src="admin/img/<?php echo $item['post_img'] ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="tp-blog-list-content">
                                                    <div class="tp-blog-grid-content">
                                                        <div class="tp-blog-grid-meta">
                                                            <span>
                                                                <span>
                                                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M10.5972 10.7259L8.42715 9.43093C8.04915 9.20693 7.74115 8.66793 7.74115 8.22693V5.35693" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <?php echo $item['created_date'] ?>
                                                            </span>
                                                        </div>
                                                        <h3 class="tp-blog-grid-title">
                                                            <a href="bai-viet/<?php echo create_slug($item['slug']) . "-" . $item['post_id'] . ".html"; ?>"><?php echo $item['post_title'] ?></a>
                                                        </h3>
                                                        <div class="tp-blog-grid-btn">
                                                            <a href="bai-viet/<?php echo create_slug($item['slug']) . "-" . $item['post_id'] . ".html"; ?>" class="tp-link-btn-3">
                                                                Xem thêm
                                                                <span>
                                                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="tp-blog-pagination mt-30">
                                        <div class="tp-pagination">
                                            <nav>
                                                <?php echo get_padding($total_page) ?>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog grid area end -->

</main>
<?php
get_footer();
?>