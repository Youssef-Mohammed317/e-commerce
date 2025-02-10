<?php
$mainNav = true;
include('./init.php');
alertMessage();
$totalMembers = count(select('id','users'));

$VIPMembers = count(select('id','users','where rank = "VIP"'));

$approvedMembers = count(select('id','users','where status = 1'));

$pendingMembers = count(select('id','users','where status = 0'));

$totalCategories = count(select('id','categories'));

$totalItems = count(select('item_id','items'));

$approvedItems = count(select('item_id','items','where approved = 1'));

$pendingItems = count(select('item_id','items','where approved = 0'));

$totalComments = count(select('id','comments'));

$approvedComments = count(select('id','comments','where status = 1'));

$pendingComments = count(select('id','comments','where status = 0'));


$latestUsers = select('*','users','where rank != "admin"','ORDER BY status ASC, date DESC','LIMIT 6');

$latestCategories = select('*','categories','','ORDER BY id DESC','LIMIT 6');

$latestItems = select('*','items','','ORDER BY approved ASC, date DESC','LIMIT 6');

$latestComments = select('*','comments','','ORDER BY status ASC, date DESC','LIMIT 6');

include('./include/templates/dashboard.php');
include('./include/templates/main/footer.php');
