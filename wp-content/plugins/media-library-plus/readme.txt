=== Media Library Plus ===
Contributors: maxfoundry, AlanP57
Tags:album, files, folders, gallery, image, images, Jetpack Gallery, media folders, media library, media organizer, NextGEN, NextGEN Gallery, photo, photo albums, photos, The WordPress Gallery, regenerate thumbnails, thumbnail, thumbnails, seo, seo images, seo friendly images 
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 3.1.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easier file and folder management for WordPress Media Library for Galleries and Albums

== Description ==
Media Library Plus lets you: 

* Add and build new folders and sub folders to label and organize as you wish instead of just month/date
* Move, copy, rename and delete files and folders with a nice drag and drop interface
* Regenerate thumbnails
* SEO Images to specify ALT and TITLE attributes when uploading
* Sync folders/files when moving or uploading a folder via FTP
* Create a [MaxGalleria](https://maxgalleria.com/) gallery

MLP adds to and works with the functionality of WordPress Media Library. It does not replace it.


= Media Library Plus Pro =

[Media Library Pro Plus](http://www.maxgalleria.com/downloads/media-library-plus-pro/?utm_source=wordpress&utm_medium=mlpp&utm_content=mlpp&utm_campaign=repo) lets you:

* Select and add images to your posts and pages from the editor through MLPs integration 
* Create new MaxGalleria, The WordPress Gallery, Jetpack Template Galleries and NextGEN Galleries directly from your MLP folders
* Use File Name View Mode for finding images in very large folders

**Using Media Library Plus**

To get started download and install the Media Library Plus plugin. Once Media Library Plus is activated you will see Media Library + in the WordPress dashboard menu.  And you are ready to go watch our super helpful [intro video](https://maxgalleria.com/media-library-plus/?utm_source=repo&utm_medium=video&utm_content=video&utm_campaign=video)!

When you click on Media Library + it displays the contents of the uploads folder where you will see the level folders such as ‘2016’, ‘2015’.
We assume your site has the WordPress Media Library setting option ‘Organize my uploads into month- and year-based folders’ selected. If not the plugin automatically changes your settings to this. To view the contents of a folder, click on the folder image. To navigate up in the folder structure click on the links in the Location: breadcrumb string.

Clicking an image will take you to the image attachment details page. If you close that page when you are done you will be in the old media library. Instead click your browser’s go back button twice and you will be taken back to the folder page.

**Button Bar**

The Button Bar provides the main functionality to manage folders and files and is located below the breadcrumbs navigation. When the mouse hovers over a button its function is displayed in the message area below the button bar.

File/Folder Organizing Buttons

Clicking the Add File button displays the upload box.

Here you can select a single file to upload one or more files by dragging the image from the file manager and dropping them in the upload box. Uploaded files will be added to the current folder.

New Folder – Allows you to create a new folder in the current directory. 
Move/Copy Toggle - Set the mode for drag and dropping of files. Individual files can be move or copied to another folder by dragging and dropping the file into the desired folder. Multi files can be selected by click each file's checkbox.
Rename – Rename a file in the current directory. Folders cannot be renamed. 
Delete – The delete function let you delete select files. To delete a folder, Right click over a folder and click the menu the appears. A folder must be empty before it can be deleted.
Select/Unselect – Select or unselect all files in the current directory. 
Sync - Checks the folder on the server for any files not listed in the Media Library and adds them to the Library.
Sort by Date/Sort by Name – changes the display order of items in the current directory; either by name or by date. 
Search – Users can search for a file or folder by typing in the name of the file in the search box and pressing Enter.

The search results page will display files and/or folders that are similar to the search text. You can click on an image or file to go to its folder or click on a folder view its contents.

In the event that you need to rescan your database's image and folder data the Media Library Plus Reset plugin has been included. To use deactivate Media Library Plus, activate Media Library Plus Reset and select Media Library Plus Reset->Reset Database to erase the folder data. Then deactivate Media Library Plus Reset and reactivate Media Library Plus. MLP will perform a fresh scan of your database.

**Regenerate Thumbnails**

To start select one or more images from the main dashboard and click the 'Regenerate Thumbnails' button.  To regenerate all the thumbnails on your site go the the Regenerate Thumbnails page of MLP and click the 'Regenerate Thumbnails' button.  MLP will then process all of the images with an process indicator as it works on your job.

**Image SEO**

When Image SEO is enabled Media Library Plus automatically adds ALT and Title attributes with the default settings defined below to all your images as they are uploaded. You can easily override the Image SEO default settings when you are uploading new images. 


**Working with images and galleries after initial setup**

Media Library Plus is a stand along plugin that contains an integration with MaxGalleria. With MLP you can add your images to MaxGalleria with a click of a button.



== Screenshots ==

1. Media Library Plus page
2. Clicking the Add New button displays the upload box
3. The Search results page


== Installation ==

For automatic installation:

1. Login to your website and go to the Plugins section of your admin panel.
2. Click the Add New button.
3. Under Install Plugins, click the Upload link.
4. Select the plugin zip file from your computer then click the Install Now button.
5. You should see a message stating that the plugin was installed successfully.
6. Click the Activate Plugin link.

For manual installation:

1. You should have access to the server where WordPress is installed. If you don't, see your system administrator.
2. Copy the plugin zip file up to your server and unzip it somewhere on the file system.
3. Copy the "media-library-extended" folder into the /wp-content/plugins directory of your WordPress installation.
4. Login to your website and go to the Plugins section of your admin panel.
5. Look for "Media Library Plus" and click Activate.

== Changelog ==
= 3.1.8 =
* Tested with Wordpress 4.7

= 3.1.7 =
* Fixed the issue with invalid folder parent IDs

= 3.1.6 =
* added missing upload destination folder

= 3.1.5 =
* Added holiday greetings

= 3.1.4 =
* Added new file processing code

= 3.0.12 =
* Fixed issue will adding new folders to MLP

= 3.0.11 =
* Added code to handle URLs for multi sites

= 3.0.10 =
* Added code to test for and fix bad URLs in the Media Library

= 3.0.9 =
* Added code for adding attachment info for better SEO Images

= 3.0.8 =
* Added code for regenerating media library thumbnails 

= 3.0.7 =
* Added support link and email to the MLP page

= 3.0.6 =
* Fixed problem deleting a folder (for MLPP)

= 3.0.5 =
* Added code to prevent folder deletion when the folder is not empty

= 3.0.4 =
* Added folder navigation and drag and drop copy and move

= 3.0.3 =
* Added second method to get the absolute path
* Added drag and drop for moving files.

= 3.0.1 =
* Added upgrade to pro page

= 3.0.0 =
* Removed code to update attachment URLs

= 2.37 =
* Fixed MLP-reset version number

= 2.36 =
* Modified to work with Wordpress 4.5.1

= 2.35 =
* CSS modified to work with Wordpress 4.5

= 2.34 =
* Modified the code to allow the deletion of folder data even if the folder does not exist

= 2.33 =
* Made the stand alone version of MLP compatible with Maxgalleria

= 2.32 =
* Removed Maxgallery promo on MLP page
* Updated MLP page promo

= 2.31 =
* Changed database engine used for creating the folders table to MyISAM 

= 2.3 =
* Added folder sync function to scan and update the database with new files and folders found on the server
* Fix problem with incorrect path to images in the new srcset parameter

= 1.04 =
* Included the media library plus reset plugin
* Placed Media Library Plus in its own menu to allow other plugins to add submenus to the Media menu

= 1.03 =
* Add support for user defined uploads folder
* Added code to handle attachment_id in attachement URLs

= 1.02 =
* Added facebook like and share buttons
* Added support for muilt site network activation
* Added code to update theme customizer data if a file used by the customizer is moved.

= 1.01 =
* Revisions to the readme file and banner image
* Added scan for folders in uploads directory during initial scan on plugin activation
* Added rating request notice

= 1.0 =
* Initial version of the Media Library Plus
