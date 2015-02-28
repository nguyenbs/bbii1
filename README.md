This module will add a fully functional forum to an existing Yii 1.1 application.


## Features

* Clear forum structure and forum functionality.
* CKEditor for wysiwyg.
* Private messaging.
* Moderation.
* Search functionality.
* Language support (Dutch, English, German, Russian included).
* Time zone handling.
* Post upvoting.
* Polls.


##Requirements

Yii 1.1.8 or above.  
PHP 5.3 or above (a work-around for PHP 5.2 exists).  
The application to which BBii is added needs to have a user table.


##Usage

* Extract the zip file to the application's protected/modules directory
* Create database tables according to bbii/data/schema.mysql.sql
* Import sample data from bbii/data/sampledata.mysql.sql
* Create the subdirectory ‘avatar’ in your application webroot directory to which the application must be given read/write access rights.
* Edit your configuration to register the module (the default option values may need to be adjusted):
~~~
[php]
'modules'=>array(
	'forum'=>array(
		'class'=>'application.modules.bbii.BbiiModule',
		'adminId'=>1,
		'userClass'=>'User',
		'userIdColumn'=>'id',
		'userNameColumn'=>'username',
	),
),
~~~
* BBii requires a user database table to be present that at least contains an integer user ID field and a varchar user name field. BBii also expects Yii::app()->user->id to return the user ID, not the user name. The model for the user table and the column names for the user ID column and the user name column are part of the module options.
* Log in to your application with the user that has the user ID equal to the value for the option ‘adminId’ to acquire administration rights in BBii.
* Navigate to http://[ your base url ]/forum. Click the link ‘Forum settings’ and set up the forum.

NOTE: BBii uses the layout '//layouts/column1' that comes with the default Yii application. When you need to use a different layout this needs to be changed in the script components/BbiiController.php.


##Options
The following configuration options can be used:  
**adminId**: the user ID (integer) for the user to receive the admin authorization (default value: false). When the application uses rbac and the role ‘admin’ exists the users that get the role ‘admin’ assigned will also be admin for BBii.  
**avatarStorage**: The directory in which uploaded avatar images are stored relative to the application webroot directory (leading ‘/’ required) (default value: '/avatar').  
**forumTitle**: The name for the forum (default value: 'BBii Forum').  
**userClass**: The model name of the database table that contains the user authentication information for User ID and User name (default value: 'User').  
**userIdColumn**: The column name of the User class field that contains the User ID (default value: 'id').  
**userNameColumn**: The column name of the User class field that contains the User name (default value: 'username').  
**userMailColumn**: The column name of the User class field that contains the User e-mail address (default value: false).  
**dbName**: The name of the db component to use to connect to the forum database tables (default value: false)  
**topicsPerPage**: The number of topics to display on a single page (default value: 20).  
**postsPerPage**: The number of posts to display on a single page (default value: 20).  
**purifierOptions**: The CHtmlPurifier options.  
**editorToolbar**: The toolbar options for the CKEditor.  
**editorSkin**: The CKEditor skinName configuration setting (default value: 'moono').  
**editorUIColor**: The CKEditor uiColor configuration setting (default value: '').  
**editorContentsCss**: The CKEditor contentsCss configuration setting (default value: array()).  
**juiTheme**: The theme for the jQuery UI widgets (default: 'base').  
**bbiiTheme**: The theme for the BBii module itself (default: 'base').  

##Embedded Extensions

* [editMe](http://www.yiiframework.com/extension/editme)

##Versions

* v1.0.8 (February 28, 2015):
 * Changed CListView template and pager for topics and posts.
 * Changed paging through topic posts by adding scroll to top.
 * Minor improvements to the base forum.css file.
 * Minor bugfix.
* v1.0.7 (January 22, 2015):
 * Russian language file added.
 * Minor bugfixes.
* v1.0.6 (January 15, 2015):
 * Reworked forum/topic read indication.
* v1.0.5 (August 29, 2014):
 * Module parameter dbName added.
* v1.0.4 (July 16, 2014):
 * Bugfixes.
* v1.0.2 (June 28, 2014):
 * Page titles reflecting forum names and topic titles. 
 * Indicate topics with own posts.
 * Excluded spiderbots/webcrawlers from forum statistics.
 * Sanitized displays for absense of Javascript. 
* v1.0.1 (June 7, 2014): 
 * Collapsing forum groups.
* v1.0.0 (May 25, 2014): 
 * Improved support for theming.
* v0.94 (May  17, 2014): 
 * Removed dependency on module id from the code.
* v0.93 (May  12, 2014): 
 * ColorPicker removed. 
 * Upgraded editMe to version 2.1.
 * Added CKEditor 'skin' configuration to editMe 2.1. 
 * Upgraded CKEditor to version 4.4.0. 
 * Included CKEditor skins 'moonocolor' and 'kama'.
* v0.9  (Apr.  6, 2014): Moderator mail. Membergroup forums.
* v0.82 (Mar. 26, 2014): Improvements to pm.
* v0.81 (Mar. 16, 2014): Security related bugfixes.
* v0.8  (Nov. 30, 2013): More module options. A grey-themed css file. German translation.
* v0.7  (Nov. 16, 2013): Polls. Show upvoted by.
* v0.6  (Nov.  1, 2013): Post upvoting.
* v0.5  (Aug. 20, 2013): Indicate unread forums and topics.
* v0.4  (Aug. 18, 2013): Moderator assignment. Member group icons.
* v0.3  (Aug.  4, 2013): User e-mail form added. Session count for statistics.
* v0.2  (Aug.  1, 2013): Search functionality added.
* v0.1  (Jul. 27, 2013): Initial release.


##Resources

 * [Forum support](http://www.yiiframework.com/forum/index.php/topic/45611-extension-bbii/)
 * [Report bugs](http://www.yiiframework.com/forum/index.php/topic/45611-extension-bbii/)
 * [Try out demo](http://bbii.doprogramsdream.nl/)
