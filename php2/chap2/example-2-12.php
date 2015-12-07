<?php
// Grab the first thirty characters of $_POST['comments']
$_POST['comments'] = 'Lorem ipsum dolor sit amet, noluisse hendrerit comprehensam vix id, eam id ornatus posidonium dissentias. Ne mediocrem urbanitas vis, ne meliore oportere mel. Putant omittam id vim. Cum in saepe praesent.';
print substr($_POST['comments'], 0, 30);
// Add an ellipsis
print '...';
