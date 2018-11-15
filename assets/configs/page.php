<?php

//General settings
$sitename = "insert_here";
$url = "insert_here";


//Page titels

//=====================Permission 0

if(strcmp($_GET['page'], "") == 0) { $pagename = "Dashboard"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "filemanager") == 0) { $pagename = "Filemanager"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "matches") == 0) { $pagename = "Matches"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "matches-add") == 0) { $pagename = "Matches - Add"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "matches-edit") == 0) { $pagename = "Matches - Edit"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "matches-all") == 0) { $pagename = "Matches - View All"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "events") == 0) { $pagename = "Events"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "events-add") == 0) { $pagename = "Events - Add"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "events-edit") == 0) { $pagename = "Events - Edit"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "press-releases") == 0) { $pagename = "Press Releases"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "press-releases-add") == 0) { $pagename = "Press Releases - Add"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "press-releases-edit") == 0) { $pagename = "Press Releases - Edit"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "tasks") == 0) { $pagename = "Tasks"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "tasks-add") == 0) { $pagename = "Tasks - Add"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "tasks-edit") == 0) { $pagename = "Tasks - Edit"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "announcements") == 0) { $pagename = "Announcements"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "announcements-add") == 0) { $pagename = "Announcements - Add"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "announcements-edit") == 0) { $pagename = "Announcements - Edit"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "teams") == 0) { $pagename = "Teams"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "teams-edit") == 0) { $pagename = "Teams - Edit"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "teams-add") == 0) { $pagename = "Teams - Add"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "games") == 0) { $pagename = "Games"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "games-edit") == 0) { $pagename = "Games - Edit"; $page_minpermission = "0"; } else {}
if(strcmp($_GET['page'], "games-add") == 0) { $pagename = "Games - Add"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "my-settings") == 0) { $pagename = "Profile - Edit"; $page_minpermission = "0"; } else {}

if(strcmp($_GET['page'], "profiles") == 0) { $pagename = "Profile"; $page_minpermission = "0"; } else {}

//=====================Permission 1

if(strcmp($_GET['page'], "invoices") == 0) { $pagename = "Invoices"; $page_minpermission = "1"; } else {}
if(strcmp($_GET['page'], "invoices-add") == 0) { $pagename = "Invoices - Add"; $page_minpermission = "1"; } else {}
if(strcmp($_GET['page'], "invoices-edit") == 0) { $pagename = "Invoices - Edit"; $page_minpermission = "1"; } else {}

if(strcmp($_GET['page'], "social-twitter") == 0) { $pagename = "Twitter"; $page_minpermission = "1"; } else {}
if(strcmp($_GET['page'], "social-facebook") == 0) { $pagename = "Facebook"; $page_minpermission = "1"; } else {}
if(strcmp($_GET['page'], "social-twitch") == 0) { $pagename = "Twitch"; $page_minpermission = "1"; } else {}

if(strcmp($_GET['page'], "reportings") == 0) { $pagename = "Reportings"; $page_minpermission = "1"; } else {}

if(strcmp($_GET['page'], "changelog") == 0) { $pagename = "Changelog"; $page_minpermission = "1"; } else {}

if(strcmp($_GET['page'], "socialmediarequests") == 0) { $pagename = "Social Media Requests"; $page_minpermission = "1"; } else {}

if(strcmp($_GET['page'], "advertisement") == 0) { $pagename = "Advertisements"; $page_minpermission = "1"; } else {}
if(strcmp($_GET['page'], "advertisement-stats") == 0) { $pagename = "Advertisements - Statistics"; $page_minpermission = "1"; } else {}
if(strcmp($_GET['page'], "advertisement-add") == 0) { $pagename = "Advertisements - Add"; $page_minpermission = "1"; } else {}
if(strcmp($_GET['page'], "advertisement-edit") == 0) { $pagename = "Advertisements - Edit"; $page_minpermission = "1"; } else {}

//=====================Permission 5

if(strcmp($_GET['page'], "accounts") == 0) { $pagename = "Accounts"; $page_minpermission = "5"; } else {}
if(strcmp($_GET['page'], "accounts-add") == 0) { $pagename = "Accounts - Add"; $page_minpermission = "5"; } else {}
if(strcmp($_GET['page'], "accounts-edit") == 0) { $pagename = "Accounts - Edit"; $page_minpermission = "5"; } else {}

?>
