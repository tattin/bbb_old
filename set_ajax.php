<?php
require_once 'bootstrap.php';
require_once 'include_csv.php';
require_once 'getList.php';
require_once 'getSpec.php';

$data = array();
$data = getAllSpec($data);
echo json_encode($data);
// ƒAƒZƒ“•Û‘¶—pURL
function _getUrl($url){
    $return = file_get_contents("http://tinyurl.com/api-create.php?url=http://".$url);
    return $return;
}

?>