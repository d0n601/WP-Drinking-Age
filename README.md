
#WP Drinking Age
[![WordPress](https://img.shields.io/wordpress/v/akismet.svg)](https://wordpress.org/download/)
 [![version](https://img.shields.io/badge/stable-v0.1.0-4A8F80.svg)]()
 [![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/gpl-2.0.html)
 

##Description
This plugin implements a drinking age gateway to your site. Users will be required to verify their date of birth before viewing content on the site. It's intended for sites related
to alcohol. WP Drinking Age uses data from [ProCon.org](http://drinkingage.procon.org/view.resource.php?resourceID=004294) to verify a users are of legal age for their region.


###Main Features
* Restricts access to users until they verify they're of drinking age.
* Supports just about every nation in the world.
* Customizable CSS.


##Installation
 1. Upload the plugin file to '/wp-content/plugins/' directory or upload the [zip](https://github.com/d0n601/WP-Drinking-Age/archive/master.zip) file through the plugins section of the admin panel
 2. Activate the plugin through 'Plugins' menu in WordPress admin
 3. Adjust plugin's settings by going to  **Settings->WP Drinking Age**
 4. Now enjoy WP Drinking Age Gateway!


##Frequently Asked Questions

###How do I use this plugin?
Once you activate the plugin, the gateway will be displayed to visitors. Navigate to the plugin's settings to set an image and message related to your site.

###Will this impact my SEO (Google Ranking)
A JavaScript gateway such as this will allow easy indexing by search engines. Search bots won’t run the JavaScript to
to activate the gateway, and so it will not appear for them at all. The script is executed after the page is loaded, and
the content is rendered.

###What source is used for legal drinking ages?
Legal drinking ages by country are referenced from [ProCon.org](http://drinkingage.procon.org/view.resource.php?resourceID=004294)

###Why the hastle, can't I just input a specific age?
Plugins exist that allow you to set a specific age requirement for visitors. This is for worldwide alcohol brands. All countries don’t have the same drinking age.
So solutions where the gateway is based on a static entry age are not suitable. An age, and location must be gathered by the gateway to determine if a user is credible
to enter the site.

##Screenshots
 1. The admin page showing the options for this plugin.
 ![WP Drinking Age Admin Screen](https://raw.githubusercontent.com/d0n601/WP-Drinking-Age/master/screenshot-1.png)
 2. An example of WP Age Gateway in action with default settings.
 ![WP Drinking Age Default Gateway](https://raw.githubusercontent.com/d0n601/WP-Drinking-Age/master/screenshot-2.png)



##Changelog

###0.1.1
Fix Improper use of defines
###0.1.0
As this is the first version, there is not much to say.
