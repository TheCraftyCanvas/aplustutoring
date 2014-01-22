<div class="wrap">

<h2>Google Universal Analytics</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('google_universal_analytics'); ?>

<style type="text/css">
.tooltip {
  border-bottom: 1px dotted #000000;
  color: #000000; outline: none;
  cursor: help; text-decoration: none;
  position: relative;
}
.tooltip span {
  margin-left: -999em;
  position: absolute;
}
.tooltip:hover span {
  font-family: Calibri, Tahoma, Geneva, sans-serif;
  position: absolute;
  left: 1em;
  top: 2em;
  z-index: 99;
  margin-left: 0;
  width: 450px;
}
.tooltip:hover img {
  border: 0;
  margin: -10px 0 0 -55px;
  float: left;
  position: absolute;
}
.tooltip:hover em {
  font-family: Candara, Tahoma, Geneva, sans-serif;
  font-size: 1.2em;
  font-weight: bold;
  display: block;
  padding: 0.2em 0 0.6em 0;
}
.classic { padding: 0.8em 1em; }
.custom { padding: 0.5em 0.8em 0.8em 2em; }
* html a:hover { background: transparent; }
</style>

<p><b>Option 1:</b> Insert your Google Universal Analytics javascript code below 
<a class="tooltip" href="#">(Code Example)<span class="classic"> 
	&lt;script&gt;</br>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){</br>
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),</br>
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)</br>
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');</br>
</br>
  ga('create', 'UA-23710779-8', 'onlineads.lt');</br>
  ga('send', 'pageview');</br>
</br>
  &lt;/script&gt;
</span></a>:</p>
<p><b>Option 2:</b> Insert just the web property id. Example: UA-23710779-8</p>
<p><b>Option 3:</b> Insert the web property id, a comma and then the domain name. Example: UA-23710779-8,onlineads.lt</p>
<textarea name="web_property_id" id="web_property_id" rows="10"  cols="65" >
<?php echo get_option('web_property_id'); ?> </textarea>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
Have a question? Drop us a question at <a href="http://onlineads.lt/?utm_source=WordPress&utm_medium=Google%20Universal%20Analytics%201.3&utm_campaign=WordPress%20plugins" title="Google Universal Analytics">OnlineAds.lt</a>
</div>

</br>