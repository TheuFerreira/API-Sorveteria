<?php

require '../../database/connection.php';
require '../../dao/dao_category.php';

$dao = new DAOCategory();
$result = $dao->getAllCategories();
echo json_encode($result);

?>