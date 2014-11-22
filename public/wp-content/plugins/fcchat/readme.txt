=== Plugin Name ===

Contributors: rdbeach
Donate link: http://www.fastcatsoftware.com
Tags: chat, instant messaging, widget
Requires at least: 2.7
Tested up to: 4.0
Stable tag: 3.8.5


An interface for real time chat, video conferencing, instant messaging, and more.


== Description ==

IMPORTANT UPDATE:

Existing users, please update your host value to 'chat.fastcatsoftware.com'. 


DEMO

http://www.fastcatsoftware.com/wp3.3/


MOST RECENT FEATURES

Version 3.8 Continues to improve the mobile experience. Styling has also been updated.

Versions 3.6 introduces BlogChat. Just as you have a comments section for each topic on your blog, BlogChat gives you a dedicated chat room for each of your blog entries. To learn more about BlogChat, visit this page:http://www.fastcatsoftware.com/chat/userguide/chatbox.asp


Up Next

We are currently working on WebRTC video chat, which does not require Flash, and which would run on a variety of mobile devices.
We are also programmable interface so that you can add your own custom features to the chat.

NEWS

We have a new widget made specifically for Wordpress Blogs. Check it out here: http://wordpress.org/plugins/blogchat-chat-system/


UPGRADE NOTICE

Upgrading to version 3.5.x.x will automatically switch your chat to the new chat server (v2.3). This process takes 1-2 min. During this time, your chat will not function properly. Keep trying to reconnect for a few minutes until the transfer is complete.

After upgrading, make sure you clear your browser cache and refresh the page.

Upgrading from a version prior to 3.4.2.1: If you have changed the default location of the full page chat, you will need to copy the new  fcchat/html/chat/index.php file to this location, and set $FCCHAT_BASE_URL once again.

When you upgrade to a new version, any customizations you made to the chat files will be erased. In order to save those changes, do the following:

1. Make backup copies of any files that you have altered. You may wish to make backups of the following folders: (fcchat/config, fcchat/languages, fcchat/styles, fcchat/html/config). Place them in a safe place where they will not be deleted. 
1. Next install the new version. 
1. Finally, manually copy the changes you made to the old files into the current version's files. Do not replace the new files with the old files, as the structure of the new files may have changed; but instead, use the wordpress file editor to make the changes line by line.



FEATURE LIST:

Real time text chat

Video Chat: 1 on 1 video chat and video conferencing (6 Simulaneous Cams)

Full Page Mode: Launch Chat into a separate tab

Public rooms/Private Rooms

Instant messaging/Private Chat

Facebook Connect

Post Youtube videos (thumbnail with link) simply by entering the url of the video.

Upload images

User profiles

Country Flags

Coloaborative document

Doodlepad

Transliteration

Two player games

Customized buttons with content dialog boxes in the chat toolbar.

Split-screen Mode: Show the chat side by side with your site

Language translation feature 

Assign titles to users

Customizable smileys/avatars

Customizable sounds

Customizable language templates

Customizable style templates

Administration/moderation panel

Web based file editor 


SERVICE ACTIVATION - SERVICES HOSTED BY FASTCATSOFTWARE.COM

In order to use this widget, you will need to sign up for a subscription to the chat service on www.fastcatsoftware.com. Follow the "Installation" tab for more specific instructions. This is a paid service, however, you will receive a free trial when you sign up. Subscriptions start at only 20 cents per month. You may view all our subscription plans here: http://www.fastcatsoftware.com/chat/activation.aspx

SERVICES PROVIDED

When you install the FCChat Widget, you will only be installing the chat client on your site. Your chat server (meaning your chat data) will be hosted at www.fastcatsoftware.com, on our servers.



== Installation ==

