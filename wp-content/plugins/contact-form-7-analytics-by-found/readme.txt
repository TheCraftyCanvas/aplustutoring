=== Contact Form 7 Analytics by Found ===
Contributors: found
Tags: contact form, analytics, email analytics, google, plugin, google analytics, google analytics form, PPC, keyword, term, traffic source, analytics plugin, (not provided), medium, campaign, PPC Keyword, PPC leads, PPC analytics, Google analytics cookie, contact form analytics
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 1.0

Add analytics information to your contact form 7 emails.

==Description==
Contact Form 7 Analytics by [Found](http://www.found.co.uk/cf7-email-analytics/) is a Contact Form 7 plugin that adds a [found] shortcode to your contact form. 

By using the shortcode, key information from Google Analytics will be included in the email, such as Google search term or PPC campaign information.

If you're using Google Analytics goal tracking to record contact form submissions, you can see how many leads each source generates.

However, by using this plugin you can see which leads came from which source, so you can get a much better picture of where your most valuable leads are coming from.

Please note you need to have the [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/) plugin installed 
and Google Analytics code on your website in order for this plugin to work.  

More information can be found [here](http://www.found.co.uk/wordpress-magneto-contact-forms-just-got-clever/)

Please note that the plugin will not work with the new Google Analytics Universal tracking code. Please use the _ga tracking in parallel.

Source field values explained:

1. Empty (and all other fields empty) - the visitor has disabled cookies or GA code is not installed 
2. Direct - the visitor has come directly to your site by either using a bookmark or they remembered your URL. They did use a search engine or used a link via another referrer.
3. Google - the user has used Google's search engine to land on your site. If the medium value is PPC they clicked on a premium ad, if the medium is organic they clicked on a link of one of the organic listings.
4. Another website's name (Ex: 'facebook') - the visitor has landed on your site by clicking a link on another website

Q: Why is the Campaign Term populated with "(not provided)"?

A: In October last year Google implemented a change to "make search more secure". From this date users who performed a search whilst logged into a Google account would have their search query encrypted over the HTTPS protocol.

Whilst the user experience has remained pretty much the same when searching, the owners of visited search results are no longer able to obtain information on the keyword which was searched - this now being reported as "(not provided)".

More information can be found via [this blog post](http://www.found.co.uk/firefox-encrypt-referring-search-strings-whose-search-referral-data-anyway/).


== Installation ==
1. Download and extract Contact Form 7 Analytics from Found zip file to the plugins folder. Verify that you see the contact-form-7-found folder inside plugins folder.
3. Activate it through the plugin management screen.
4. A new shortcode([found]) will be available in the contact form 7 builder interface.
5. Add the shortcode to your form and to the emails you set up for your site.


== Screenshots ==

1. Screenshot Found shortcode 
2. Screenshot Found shortcode usage in the form and email

== FAQ ==

Source field values explained:

1. Empty (and all other fields empty) - the visitor has disabled cookies or GA code is not installed 
2. Direct - the visitor has come directly to your site by either using a bookmark or they remembered your URL. They did use a search engine or used a link via another referrer.
3. Google - the user has used Google's search engine to land on your site. If the medium value is PPC they clicked on a premium ad, if the medium is organic they clicked on a link of one of the organic listings.
4. Another website's name (Ex: 'facebook') - the visitor has landed on your site by clicking a link on another website

Q: Why is the Campaign Term populated with "(not provided)"?

A: In October last year Google implemented a change to "make search more secure". From this date users who performed a search whilst logged into a Google account would have their search query encrypted over the HTTPS protocol.
Whilst the user experience has remained pretty much the same when searching, the owners of visited search results are no longer able to obtain information on the keyword which was searched - this now being reported as "(not provided)".
More information can be found via [this blog post](http://www.found.co.uk/firefox-encrypt-referring-search-strings-whose-search-referral-data-anyway/).

== Changelog ==

1.0 First public release.

1.0.1 Improvements to the way the __utmz cookie is read to insure the full referer data is captured.