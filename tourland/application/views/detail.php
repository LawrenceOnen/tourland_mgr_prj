<div class="page-title">
    <div class="container clearfix">
        <div class="float-left float-xs-none">
            <h1><?php echo $object_list->name; ?>
                <span class="tag"><?php return_category($object_list->category); ?></span>
            </h1>
            <h4 class="location">
                <a href="#"><?php echo $object_list->location; ?></a>
            </h4>
        </div>

    </div>
    <!--end container-->
</div>
<!--============ End Page Title =====================================================================-->
<div class="background"></div>
<!--end background-->
</div>
<!--end hero-wrapper-->
</section>
<!--end hero-->
<!--end hero-->
<!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="content">
            <section class="block">
                <div class="container">
                    <div class="row">
                        <!--============ Listing Detail =============================================================-->
                        <div class="col-md-9">
                          <!--Gallery Carousel-->
                            <section>

                                <!--end section-title-->
                                <img src="<?php if(isset($variable->image)){ echo $variable->image; }else{ echo base_url().'assets/img/machisonfalls.jpg'; } ?>" alt="">


                            </section>
                            <!--Description-->
                            <section>
                                <h2>Description</h2>
                                <p>
                                  <?php echo $object_list->description; ?>
                                </p>
                            </section>
                            <!--end Description-->
                            <!--Details & Location-->
                            <section>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h2>Details</h2>
                                        <dl>
                                            <dt>Open Time</dt>
                                            <dd><?php echo $object_list->opening_time; ?></dd>
                                            <dt>Close Time</dt>
                                            <dd><?php echo $object_list->closing_time; ?></dd>
                                            <dt>Phone Number</dt>
                                            <dd><?php echo $object_list->phoneNumber; ?></dd>
                                            <dt>Email</dt>
                                            <dd><?php echo $object_list->email; ?></dd>
                                            <dt>Address</dt>
                                            <dd><?php echo $object_list->address; ?></dd>
                                            <dt>Website</dt>
                                            <dd><a href="<?php echo $object_list->website; ?>">Open Site</a></dd>
                                            <dt>Category</dt>
                                            <dd><br><?php return_category($object_list->category); ?></dd>
                                            <dt>Wether Forecast</dt>
                                            <dd><?php echo $object_list->weather->main; ?></dd>
                                            <dt>Wether Forecast<br> Description</dt>
                                            <dd><img src="<?php echo 'http://openweathermap.org/img/w/'.$object_list->weather->icon.'.png'; ?>" ></dd>
                                            <dd><?php echo $object_list->weather->description; ?></dd>
                                            <dt></dt>
                                            </dl>
                                    </div>

                                    <div class="col-md-8">
                                        <h2>Location</h2>
                                        <div class="map height-300px" id="map-small"></div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <h2>Activities</h2>
                                    <?php if(sizeof($object_list->activities->activity)>1){ ?>
                                      <?php foreach ($object_list->activities->activity as $key) { ?>
                                          <h3><strong><?php echo $key->detail->name; ?></strong></h3>
                                          <?php echo $key->detail->description; ?>
                                          <br>
                                      <?php } ?>
                                    <?php }else{ ?>
                                      <h3><strong><?php echo $object_list->activities->activity->detail->name; ?></strong></h3>
                                      <?php echo $object_list->activities->activity->detail->description; ?>
                                      <br>
                                  <?php } ?>
                                  </div>
                                </div>
                            </section>
                            <!--end Details and Locations-->


                        </div>
                        <!--============ End Listing Detail =========================================================-->
                        <!--============ Sidebar ====================================================================-->
                      
                        <!--============ End Sidebar ================================================================-->
                    </div>
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->
