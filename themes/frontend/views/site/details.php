<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.countdown.css">
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.countdown.js"></script>


<?php

$date = explode('-', date("Y-m-d", $deal->deal_end_date));
$time = explode(':', date("H:i:s", $deal->deal_end_date));


Yii::app()->clientScript->registerScript('details',"

    var newYear = new Date();
    newYear = new Date(".$date[0].", ".$date[1]." - 1, ".$date[2].",".$time[0].",".$time[1].",".$time[2].");
    $('#timeLeftCounter').countdown({until: newYear});
    ",CClientScript::POS_END);
?>



<?php $this->pageTitle=Yii::app()->name; ?>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 id="myModalLabel">Select Your Payment Type</h3>
    </div>
    <div class="modal-body">


        <fieldset>
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="charset" value="utf-8">
            <input type="hidden" name="business" value="sajib.cse03-facilitator@gmail.com">
            <input type="hidden" name="item_name" value="<?php echo $deal->deal_name; ?>">
            <input type="hidden" name="item_number" value="<?php echo $deal->deal_id; ?>">
            <input type="hidden" name="amount" value="<?php echo $deal->deal_sale_price; ?>">
            <input type="hidden" name="user_id" value="IC_Sample">
            <input type="image" src=https://www.paypal.com/en_US/i/btn/x-click-but23.gif name="submit" alt="Make payments with payPal - it's fast, free and secure!">
            <img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>

            <?php
            require_once 'anet_php_sdk/AuthorizeNet.php'; // Include the SDK you downloaded in Step 2
            $api_login_id = '5a34BXt5b';
            $transaction_key = '5pT45XyK4gh5Dz7D';
            $amount = round(ceil($deal->deal_sale_price));
            $fp_timestamp = time();
            $fp_sequence = "123" . time(); // Enter an invoice or other unique number.
            $fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id,
                $transaction_key, $amount, $fp_sequence, $fp_timestamp)
            ?>


<!--            <form method='post' action="https://developer.authorize.net/tools/paramdump/index.php">-->
            <form method='post' action="https://test.authorize.net/gateway/transact.dll">
                <input type='hidden' name="x_login" value="<?php echo $api_login_id?>" />
                <input type='hidden' name="x_fp_hash" value="<?php echo $fingerprint?>" />
                <input type='hidden' name="x_amount" value="<?php echo $amount?>" />
                <input type='hidden' name="x_fp_timestamp" value="<?php echo $fp_timestamp?>" />
                <input type='hidden' name="x_fp_sequence" value="<?php echo $fp_sequence?>" />
                <input type='hidden' name="x_version" value="3.1">
                <input type='hidden' name="x_show_form" value="payment_form">
                <input type='hidden' name="x_test_request" value="false" />
                <INPUT TYPE=hidden NAME="x_cust_id" VALUE="<?php echo Yii::app()->user->getId();?>">
                <input type='hidden' name="x_method" value="cc">

                <INPUT TYPE="hidden" name="x_line_item"  VALUE="<?php echo $deal->deal_id.'<|>'.$deal->category->category_name.'<|>'.$deal->deal_name.'<|>1<|>'.$amount.'<|>N';?>">

                <input type="hidden" name="x_invoice_num" value="<?php echo $deal->deal_id;?>">
                <input type="hidden" name="x_type" value="auth_capture"/>
                <input type='hidden' name='x_description' value='Goodlynx' />

                <button type="submit"  value="Click here for the secure payment form">
                    <img src="<?php echo Yii::app()->baseUrl.'/images/cards.png'; ?>" alt="card "></button>
            </form>

        </fieldset>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>



