<?php
include 'database.php';
$id    = $_POST['id'];
$key = $_POST['key'];



$json_return = array();
// $json_return['a'] = $_POST['todo_id'];
// $json_return['b'] = $_POST['input']; 
// $json_return['status'] = false;
// $to_insert = array(
// 		"user_id" => $user_id,
// 		"todo_name" => $todo_name
// );
if($key == 'todo'){
    $is_insert = $db->majorSubTask->updateOne(
        [ '_id' =>  new MongoDB\BSON\ObjectId ($id)],
        [ '$set' => [ 'is_complete' => true ]]
        );
}else{
    $is_insert = $db->sessionTask->updateOne(
        [ '_id' =>  new MongoDB\BSON\ObjectId ($id)],
        [ '$set' => [ 'is_complete' => true ]]
        );
}
if($is_insert){
    $json_return['status'] = 'success';
}else{
    $json_return['status'] = 'failed';
}

echo json_encode($json_return);



// include 'database.php';
// $id    = $_POST['id'];
// $key = $_POST['key'];



// $json_return = array();
// // $json_return['a'] = $_POST['todo_id'];
// // $json_return['b'] = $_POST['input']; 
// // $json_return['status'] = false;
// // $to_insert = array(
// // 		"user_id" => $user_id,
// // 		"todo_name" => $todo_name
// // );
// if($key == 'todo'){
//     $is_insert = $db->majorSubTask->updateOne(
//         [ '_id' =>  new MongoDB\BSON\ObjectId ($id)],
//         [ '$set' => [ 'is_complete' => true ]]
//         );
// }else{
//     $where = array(
//         '_id' => new MongoDB\BSON\ObjectId ($id)
//     );
//     $select_fields = array(
//         'date_completed' => 1,
//     );
//     $options = array(
//         'projection' => $select_fields
//     );
//     $is_exist = $db->sessionTask->findOne($where, $options);
//     if(!$is_exist){
//         $is_insert = $db->sessionTask->updateOne(
//             [ '_id' =>  new MongoDB\BSON\ObjectId ($id)],
//             [ '$set' => [ 'is_complete' => true ,  'date_completed' => $_POST['date_completed'] ]]
//         );
//     } else {
//         $is_insert = $db->sessionTask->updateOne(
//             [ '_id' =>  new MongoDB\BSON\ObjectId ($id)],
//             [ '$set' => [ 'is_complete' => true ]]
//         );

//     }
// }
// if($is_insert){
//     $json_return['status'] = 'success';
// }else{
//     $json_return['status'] = 'failed';
// }

// echo json_encode($json_return);


?>

