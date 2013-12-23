<?php

/////////////////////////////////////////
// @ Example usage of the HK API
// @ 15th February 2013
// @ Author: Ashley Ford
// @ ashley@harkable.com
////////////////////////////////////////

include('class/HkCompAPI.class.php');

$competition = new HkCompAPI();

    if(isset($_POST['_submit'])){
    
        $_POST['dob'] = $_POST['_year'].'-'.$_POST['_month'].'-'.$_POST['_day'];
    
        $validation = array(
    
            //@ Format of the array is as follows:
            //@ Input Value Name
            //@ Error Message
            //@ Required, valid_email, over_18, captcha (value must be blank)       
            
            array('fname',      "Please enter your first name",              'required'),
            array('lname',      "Please enter your last name",               'required'),
            //array('dob',        "This promotion is open to users over 18!",  'over_18'),
            array('email',      "Please enter a valid email address",        'valid_email'),
            array('terms',      "Please Accept the Terms &amp; Conditions",  'required'),
            array('subscribe',  "Please Accept the Terms &amp; Conditions",  'required'),
            array('_captcha',   "We're not sure you're a human...",          'captcha')
    
        );  
        
        // validate for errors
        $errors = $competition->validate($validation);
        
        // validate returns FALSE if no errors are found
        if($errors===FALSE){
            // save the data via the api call with the campaign name
            $save = $competition->save('ign_gameforge');
                        
            if(isset($save['_auth']) && $save['_auth']=='failed'){
                echo 'Error Authenticating With the API';           
            }
             
            // if the data was saved successfully   
            if(isset($save['_saved'])==TRUE){
            
            //redirect to thankyou page
                
            header('location: thankyou.php');

            }
                       
        }
                      
    } 
?>


<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if lte IE 9]> <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>Win a top spec gaming PC bundle in association with S.K.I.L.L.</title>

	<meta property="og:title" content="Win a top spec gaming PC bundle in association with S.K.I.L.L.">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="">
    <meta property="og:url" content="http://uk-microsites.ign.com/gamesforge/">
    <meta property="og:image" content="http://uk-microsites.ign.com/gamesforge/assets/images/skill_logo.png">
    <meta property="fb:admins" content="546507370">
    
    
	<link rel="shortcut icon" href="favicon.ico">
	<link rel=apple-touch-icon href="apple-touch-icon.png">
	<link rel=apple-touch-icon sizes=72x72 href="apple-touch-icon-72x72.png">
	<link rel=apple-touch-icon sizes=114x114 href="apple-touch-icon-114x114.png">


    <link rel="stylesheet" href="stylesheets/app.css" />

    <script src="javascripts/vendor/custom.modernizr.js"></script>

	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->

</head>
<body>

    <header id="ignHeaderHeader">
		<div id="ignHeader" class="clear">
			<ul class="social-btns">
                <li>
                    <div class="fb-like" data-href="http://uk-microsites.ign.com/gamesforge/" data-send="false" data-layout="button_count" data-width="60" data-show-faces="false"></div>
                </li>

                <li><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://uk-microsites.ign.com/gamesforge/" data-text="" data-via="IGNUK">Tweet</a></li>

                <li>
                    <div class="g-plusone" data-size="tall" data-annotation="none" data-href="http://uk-microsites.ign.com/gamesforge/"></div>
                </li>
            </ul>
			
			<div id="ignHeader-userBar">
				<div class="container"> <a id="ignHeader-logo" href="http://uk.ign.com/"></a>
				</div>
			</div>
		</div>
	</header>

    <div class="row"><a href="http://en.skill.gameforge.com/?kid=e-92507-A0E69-1312-e38051e0" target="_blank" class="register_btn skill bundle"><img src="assets/images/pc_gaming-bundle.png" alt="S.K.I.L.L."></a></div>
    
    <div class="row"><a href="http://en.skill.gameforge.com/?kid=e-92507-A0E69-1312-e38051e0" target="_blank" class="register_btn"><img src="assets/images/register_btn.png" alt="Click here to register"></a></div>

    <div class="row"><a href="http://en.skill.gameforge.com/?kid=e-92507-A0E69-1312-e38051e0" target="_blank" class="register_btn skill"><img src="assets/images/skill_logo.png" alt="S.K.I.L.L."></a></div>



    <div class="orbit_wrapper">
    	<ul class="example-orbit" data-orbit data-options="animation:fade; navigation_arrows:false; timer_speed: 5000; pause_on_hover:false;">
          <li>
            <img src="assets/images/SKILL_GAFE.jpg" alt="slide 2" />
          </li>
          <li>
             <img src="assets/images/SKILL_Clan.jpg" alt="slide 1" />
          </li>
          <li>
            <img src="assets/images/SKILL_SF2_Art_3.jpg" alt="slide 2" />
          </li>
          <li>
            <img src="assets/images/SKILL_Thunder-Run.jpg" alt="slide 2" />
          </li>
        </ul>

        <div class="row">
            <div class="large_12 columns car_text">
                <p>S.K.I.L.L. - Special Force 2 is the new fast-paced MMO first person shooter from Gameforge. Play as an elite member of the world-recognized Special Forces unit in fast-paced multiplayer action, enjoying individually customizable characters, varied maps, a wide choice of modes including Blasting <span class="light_blue">and the best thing of all?... It is Free To Play.</span><br>
