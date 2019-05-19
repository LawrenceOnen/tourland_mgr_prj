<!--============ End Page Title =====================================================================-->
<!--============ Hero Form ==========================================================================-->
<?php echo form_open('home'); ?>
    <div class="container">
        <!--Main Form-->
        <div class="main-search-form">
            <div class="form-row">
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label for="what" class="col-form-label">What?</label>
                        <input name="keyword" type="text" class="form-control" id="what" placeholder="What are you looking for?">
                    </div>
                    <!--end form-group-->
                </div>
                <!--end col-md-3-->
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label for="input-location" class="col-form-label">Where?</label>
                        <input name="location" type="text" class="form-control" value="<?php echo set_value('location'); ?>" id="input-location" placeholder="Enter Location">
                        <span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>
                    </div>
                    <!--end form-group-->
                </div>
                <!--end col-md-3-->
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label for="category" class="col-form-label">Category?</label>
                        <?php echo form_dropdown("category", $options); ?>

                    </div>
                    <!--end form-group-->
                </div>
                <!--end col-md-3-->
                <div class="col-md-3 col-sm-3">
                    <button type="submit" class="btn btn-primary width-100">Search</button>
                </div>
                <!--end col-md-3-->
            </div>
            <!--end form-row-->
        </div>
        <!--end main-search-form-->
        <!--Alternative Form-->
        <!--end alternative-search-form-->
    </div>
    <!--end container-->
</form>
<!--============ End Hero Form ======================================================================-->
<div class="background">
    <div class="background-image">
        <img src="<?php echo base_url(); ?>assets/img/bwindi.jpg" alt="">
    </div>
    <!--end background-image-->
</div>
<!--end background-->
</div>
<!--end hero-wrapper-->
</header>
<!--end hero-->
<!--*********************************************************************************************************-->
<!--************ CONTENT ************************************************************************************-->
<!--*********************************************************************************************************-->
<section class="content">
    <!--============ Featured Ads ===========================================================================-->
    <section class="block">
        <div class="container">
            <h2>Attraction Sites</h2>
            <div class="items grid grid-xl-3-items grid-lg-3-items grid-md-2-items">

              <?php  if(isset($object_list)){ ?>
                <?php if(sizeof($object_list)>1){ ?>
                  <?php foreach ($object_list as $variable){ ?>

                    <div class="item">
                        <div class="wrapper">
                            <div class="image">
                                <h3>
                                    <a href="#" class="tag category"><?php return_category($variable->category); ?></a>
                                    <a href="<?php echo base_url() . 'home/detail/'.$variable->reference; ?>" class="title"><?php echo $variable->name; ?></a>

                                </h3>
                                <a href="<?php echo base_url() . 'home/detail/'.$variable->reference; ?>" class="image-wrapper background-image">
                                     <img src="<?php if(isset($variable->image)){ echo $variable->image; }else{ echo base_url().'assets/img/machisonfalls.jpg'; } ?>" alt="">
                                    <!-- <img src="<?php echo base_url(); ?>assets/img/machisonfalls.jpg" alt=""> -->
                                </a>
                            </div>
                            <!--end image-->
                            <h4 class="location">
                                <a href="#"><?php echo $variable->location; ?></a>
                            </h4>

                            <div class="meta">
                                <figure>
                                    <i class="fa fa-calendar-o"></i>Open: <?php echo $variable->opening_time; ?> Close: <?php echo $variable->closing_time; ?>
                                </figure>
                                <figure>
                                    <a href="#">
                                        <i class="fa fa-user"></i>Jane Doe
                                    </a>
                                </figure>
                            </div>
                            <!--end meta-->
                            <div class="description">
                                <p><?php echo $variable->description; ?></p>
                            </div>
                            <!--end description-->
                            <a href="<?php echo base_url() . 'home/detail/'.$variable->reference; ?>" class="detail text-caps underline">Detail</a>
                        </div>
                    </div>
                    <!--end item-->
                  <?php } ?>
                <?php }else{ ?>
                  <div class="item">
                      <div class="wrapper">
                          <div class="image">
                              <h3>
                                  <a href="#" class="tag category"><?php return_category($object_list->category); ?></a>
                                  <a href="<?php echo base_url() . 'home/detail/'.$object_list->reference; ?>" class="title"><?php echo $object_list->name; ?></a>

                              </h3>
                              <a href="<?php echo base_url() . 'home/detail/'.$object_list->reference; ?>" class="image-wrapper background-image">
                                   <img src="<?php if(isset($object_list->image)){ echo $object_list->image; }else{ echo base_url().'assets/img/machisonfalls.jpg'; } ?>" alt="">
                                  <!-- <img src="<?php echo base_url(); ?>assets/img/machisonfalls.jpg" alt=""> -->
                              </a>
                          </div>
                          <!--end image-->
                          <h4 class="location">
                              <a href="#"><?php echo $object_list->location; ?></a>
                          </h4>
                          <!-- <div class="price"></div> -->
                          <div class="meta">
                              <figure>
                                  <i class="fa fa-calendar-o"></i>Open: <?php echo $object_list->opening_time; ?> Close: <?php echo $object_list->closing_time; ?>
                              </figure>
                              <figure>
                                  <a href="#">
                                      <i class="fa fa-user"></i>Jane Doe
                                  </a>
                              </figure>
                          </div>
                          <!--end meta-->
                          <div class="description">
                              <p><?php echo $object_list->description; ?></p>
                          </div>
                          <!--end description-->
                          <a href="<?php echo base_url() . 'home/detail/'.$object_list->reference; ?>" class="detail text-caps underline">Detail</a>
                      </div>
                  </div>
                  <!--end item-->
                <?php } ?>
              <?php } ?>
            </div>
        </div>
    </section>
    <!--============ End Featured Ads =======================================================================-->
    <!--============ Features Steps =========================================================================-->
    <section class="block">
        <div class="container">
            <div class="block">
                <h2>Service Providers</h2>
                <div class="row">

                    <?php foreach ($serviceProviders->serviceProvider as $key) {?>

                      <div class="col-md-3">
                          <div class="feature-box">
                              <figure>
                                  

                              </figure>
                              <h3>Name: <?php print_r($key->name); ?></h3>
                              <p>Email: <?php print_r($key->email); ?></p>
                              <p>Location: <?php print_r($key->location); ?></p>
                          </div>
                          <!--end feature-box-->
                      </div>
                    <?php } ?>
                </div>
                <!--end row-->
            </div>
            <!--end block-->
        </div>
        <!--end container-->
        <div class="background" data-background-color="#fff"></div>
        <!--end background-->
    </section>
    <!--end block-->
    <!--============ End Features Steps =====================================================================-->


</section>
<!--end content-->