<div id="today-deal">
    <div class="container">

        <h2><a href="#" title="Today's Deal">Today's Deal:</a> <?php echo '$'.round(ceil($deal->deal_sale_price)); ?> <?php echo $deal->deal_name; ?> (<?php echo '$'.round(ceil($deal->deal_regular_price)); ?> Value)</h2>

        <div class="span4">
            <div class="buybox">
                <div class="pricestrip">
                    <div class="price"><?php echo '$'.round(ceil($deal->deal_sale_price)); ?></div>
                    <div class="buyButton">
                        <?php if(Yii::app()->user->isGuest){?>
                        <a class="btn btn-success"  href="<?php echo $this->createUrl('/user/login');?>" role="button" title="Buy!">Buy!</a>
                        <?php } else {?>
                        <a class="btn btn-success"  data-toggle="modal" href="#myModal" role="button" title="Buy!">Buy!</a>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="table">
                    <table>
                        <thead>
                        <tr>
                            <th>Value</th>
                            <th>Discount</th>
                            <th>Savings</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th><?php echo '$'.round(ceil($deal->deal_regular_price)) ?></th>
                            <th><?php echo round(ceil($deal->deal_discount)).'%'; ?></th>
                            <th><?php echo '$'.round(ceil($deal->deal_sale_price)); ?></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="friend-gift">Buy it for a friend!</div>
            </div>

            <div class="yellowbox">
                <div class="time-left">Time Left To Buy  </div>
                <div id="timeLeftCounter"></div>
            </div>


            <div class="yellowbox">
                <h2>
                    <?php
                            if($deal->deal_available>0)
                                echo "There are ".($deal->deal_available-$deal->deal_sold)." deals left for purchase.";
                            else
                                echo  "Don't miss this deal.";
                    ?>


                </h2>
                <h3>The deal is on!</h3>
                <p>Tipped at 12:00:00 AM with bought</p>
            </div>
        </div>
        <div class="span6">
            <div class="dealsbanner">
                <img src="<?php echo Yii::app()->baseUrl.'/images/deals/'.$deal->deal_large_image; ?>">
            </div>

            <div class="span3">
                <h4>The Fine Print</h4>
                <p><?php echo $deal->deal_fine_print ?></p>
            </div>
            <div class="span3">
                <h4>Highlights</h4>
                <ul>
                    <?php echo $deal->deal_highlights ?>
                </ul>
            </div>

            <hr>
            <ul class="sharemenu">
                <li class="h">Share:</li>
                <li><a href="#"><img alt="Email" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/email.png"></a></li>
                <li><iframe scrolling="no" frameborder="0" allowtransparency="true" src="https://platform.twitter.com/widgets/tweet_button.1363148939.html#_=1364231764916&amp;count=none&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=file%3A%2F%2F%2FE%3A%2FTutorial%2520Softwares%2FJonathan%2Fhtml%2Fcreateadeal%2Findex.html&amp;size=m&amp;text=%245%20for%20Hand%20Tossed%20Pizza%20(%2410%20Value)&amp;url=http%3A%2F%2Fdemo.uniprogy.com%2Fcouponic%2Fdeals%2Fhand-tossed-pizza" class="twitter-share-button twitter-count-none" style="width: 58px; height: 20px;" title="Twitter Tweet Button" data-twttr-rendered="true"></iframe>
                    <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                </li>
                <!--//-->
                <li>
                    <script src="https://apis.google.com/js/plusone.js" type="text/javascript" gapi_processed="true"></script>
                    <div style="height: 20px; width: 90px; display: inline-block; text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline;" id="___plusone_0"><iframe width="100%" scrolling="no" frameborder="0" hspace="0" marginheight="0" marginwidth="0" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1364231764994" name="I0_1364231764994" src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;width=55&amp;size=medium&amp;hl=en-US&amp;origin=file%3A%2F%2F&amp;url=http%3A%2F%2Fdemo.uniprogy.com%2Fcouponic%2Fdeals%2Fhand-tossed-pizza%2Fbypass%2F1&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_GB.eCy8j4wdNR8.O%2Fm%3D__features__%2Fam%3DQQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAItRSTNh_Hm3LxRfAphWymr0HP0BmroPvA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled&amp;id=I0_1364231764994&amp;parent=file%3A%2F%2F&amp;rpctoken=87772570" allowtransparency="true" data-gapiattached="true" title="+1"></iframe></div>
                </li>
                <!--//-->
                <li>
                    <fb:like href="#" send="false" layout="button_count" show_faces="false"></fb:like>
                </li>
            </ul>

        </div>
        <div class="clear"></div>

        <div class="span6">
        <?php echo $deal->deal_details?>

            <h4>Reviews</h4>
            <p>A visit to New York isn't complete without stopping in at Best Company for the best in pizza and grinders.  <a href="#" title="Reputable Magazine">Reputable Magazine</a></p>

        </div>
        <div class="span4">
            <h4>The Company</h4>
            <p><b>Best Company Ever</b><br>
                11 Nowhere St.<br>
                New York, New York 12345<br>
                United States</p>
            <a href="#" title="Website">Website</a>
            <div class="map">
                <iframe width="370" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=12+Wall+Street+New+York,+New+York+United+States&amp;sll=37.0625,-95.677068&amp;sspn=52.152749,79.013672&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=12+Wall+St,+New+York,+10005&amp;ll=40.707385,-74.011116&amp;spn=0.019519,0.025749&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
            </div>
            <p>12 Wall Street<br>
                New York, New York<br>
                United States<br>
                <a href="#" title="Map It!">Map It!</a></p>
        </div>

    </div>
</div>