Play as an elite soldier in squads of up to 16 in an alternative near-future: the EU has collapsed, power has shifted and as the 2nd Cold War deepens, an alien race has landed on the Earth.</p>
            </div>
        </div>
    </div>
    

<!--     <a href="#_" class="examples_link" data-reveal-id="myModal">Need some inspiration? <span class="info_btn"></span></a> -->

    
    <!--competition-->
    <section id="competition" class="standard_container">

    <div class="row">
        <img src="assets/images/text-top.png" alt="TO WIN THE ULTIMATE GAMING RIG PLUS €50 WORTH OF IN-GAME CURRENCY 
JUST ENTER YOUR DETAILS BELOW" class="rig_text">
    </div>

    <div class="row">
        <div class="large-12 columns forge_cont pc">
            <img src="assets/images/pc.png" alt="pc image">

            <p>The <a href="#_">Fusion Zed</a> is <a href="http://www.chillblast.com/ign.html" target="_blank">Chillblast</a>’s hottest gaming rig right now. Powered by an <a href="www.chillblast.com/Chillblast-Fusion-Zed.html" target="_blank">overclocked Core i5 4670K</a> and the awesome <a href="www.chillblast.com/Chillblast-Fusion-Zed.html">GTX 760 2GB</a> video card, it has the power to play any current game at the highest quality.</p>
        </div>
    </div>

    <div class="row roccat">
        <div class="large-4 columns forge_cont">
            <div class="prize-cont">
                <a href="http://www.roccat.org/Products/Gaming-Keyboards/ROCCAT-Isku-FX/" target="_blank"><img src="assets/images/keyboard.jpg" alt="Keyboard Isku FX"></a>
                <p class="overlay_text">Keyboard Isku FX</p>
            </div>
        </div>
        <div class="large-4 columns forge_cont">
             <div class="prize-cont">
                <a href="http://www.roccat.org/Products/Gaming-Mice/ROCCAT-Kone-Pure-Color/" target="_blank"><img src="assets/images/mouse.jpg" alt="Mouse Kone"></a>
                <p class="overlay_text">Mouse Kone</p>
            </div>
        </div>
        <div class="large-4 columns forge_cont">
             <div class="prize-cont">
                <a href="http://www.roccat.org/Products/Gaming-Sound/ROCCAT-Kulo-7-1-USB/" target="_blank"><img src="assets/images/headphones.jpg" alt="Headset Kulo 7.1"></a>
                <p class="overlay_text">Headset Kulo 7.1</p>
            </div>
        </div>
    </div>

    <div class="row"><img src="assets/images/runner_up.jpg" alt="Plus 4 x runner-up prizes of €50 worth of in-game currency" class="runner_up-img"></div>

        <div class="row">
            <div class="large-12 columns form_cont">
                
            <?php 

                    if(isset($errors)){
                        // if there were errors in form processing show them here
                        echo '<div class="alert alert-error"><ul>';	       	        
                            foreach($errors as $error){		        
                              echo '<li>'.$error.'</li>';  
                            }	        
                        echo '</ul></div>';
                    
                    }
            ?>

            <form action="" method="post" class="form-horizontal">
                <fieldset>

                     <div class="row">
                        <div class="large-6 columns">
                            <label>First Name<span class="astrix">*</span></label>
                            <input type="text" name="fname" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>"> 
                        </div>

                        <div class="large-6 columns">
                            <label>Last Name<span class="astrix">*</span></label>
                            <input type="text" name="lname" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];}?>"> 
                        </div>
                     
                        <div class="large-12 columns">
                            <label>Email<span class="astrix">*</span></label>
                                <input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"> 
                        </div>
                    </div>
                    
                     <!--div class="row">
                        <div class="large-4 columns">
                            <label>Day</label>
                            <select name="_day" class="span1">
                                <option value="0">Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            
                        </div>
                        
                         <div class="large-4 columns">
                             <label>Month</label>
                            <select name="_month" class="span2">
                                <option value="0">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        
                        <div class="large-4 columns">
                            <label>Year</label>
                            <select name="_year" class="span2">
                                <option value="0">Year</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                                <option value="1919">1919</option>
                                <option value="1918">1918</option>
                                <option value="1917">1917</option>
                                <option value="1916">1916</option>
                                <option value="1915">1915</option>
                                <option value="1914">1914</option>
                                <option value="1913">1913</option>
                                <option value="1912">1912</option>
                                <option value="1911">1911</option>
                                <option value="1910">1910</option>
                                <option value="1909">1909</option>
                            </select>

                         </div>
                    </div-->

                    <div class="clearfix"></div>
                    <div class="control-group full">
                        <div class="controls">
                            <label class="checkbox"><input type="checkbox" name="terms" value="1"><span>I confirm that I am a UK resident over the age of 16 and have <a href="tandc.php">read and understood the terms and conditions</a><span class="astrix">*</span></span></label>
                           <!--  <span class="help-block">I confirm that I am a UK resident over the age of 18 and have <a href="tandc.php">read and understood the terms and conditions</a></span> -->
                        </div>
                    </div>
                    
                    <div class="control-group full">
                        <div class="controls">
                            <label class="checkbox"><input type="checkbox" name="subscribe" value="1"><span>I agree that my email details can be used by IGN Entertainment and Gameforge to keep me informed of exciting new products, promotions and services until I choose otherwise.<span class="astrix">*</span></span></label>
                           <!--  <span class="help-block">I agree that my email details can be used by IGN Entertainment and Warner Bros. Entertainment UK Limited to keep me informed of exciting new products, promotions and services until I choose otherwise.</span> -->
                        </div>
                    </div>

                    <p class="req_field-text"><span class="astrix">*</span>These form fields are required</p>
                    <div class="clearfix"></div>
                    
                    <div class="control-group full">
                        <div class="controls">
                            <input type="hidden" name="_captcha" value=""> 
                            <input type="submit" value="" class="button" name="_submit">
                        </div>
                    </div>
                    </fieldset>
                </form>  
            </div> <!-- container -->
        </div>
    </section>
    <!--end competition section-->

    <div class="row">
        <div class="twelve columns small_txt">
            <p>© 2013 Developed by Dragonfly GF Co., Ltd. Published by Gameforge 4D GmbH. All rights reserved. All trademarks are the property of their respective owners.</p>
        </div>
    </div>

    <!-- start footer -->    
    <div id="ign_footer">
        <div class="ign-elements">

                <section class="large-6 columns">
                    <p class="corp-terms">Copyright 2013 <span class="white">IGN Entertainment UK, Inc.</span><br>
                     <a href="http://corp.ign.com/privacy.html" title="Privacy Policy">Privacy Policy</a> | <a href="http://corp.ign.com/user-agreement.html" title="User Agreement">User Agreement</a></p>
                </section>
                <section class="large-6 columns right">
                    <p class="corp-links"><a href="http://uk.corp.ign.com/#about" title="About Us">About Us</a> | <a href="http://uk.corp.ign.com/#contact" title="Contact Us">Contact Us</a> | <a href="http://corp.ign.com/feeds.html" title="RSS Feeds">RSS Feeds</a></p>
                </section>

        </div>
    </div>
    <!--end footer-->
    
  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'javascripts/vendor/zepto' : 'javascripts/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="javascripts/foundation/foundation.js"></script>
	
	<script src="javascripts/foundation/foundation.alerts.js"></script>
	
	<script src="javascripts/foundation/foundation.clearing.js"></script>
	
	<script src="javascripts/foundation/foundation.cookie.js"></script>
	
	<script src="javascripts/foundation/foundation.dropdown.js"></script>
	
	<script src="javascripts/foundation/foundation.forms.js"></script>
	
	<script src="javascripts/foundation/foundation.interchange.js"></script>
	
	<script src="javascripts/foundation/foundation.joyride.js"></script>
	
	<script src="javascripts/foundation/foundation.magellan.js"></script>
	
	<script src="javascripts/foundation/foundation.orbit.js"></script>
	
	<script src="javascripts/foundation/foundation.placeholder.js"></script>
	
	<script src="javascripts/foundation/foundation.reveal.js"></script>
	
	<script src="javascripts/foundation/foundation.section.js"></script>
	
	<script src="javascripts/foundation/foundation.tooltips.js"></script>
	
	<script src="javascripts/foundation/foundation.topbar.js"></script>
	
  
  <script>
    $(document).foundation();
  </script>

  <script>

  </script>
    
  <!--begin GA script-->
  <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-15279170-1']);
	  _gaq.push(['_trackPageview', 'Gamesforge']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	  
	</script>
	<!--end GA script-->

  
  <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=147333065402611";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	
	<script type="text/javascript">
	  window.___gcfg = {lang: 'en-GB'};
	
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>

  <!-- Begin comScore Tag -->
	<script>
	  var _comscore = _comscore || [];
	  _comscore.push({ c1: "2", c2: "3000068" });
	  (function() {
	    var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
	    s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
	    el.parentNode.insertBefore(s, el);
	  })();
	</script>
	<noscript>
	  <img src="http://b.scorecardresearch.com/p?c1=2&c2=3000068&cv=2.0&cj=1" />
	</noscript>
   <!-- End comScore Tag -->
   <!--
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
-->

<div id="myModal" class="reveal-modal">
  <h2>Awesome. I have it.</h2>
  <p class="lead">Your couch.  It is mine.</p>
  <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
  <a class="close-reveal-modal">&#215;</a>
</div>

</body>
</html>
