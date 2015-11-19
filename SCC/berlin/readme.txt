=== Berlin ===

== Installation ==
This section describes how to install Berlin and get it working. 

	1. Download Berlin from your Graph Paper Press [member dashboard](https://graphpaperpress.com/members/member.php) to your Desktop.
	2. Unzip berlin.zip to your Desktop.	
		* Note: make sure that the extracted folder is `berlin` and that your ZIP file has not created two levels of folders (for example, `berlin/berlin`).
	
	3. Go to `/wp-content/themes/` and make sure that you do not already have a `berlin` folder installed. If you do, then back it up and remove it from `/wp-content/themes/` before uploading your copy of Berlin.
	4. Upload `berlin` to `/wp-content/themes/`.
	5. Activate Berlin through the Appearance -> Themes menu in your WordPress Dashboard.
	6. Go to Settings -> Media and make sure to enter the following values:	
		* Image sizes		
			** Thumbnail size
				*** Width: 150
				*** Height: 150
				*** [checked] Crop thumbnails to exact dimensions (normally thumbnails are proportional)
				
			** Medium size
				*** Max Width: 590
				*** Max Height: 0
				
			** Large size
				*** Max Width: 950
				*** Max Height: 0
				
		
		* Embeds
			** [checked] When possible, embed the media content from a URL directly onto the page. For example: links to Flickr and YouTube.
			** Maximum embed size
				*** Width: 620
				*** Height: 0

= Thumbnails =

Every Post needs to have a Featured Image assigned to it.  You can assign a Featured Image by uploading an image to the Post, and then click the "Use as featured image" button to make the image the Featured Image for that post.  [Watch a video tutorial](http://vimeo.com/8462281).

If you are migrating from an old theme to a new theme and your thumbnails look squished or distorted, you might need to re-upload the image you plan on using for the post thumbnail. This is because WordPress creates your image sizes based on the dimensions you specified above. Old thumbnails will not be automatically resized.  You can regenerate your thumbnails with the [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/) WordPress plugin.

		
= Installation Troubleshooting =

If you've performed a clean install of berlin and are having problems, make sure that the following conditions have been met: 
			* Make sure that you've installed the theme properly. You should use an FTP program like FileZilla, WinSCP, or Fetch to upload your files. Do not use WordPress' Install a theme in .zip format option.
			* Permissions: On most servers, the theme files should be set to 644 and folders should be set to 755
			* Make sure that you've deactivated all of your plugins before installing and/or upgrading if you continue to have theme activation problems.
			* Your berlin folder should be named `berlin`. Do not rename this folder.
			* If you are upgrading your version of berlin, make sure to backup first and completely delete your old version of berlin from your server before uploading the new version of berlin to your server. With version 1.1 and above, the upgrading has been made simpler. You can go to berlin -> Updates in your menu, add your API key from your [member dashboard](https://graphpaperpress.com/members/member.php) and click the Update button.
			* berlin uses jQuery for much of its functionality. If parts of your theme appear broken or unresponsive, then you likely have a JavaScript conflict being caused by an active plugin. Deactivate your plugins, one-by-one, to determine which plugin is conflicting with jQuery.
			

			
= Built-in HD video player for self-hosted HD-quality videos; multiple videos per Post or Page are supported: =

	* The built-in video player plays FLV files. To add a video to a Post or Page, create a custom field key/value pair of `video | http://your-domain.com/path/to/your/video/file.flv`.
	* In order to set a thumbnail for your video player, create a custom field key/value pair of `video-thumb | http://your-domain.com/path/to/your/video/thumbnail.jpg`
	* For multiple videos within a Post or Page, enter more than 1 custom field key/value pair for `video|URL` and `video-thumb|URL`, for example:
		** `video | http://your-domain.com/path/to/your/video/file.flv`
		** `video-thumb | http://your-domain.com/path/to/your/video/thumbnail.jpg`
		** `video | http://your-domain.com/path/to/your/video/file-2.flv`
		** `video-thumb | http://your-domain.com/path/to/your/video/thumbnail-2.jpg`


= Embed multimedia into Posts or Pages: =

For externally hosted videos (for example a YouTube or Vimeo video), you can directly paste the link of your video page into the content editor. You do not have to paste the embed code. WordPress will automatically embed the video from the link.`


= Homepage =

Berlin makes use of custom queries to pull in various posts from categories that you specify in code. To configure the categories you would like to have appear in each content region on the homepage, open up home.php in a text editor, like TextEdit, Coda, or NotePad, and locate lines 18, 38, 51, 67, & 96. Change the cat=1 to the specific category ID's of your choosing.

Not sure how to find your category ID? In your WordPress panel, click on Categories. Put your mouse cursor on the name of the category. Look on your browser's status bar (typically located at the bottom of your browser). The ID will be revealed at the end of the URL.

= Menus = 

The navigation menu contains a link to your homepage, about page, archive page, and RSS feed. First, visit Settings -> Permalinks and change it to Day & Name. Second, create a page called "About." Third, create a page called "Archive" and assign it the Page Template "Archive." You can add or remove links by opening header.php and changing lines 54-58.
To add menus to your website, go to Appearance -> Menus and add a new menu. You can then add categories, pages and custom links to this new menu. You can also drag and drop menus around to make sub menus or reorder them.


= Widgets: =

There are a total of three widgetized areas on this theme, depending on which options you activate on the Theme Options panel. Three widgetized areas appear on the bottom and there is one sidebar widget. You can add and delete widgets by clicking Design - Widgets, from within your Wordpress admin panel.

	