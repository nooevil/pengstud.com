<?php
/*
Template Name: Amazon page EN
Template Post Type: page
*/
$bodyClass = 'amazon-page amazon-page-en';
$divClass = 'first_gradient';
get_header(en);
?>

  

  <section class="profit_amazon">
    <div class="profit_amazon_bg wow slideInRight" data-wow-duration="1.5s" data-wow-delay="0">
    </div>
    <div class="profit_amazon_bg__mobile">
      <div class="wrapper container">
        <img src="<?php echo REL_ASSETS_URI ?>img/amazon/Group.png" alt="" class="img-responsive img-width">
      </div>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 col-md-6 amazon_title">
          <div class="section_title__holder">
            <h1 class="title">Set up and optimization of Amazon ads with the focus on <span class="amazon_tools__color">ACOS</span> and <span class="amazon_tools__color">Profit</span></h1>
          </div>
          <div class="profit_amazon_link__holder">
              <a href="#" class="section_link profit_amazon_link" data-simple_modal="modal1">Order a consultation</a>
          </div>
        </div>
      </div>
    </div>
    </section>
  <section class="amazon_campaign">
        <div class="amazon_campaign_bg wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0"></div>
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Management of advertising campaigns in Amazon
                </h2>
                <h3>
                    The management of advertising campaigns includes the following activities:
                </h3>
            </div>
            <div class="row align-items-center">
              <div class="col-lg-4 d-lg-block d-none">
              </div>
                <div class="col-lg-8">
                    <ul class="shopping_list">
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">1</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Audit and optimization of products listing.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">2</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Creation and implementation of a promotion strategy on Amazon.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">3</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Creation of Sponsored Products + Sponsored Brands campaigns with different targeting settings.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">4</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Micro-management of bids, based on the performance of ACOS and Profit of the advertising campaign.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">5</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Optimization of search queries and negative keywords.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">6</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Creation of the convenient SPAG (single product = ad group) or <br>SCAG (single category = ad group) advertising campaign structure.
                                </h3>
                            </div>
                        </li>                                                
                    </ul>
                    <a href="#" class="section_link shopping_link" data-simple_modal="modal1">Order an audit</a>
                </div>
            </div>
        </div>
    </section>
  <section class="amazon-rates">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Manage rates based on ACOS or ROI
                </h2>
                <h3>
                    While managing bids, Penguin-team specialists use two different approaches.<br>They conduct a test and select the most effective one for the advertiser.
                </h3>
            </div>
            <div class="amazon-rates_banner__holder">
                <?php
                    $img = get_post_meta($post->ID, 'rates_banner', true);
                    $imgLinkPreview = wp_get_attachment_image_url($img, 'full');
                ?>
                    <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
                
            </div>
            <div class="approaches">
              <div class=approach>
                <h3>
                  Bidding based on <span class="approach-title">ACOS</span>
                </h3>
                <h4>
                  TargetCPC = MaxACOS/ACOS * CPC
                </h4>
              </div> 
              <div class=approach>
                <h3>
                  Bidding based on <span class="approach-title">ROI according to the product</span>
                </h3>
                <h4>
                  TargetCPC = product price * margin *<br>conversion rate * investment rate 
                </h4>
              </div> 
            </div>
            
        </div>
    </section>
    <section class="google">
      <div class="wrapper container">
        <div class="google_content">
          <div class="row align-items-center">
            <div class="col-lg">
              <h3 class="google_info">
                Penguin-team - Premier Google Partner Agency since 2017. We help advertisers to get the best results in Search and display network.
              </h3>
            </div>
            <div class="col-lg-auto mt-lg-2 mt-0">
              <div class="google_logo__holder">
                <a href="<?php echo REL_ASSETS_URI ?>img/en/google_logo.jpg" data-fancybox data-caption="Google">
                  <img class="img-responsive img-width" src="<?php echo REL_ASSETS_URI ?>img/en/google_logo.png" alt=""/>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

  <section class="feedback mt-5 mb-5">
    <div class="wrapper container">
      <form method="post" class="feedback_form wps_form_js">
        <input type="hidden" name="form_subject"  value="Get Free Audit Amazon">
        <input type="hidden" name="form_title"    value="Get Free Audit Amazon">
        <input type="hidden" name="form_redirect" value="thanks-for-requesting-amazon-account-audit/">
        <h3 class="feedback_form__title">Free consultation on set up/optimization of Amazon Ads</h3>
        <p class="feedback_form__text">
          Order a free consultation on setting up and optimizing advertising campaigns on Amazon. Find out how Penguin-team can help you improve <br>your advertising on Amazon.
        </p>
        <div class="feedback_form__row">
          <div class="feedback_form__input_holder">
            <input type="text" name="Name" placeholder="Name" required>
          </div>
          <div class="feedback_form__input_holder">
            <input type="text" name="Company" placeholder="Company" required>
          </div>
        </div>
        <div class="feedback_form__row">
          <div class="feedback_form__input_holder">
            <input type="email" name="Email" placeholder="Corporate E-mail" required>
          </div>
          <div class="feedback_form__input_holder">
            <input class="" type="tel" name="Phone" placeholder="Telephone Number" required>
          </div>
        </div>
        <div class="feedback_form__textarea_holder">
          <textarea name="Message" placeholder="Message"></textarea>
        </div>
        <div class="feedback_form__submit_holder">
          <button class="feedback_form__submit section_link" type="submit">Send</button>
        </div>
      </form>
    </div>
  </section>

</div>

<div class="simpleModalWindowWrap modal1">
    <div class="simpleModalTable">
        <div class="simpleModalCell">
            <div class="simpleModalWindow feedback_form_holder">
                <span class="simpleModalWindowClose"></span>
                <form method="post" class="feedback_form wps_form_js">
                    <input type="hidden" name="form_subject"  value="Get Free Audit Amazon">
                    <input type="hidden" name="form_title"    value="Get Free Audit Amazon">
                    <input type="hidden" name="form_redirect" value="thanks-for-requesting-amazon-account-audit/">
                     <p class="feedback_form__title">Free consultation on<br>set up/optimization of Amazon Ads</p>
                <p class="feedback_form__text">
                    Order a free consultation on setting up and optimizing advertising campaigns on Amazon. Find out how Penguin-team can help you improve <br>your advertising on Amazon.
                </p>
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Name" placeholder="Name" required>
                        </div>
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Company" placeholder="Company" required>
                        </div>
                    </div>
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="email" name="Email" placeholder="Corporate E-mail" required>
                        </div>
                        <div class="feedback_form__input_holder">
                            <input class="" type="tel" name="Phone" placeholder="Telephone Number" required>
                        </div>
                    </div>
                    <div class="feedback_form__textarea_holder">
                        <textarea name="Message" placeholder="Message"></textarea>
                    </div>
                    <div class="feedback_form__submit_holder">
                        <button class="feedback_form__submit section_link" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php get_footer(); ?>