1. Old-school: upload the `FCChat` folder to the `/wp-content/plugins/` directory via FTP.  Hipster: Add the FCChat Widget via the WordPress Plugins menu.
1. Activate the Plugin
1. Add the Widget to your site (sidebar,footer,etc) by going to Appearance -> Widgets and dragging the FCChat Widget to the apporpriate area (YOu MUST DO THIS FOR THE PLUGIN TO WORK - you can always hide the widget box if you don't want it to appear, by setting control_visible to "no" in the FCChat Settings).
1. Once you have added it to an area, open the `FCChat Widget' options dialog by clicking on the widget.
1. Follow the Steps listed in the dialog in order to activate the chat service. This will include signing up for a subscription to the service on www.fastcatsoftware.com.
1. Rate the plugin and verify that it works at wordpress.org.
1. Leave a comment regarding bugs, feature request, cocktail recipes at http://www.fastcatsoftware.com




When you upgrade to a new version, any customizations you made to the chat will be erased. In order to save those changes, do the following:

1. Make backup copies of any files that you have altered. You may wish to make backups of the following folders: (fcchat/config, fcchat/languages, fcchat/styles, fcchat/html/config). Place them in a safe place where they will not be deleted. 
1. Next uninstall the old version and install the current version. 
1. Finally, manually copy the changes you made to the old files into the current version's files. Do not replace the new files with the old files, as the structure of the new files may have changed; but instead, use the wordpress file editor to make the changes line by line.

Also, when you upgrade to a new version, it is NOT required that you obtain a new chat ID.


== Frequently Asked Questions ==

= Where is the demo? =

Here:

http://www.fastcatsoftware.com/wp3.3/

= How do I use/configure/administrate FCChat? =

Here are some places to look for information:

http://www.fastcatsoftware.com/chat/userguide/Index.html

http://www.fastcatsoftware.com/chat/Manual3.html

= How do I contact you if I have questions? =

Our email address:

support@fastcatsoftware.com

== Screenshots ==

1. Here, in screenshot-1.png an expansive view of the available `FCChat Widget` control panel hs been provided for your viewing pleasure.

2. screenshot-2.png catches the `FCChat Widget` in some hot on-page action.  Take care, number 7, your scene is next.

3. default.png shows what the chat looks like when you open it up. What a thing of beauty.

3. blue_silver.png The new blue silver style.

== Changelog ==

= 2.1 =

Version 2.1 of FCChat is the first version available as a wordpress plugin.

= 2.1.1 =

Fixed a bug in which modification of Javascript's Array.prototype by an external script caused chat window to crash.
Login panel is now appended to the document when autoLogin is false. This should prevent it from being hidden under
surrounding elements.
Added rounded borders to the login panel and alert panel.

= 2.1.2 =

Updated the user authentification system. Fixed a bug in which the 'Open Chat' and 'Off' buttons were malfunctioning when the 'default_on' option was set to false.

= 2.1.3 =

Fixed a bug that occurred using IE8. In split screen mode, A javascript error was preventing the scroll bar from scrolling.
Disabled the 'Read/Refresh Config File' button in the adminstration panel, which was not functioning properly. This bug will be fixed in a future version.

= 2.1.4 =

New features added: 1) Split the autoLogin configuration variable into two variables (auto_connect and require_login). When auto_connect is set to true, the chat will establish an anonymous (guest) connection to the server. When require_login is set to true, the user must enter a screen name and password before entry into the chat. 2) Added the ability to reconnect to the chat after the connection is broken, without requiring a page refresh. 3) Added a pause mode which allows the user to keep the chat open on one page, while browsing other pages withing the site in a separate tab or window.

= 2.1.5 =

Critical Bug Fix: A bug was fixed that was preventing users from signing in while the chat window was open.

= 2.1.6 =

Bug Fix: A bug was fixed that was preventing the logo from showing up in the left hand corner of the window on linix based systems. User profiles introduced. Room descriptions introduced. Compatibility with iPhone/iPod/iPad introduced. FCChat (with the exception of the video chat) no longer requires Flash, and is now fully compatable with browsers using the HTML5.0 websocket protocol. The options panel layout was upgraded in order to prepare it for future expansion.

= 2.1.7 =

Upgraded the widget to be more compatable with Wordpress theming.

= 2.1.8 =

Added sound effects. Rooms are now created/edited/deleted through the administration panel. Added "Change password" function in administration panel. Added "Promote to Administrator" function in administration panel. Added titles that can be assigned to user accounts.

= 2.1.9 =

Fixed a bug in the sound system that was preventing sounds from loading properly in ie. Fixed a bug in which defered scripts were causing failure to load on certain sites. Made the transition from the window mode to the split-screen mode more efficient.

= 2.1.10 =

Changed the name of the required script 'jGo/js/jgo.cookie.min.js' to 'jgo/js/jgo.c.min.js'. Some hosting environments were blocking the loading of the file due to the fact that the keyword 'cookie', in the filename, was being misinterpreted as a security threat. Upgraded the videochat container, making it compatable with the wordpress environment. Added the option of opening the chat window through a text link. Resolved a cross domain incompatablity issue that arose when sites were accessed without the full domain name: ie. http://yahoo.com instead of http://www.yahoo.com.

= 2.1.11 =

Fixed a bug in the administration panel that was preventing some configuration variables from being set properly. Added the ability to link the chat directly to wordpress user accounts.

= 2.1.11.1 =

Improved compatability with IE9

= 2.1.11.2 =

Fixed a bug which was causing the video chat window to open in the wrong location while in split-screen mode.

= 2.1.12 =

Added support for additional languages. Removed the style template from the config file, and created separate folders for language and style templates. Added a text prompt to the chat message box.

= 2.1.12.1 =

Fixed a small bug with the after_days text variable.

= 2.1.12.2 =

Fixed a small bug with the error_msg text variable.

= 2.1.13 =

Reorganized the language template. Fixed a bug which was preventing ie9 from loading the chat in integrated mode. Fixed a bug in which the profile page was receiving a 403 error on some sites.

= 2.1.13.1 =

Added the file editor to the administration panel. Made small changes to the default style.

= 2.1.13.2 =

Added the Spanish language template. This is a machine translation so will need a little touch up. Fixed a few minor bugs related to the presentation of alternate languages.

= 2.1.13.3 =

Some site were rejecting the path variable in the url to import.config.php. Created a patch for this

= 2.1.14 =

Added the language translation feature. Fixed text input so that non latin alphebets can now be represented in the chat.

= 2.1.14.1 =

Changed the names of the style templates. default.js -> default_header.js, wp_default -> default_sidebar.js, blue_silver.js -> blue_silver_header.js, wp_blue_silver.js -> blue_silver_sidebar.js

= 2.1.14.2 =

Changed the structure of the loading mechanism to make it more efficient.  Fixed a small bug with the timestamp display.

= 2.1.15 =

Added pop-out mode. The chat can now be launched into a browser pop-up window.

= 2.1.15.1 =

Changed the launch from link function so that it can launch the chat into a pop up window .

= 2.1.15.2 =

Fixed an issue with an extra script tag being inserted in the page and showing up in the html.

= 2.1.15.3 =

Fixed an issue with the window ordering.

= 2.1.16 =

Upgraded the video chat to 3.0. Delivers higher resolution video with the same bandwidth.

Introduced Fixed Mode: The chat widget can now be fixed to the browser window like a toolbar.

Split the style template files into two categories: widget templates and window templates. This makes it easier to mix and match.

= 2.1.17 =

The chat window can now be resized from the bottom. The chat is also resizable in the split screen mode.

= 2.1.17.1 =

Changed the file languages/spanish.js to the utf-8 format.

= 2.2 =

Introduces the SiteCenter toolbar interface, with a focus on user to user interaction. Whiteboard interface provided by Dabbleboard.com. Friends list added.

= 2.2.1 =

Fixed a bug with the whiteboard api interface. Added the Doodlepad. Added the ability to insert a URL of an image between the image tags.

Files Modified:
languages/english.js
languages/spanish.js

= 2.2.2 =

Added transliteration service. Changed the look of some of the icons. Added support for cookie sessions that do not expire.

Files Modified:
config/config.js
languages/english.js
languages/spanish.js
html/config/php_config.php
html/config/asp_config.asp
styles/chatcenter_default.js
styles/chatcenter_blue_silver.js

= 2.2.2.1 =

Bug Fix. A bug was fixed that occurred when the video chat windows were opened and close multiple times, causing the window to become detached from the frame.

= 2.2.3 =

Collaborative document feature introduced. windows can now be pinned or unpined from a fixed position on the browser screen.

Files Modified:
config/config.js
languages/english.js
languages/spanish.js
styles/chatcenter_blue_silver.js

= 2.2.4 =

Private video chat feature introduced. A bug was fixed which was causing the chat to freeze when you changed rooms with your video icon showing. Presentation of the loading state of the floating toolbar was changed, adding a yellow/green status light.

= 2.2.5 =

Two player games added.

Files Modified:
config/config.js
languages/english.js
languages/spanish.js
styles/widget_default_header.js
styles/widget_default_sidebar.js

= 2.2.5.1 =

Bug fixed: Changing users did not clear the friends list properly.
Bug fixed: "Ghost friends" were being added to some users accounts.
Bug fixed: Sending messages on enter was sporadically not working in ie9.
Added: A prompt to change your nickname, when viewing the online list and new messages dialog.

Files Modified:
config/config.js
languages/english.js
languages/spanish.js
styles/widget_default_header.js
styles/widget_default_sidebar.js
styles/chatcenter_default.js
styles/chatcenter_blue_silver.js

= 2.2.5.2 =

Added: an optional social media menu item for the toolbar, which allows your site visitors to share your site on Facebook, Twitter, etc.

Files Modified:
config/config.js
languages/english.js
languages/spanish.js
styles/widget_default_header.js
styles/widget_default_sidebar.js


= 2.2.5.3 =

Critical bug fix: The message alert box componenent was not being linked properly to the chat, causing problems with the administration panel and the forum integrated version of the chat.

= 2.2.5.4 =

Added a config variable "toolbar_mobile_hidden" which can be used to hide the floating toolbar in selected mobile platforms. The reason for this is that fixed positioning of page elements has spotty support in mobile apps.


= 2.2.6 =

The chat server was upgraded to allow easier integration of wp user accounts. Avatars may now be chosen without opening the ChatCenter.

= 2.2.6.1 =

Bug Fix: In the adminstration panel, the 'Update Select Server Configuration Variables' section was not working properly, due to an error introduced in the last update.
Bug Fix: A minor problem with the login reconnection mechanism was resolved.

= 2.2.6.2 =

Bug Fix: A syntax problem with the style templates was generating an error in ie6, preventing the chat from being displayed.

= 2.2.7 =

Country Flags and guest aliases added.

= 2.2.7.1 =

Bug Fix: A bug was fixed which was preventing the addition of CMS adminstrators

= 2.2.7.2 =

Bug Fix: A bug was fixed in which parseint was being used with the wrong radix, resulting in incorrect username length determination. A syntax error ws corrected relating to the usage of the variable use_avatar.

= 2.2.7.3 =

Bug Fix: A bug was fixed in html/Avatars.php in which a get variable was not checked for undefined values.

= 2.2.8 =

New styling, there are now three style templates to choose from for the ChatCenter.

= 2.2.8.1 =

Bug Fix: A bug was fixed that was preventing the friends list from being displayed.

Files Modified:
config/config.js
languages/english.js
languages/spanish.js
styles/widget_default_header.js
styles/widget_default_sidebar.js
styles/chatcenter_default.js
styles/chatcenter_blue_gray.js
styles/toolbar_default.js

= 2.2.8.2 =

Bug Fix: A bug was fixed that was preventing the floating toolbar dialog boxes from opening properly in Chrome.

= 2.2.9 =

A new drop-down menu system was introduced. The style of the toolbar was modified a bit.

Files Modified:
config/config.js
languages/english.js
languages/spanish.js
styles/widget_default_header.js
styles/widget_default_sidebar.js
styles/chatcenter_default.js
styles/chatcenter_light_gray.js
styles/chatcenter_blue_gray.js
styles/toolbar_default.js

= 2.2.10 =
Facebook Connect - Allows users to log in with their Facebook accounts.
New search menu items for the toolbar.
Banner Mode for mobile apps.
Fixed a few minor issues with the administration panel.
Added support for Joomla user integration

= 2.2.11 =
Promo - this feature introduces new users to the chat, and prompts them to create a chat name. 
Signature-users may write a signature statement which appears below their name.
A new sound was created for chatroom messages.
The style template chatcenter_default.js has been renamed to chatcenter_midnight_blue.js
Critical bug fix: In ie6, the opening of the change name dialog was causing a page reload.

= 2.2.12 =
User List Function. To disable, set show_user_list:false, in the config file.
You may now send messages to offline users.
Files Modified:
config/config.js
languages/english.js
languages/spanish.js
styles/widget_default_header.js
styles/widget_default_sidebar.js
styles/chatcenter_midnight_blue.js
styles/chatcenter_light_gray.js
styles/chatcenter_blue_gray.js
styles/toolbar_default.js

= 2.2.12.1 =
The client configuration has been moved to Settings->FCChat Settings, which you may access from your wordpress administration. No more having to manually edit the config.js file!
Files Modified:
config/config.js

= 2.2.13 =
new style templates for sites with darker backgrounds. Style templates found in the fcchat/styles/ folder.

= 2.2.13.1-7 =
Fixed security issue with fcchat/html/uploads.php file.

= 2.3 =
Updated the video chat to support h264 streaming. Added a new layout - "MsgCenter" which features instant messaging only.

= 2.3.1 =
Corrected an issue that manifested itself when the configuration variable prompt_user was set to false.

= 2.3.1.1-4 =
Corrected an issue that manifested itself when the configuration variable require_login was set to true, and popup_window_on_open was set to true. User could not sign in.

= 2.3.1.5 =
Corrected an issue with table css not being properly shielded. Also, an issue with avatar heights was corrected.

= 3.0.1 =
Corrected an issue with the textarea tags in ie.
Added the ability to post YouTube videos (thumbnail with link) simply by entering the url of the video.

= 3.0.2 =
Corrected an issue with the updating mechanism.

= 3.0.3 =
Corrected multiple issues with the video chat.

= 3.1 =
Corrected multiple issues with the video chat. Added the ability to quickly add customized buttons to the chat toolbar. Add a like button, a twitter button, a recent news button, top articles, etc. 

= 3.1.1 =
Corrected an issue with the quickstyling. Added disabled and hidden rooms that can be enabled on select pages. 

= 3.1.2 =
Corrected an issue with the access to locked rooms. The first room in the room list can now be password protected. 

= 3.1.3 =
Corrected an issue that was freezing the chat when "Open full chat" was pressed.

= 3.1.4 =
Corrected an issue that with the processing of non latin alphabets.

= 3.1.5 =
Addressed several issues involiving UTF-8 compatibility. Resolved an issue in which a bug in ie9 was causing scrollbars in the administration panel to scroll back to the top automatically.

= 3.1.6 =
Addressed a problem with user integration, which was preventing the assignment of a default administrative account.

= 3.2 =
Adds a nickname prompt for guest users. Avatar integration has been updated.

= 3.2.1 =
Corrects a critical error in 3.2.

= 3.2.2 =
Corrects a bug that appeared when the require_login variable was set to true.

= 3.3.0 =
Version 3.3.0. updates the chat display in mobile environments.

= 3.3.0.1 =
Transferred the collaborative document widget to in house servers.

= 3.3.0.2 =
Corrects a bug in which the chat toolbar was displaying incorrectly when minimized in the "topleft" or "bottomleft" configuration.

= 3.3.0.3 =
Temporarily removed the Whiteboard icon. We are currently searching for a replacement for the old whiteboard software, which is now defunct.

= 3.3.0.4 =
updates the chat login panel display.

Two new configuration options are available:

1) login_redirect: Lets you link the chat to your sign in page. (If you integrated your site accounts)

2) change_avatar: Enables/disables the change avatar option.

= 3.3.0.5 =
Changes the display of the toolbar from "fixed" positioning to "absolute" for mobile with top banner activated.

= 3.3.0.6 =
The width of the options panel has been reduced to fit within mobile displays.

= 3.3.0.7 =
Added 2 new options:
skip_roomlist: an option to skip opening the chat room list and proceed directly to the default room.
default_room_index: index of the default room.

= 3.3.0.8 =
The full page chat may now be embedded in an iframe.

= 3.3.0.9 =
Made a few adjustments so that the chat can fit within a smaller width, when embedded in an iframe.

= 3.4.0.0 =
Version 3.4 features an updated look for the toolbar. The toolbar now supports one touch conversation switching and conversation filtering. A bug which was causing the toolbar dialogs to close unexpectedly in mobile browsers was fixed. A bug causing incorrect placement of toolbar dialogs on ios6 was fixed. A bug causing the improper rendering of dialog windows on webkit based browsers was fixed. A bug causing the malfunction of the in bold, italic, and underline buttons in the user dialog box was fixed.

= 3.4.1.0 =
Version 3.4.1 adds better integration for mobile browsers, with 2 new mobile layouts. In addition, a full width banner toolbar is now available.

= 3.4.1.1 =
Changed the default location of the login box for mobile devices.

= 3.4.2.1 =
Version 3.4.2.1 updates the styling of the application window, and continues to add better support for mobile devices.

= 3.4.2.2 =
Bug fix - the online indicator was not displaying properly in firefox.
Bug fix - Some of the chat window panels, such as the userlist panel, were not aligned properly.
Bug fix - in chrome, removed the border around the change avatar panel.
Bug fix - hover color for user's screen name sometimes incorrectly turned to the "active" color.
Bug fix - In the change admin panel, the login box was not centered properly.
Bug fix - In the change admin panel, the connection was not being established with the server.

= 3.4.2.3 =
Added a new video icon.

= 3.4.2.4 =
Updated the FCChat/config/global.config.js file

= 3.4.2.5 =
Critical bug fix for ie8. Fixed a bug causing the chat to crash whenever the online diaglog box was updated.

= 3.4.2.6 =
Bug fix: The mobile banner mode was causing some sites to display with an improper width.

= 3.5.0.1 = 
Adds a "Contacts" button to the toolbar, which replaces the old "Friends" button. The contacts panel now consists of both the friends list, and a new feature - "Recent Conversations".

= 3.5.0.3 = 
A bug was fixed that was causing the improper display of the login box

= 3.5.0.4 = 
Updated the chat for compatibility with jquery 1.9.x

= 3.5.0.5 = 
Added a courtesy notice for mobile browsers not supported by the chat.

= 3.5.0.6 = 
Fixed a bug in which a debug alert was being generated when a room was edited.

= 3.5.0.7 = 
Fixed some bugs in the file editor, so, hopefully, it will be working again 8->.

= 3.5.1.0 = 
Added a new mod menu, and a new censor chat feature. Changed the styling of dialog boxes.

= 3.5.1.1 = 
Fixed a few bugs with the mobile display in version 3.5.1.

= 3.5.1.2 = 
Added a feature which enables you to resize the smileys for presentation in the smiley panel.

= 3.5.1.3 = 
Corrected an error with the rendering of default avatars.

= 3.5.1.4 = 
Fixed a bug that was preventing the transliteration service from initializing.

= 3.6.0.1-2 = 
Introduces the chatbox - including BlogChat.

= 3.6.0.3 = 
Fixed a bug related to the improper spacing of items in the toolbar, caused by the presence of the chatbox item.

= 3.6.0.4 = 
Video chat has been added to the chatbox. An option to hide guest users has also been added.

= 3.6.0.5 = 
Fixed a bug that was preventing direct access to the full page chat.

= 3.6.0.6 = 
Fixed a bug in the chatbox.

= 3.6.0.7 = 
Fixed a bug in the html/avatars.php and html/avatars.asp files.

= 3.6.0.8 = 
Improved the smileys and image upload interface.

= 3.6.0.9 = 
Updated the url to the shared document plugin.

= 3.6.1.0 = 
Added an option to remove the Online Panel from the ChatCenter. Removed the send buttons.

= 3.6.1.1 = 
Corrected an issue with the language files pertaining to the last update.

= 3.6.1.2 = 

Fixed an issue with the sidebar tabs when option show_online_panel is false. Corrected width of chatcenter panel in mobile.

= 3.6.1.3 = 

Fixed a small issue with the spacing of the messages only layout.

= 3.6.1.4 = 

Fixed an issue with the initial height of the user list window. Fixed an issue with the display of links arising from a faulty link discovery regex. Added support for EasySocial user integration in Joomla

= 3.6.1.5 = 

Updated the upload panel.

= 3.6.1.6 = 

Updated the avatars panel. Updated the ChatCenter styles. Fixed a bug with the resizing of the send chat input. Fixed a bug with the display colors in the user list panel.

= 3.6.2.0 = 

Added two tone styling option.

= 3.6.2.1 = 

Error in plugin file in previous version.

= 3.7 = 

Fixed scrolling divs in mobile.
Fixed the mobile banner resizing issue in ios7.
Added icons to the mobile banner.

= 3.7.1 = 

Added more touch and gesture events for a more fluid mobile experience.

= 3.7.2 = 

Added -webkit-transform: translate3d(0,0,0) support.

= 3.7.2.1 = 

Added horizontal layout for the chatbox.

= 3.8 - 3.8.1 = 

A variety of mobile enhancements introduced. New light gray style template.

= 3.8.3 = 

Fixed a bug in the html/Avatars.php file

= 3.8.3 = 

A few minor style updates.

= 3.8.4 = 

Fixed a bug concerning the location of the loginbox with respect to the toolbar.

== Upgrade Notice ==

= 2.x - 3.x =

*Requires that you obtain a new chat ID if you are upgrading from a version prior to 2.1.8.

To upgrade from any previous version to the current version, first, make backup copies of the 2 configuration files in your old installation (fcchat/config/config.js, fcchat/html/config/config.php) and place them in a safe place where they will not be deleted. Next uninstall the old version and install the current version. Finally, copy your old configuration setting manually to the current version's configuration files. Of course, if you made no alterations to the config files in your previous installation, you may just simply install the new version. Refresh your browser's cache and cookies after upgrading to insure that the browser is displaying the new installation correctly.
