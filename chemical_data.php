<?php
error_reporting(E_ALL);
ini_set('display_errors',1);



//$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
//if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android ) {


$post_from_android = $_POST['result'];

//    $post_from_android = "가솔린";






$file_path = file_get_contents("chemical_data.json");
$array = json_decode($file_path, true);


$data_json[0] = $post_from_android;
$json_index = 1;
for($i=0; $i<2148; $i++){
    if($post_from_android == $array[$i]["화학물질/성분"]){
        $result_data = $array[$i]["위험군"];
        //echo $result_data;
        $data_json[$json_index] = $result_data;
        $json_index++;
    }
}

$output = json_encode($data_json,JSON_UNESCAPED_UNICODE);
echo urldecode($output);

//}





?>