<?php 
include('./init.php');
alertMessage();
$recentItems = select('*', 'items', 'where approved = 1 order by date desc limit 4');
$cats = select('*','categories','where visibility = 1');
include('./include/templates/dashboard.php');

include('./include/templates/main/footer.php');
