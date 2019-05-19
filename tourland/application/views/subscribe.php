<div class="page-title">
    <div class="container clearfix">
        <div class="float-left float-xs-none">
            <h1>Subscribe

            </h1>

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
                      <!--end col-md-4-->
                        <div class="col-md-8">
                            <h2>Subscription Form</h2>
                            <div style="color:red"><?php if(isset($error)){ echo $error;} ?></div>
                            <?php echo form_open('subscribe'); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label required">Your Name</label>
                                            <input name="name" type="text" class="form-control" id="name" value="<?php echo set_value('name'); ?>"  placeholder="Your Name" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="col-form-label required">Your Email</label>
                                            <input name="email" type="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>" placeholder="Your Email" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                </div>
                                <!--end row-->
                                <div class="form-group">
                                    <label for="subject" class="col-form-label">Country</label>
                                    <select name="country">
                                      <option value="" <?php echo  set_select('country', '', TRUE); ?> >Select a Country</option>
                                      <option value="UG" <?php echo  set_select('country', 'UG'); ?>>Uganda</option>
                                      <option value="KE" <?php echo  set_select('country', 'KE'); ?>>Kenya</option>
                                      <option value="TZ" <?php echo  set_select('country', 'TZ'); ?>>Tanzania</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="subject" class="col-form-label">Attraction Site Categories</label>
                                    <?php echo form_multiselect('category[]', $options); ?>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="subject" class="col-form-label">Attraction Site Categories</label>
                                    <select multiple name="category">
                                      <option value="" <?php echo  set_select('country', '', TRUE); ?> >Select a Country</option>
                                      <option value="UG" <?php echo  set_select('country', 'UG'); ?>>Uganda</option>
                                      <option value="KE" <?php echo  set_select('country', 'KE'); ?>>Kenya</option>
                                      <option value="TZ" <?php echo  set_select('country', 'TZ'); ?>>Tanzania</option>
                                    </select>

                                </div> -->

                                <!--end form-group-->
                                <button type="submit" class="btn btn-primary float-right">Subscribe</button>
                            </form>
                            <!--end form-->
                        </div>
                        <!--end col-md-8 -->
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->
        <!--end content-->
