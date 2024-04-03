<?php
include_once 'helpers/init.php';
//debugVar($_REQUEST);

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='del'){
    $data=array();
    $response=del_business_officer($_REQUEST['id']);
    $data['msg']='record deleted successfully';
    $data['f']='1';
    $data['result']=$response;
    echo json_encode($data);
    exit;
}

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='add'){
    debugVar($_REQUEST);
    $data=array();
    $aReturn=array();
    $data['user_id'] =  $_REQUEST['uid'];
    $data['name'] =  $_REQUEST['first_name']." ".$_REQUEST['last_name'];
    $data['name'] = trim($data['name'] );
    $data['data'] =  serialize($_REQUEST);
    $response=add_business_officer($data);
    $aReturn['msg']='record added successfully';
    $aReturn['f']='1';
    $aReturn['result']=$response;
    json_encode($aReturn);
    header("location: add_officer_dialog.php?id=".$_REQUEST['uid']."&msg=record added successfully");
    exit;
}
if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='edit'){
    $data=array();
    $aReturn=array();
    $post=array();
   // debugVar($_REQUEST);
    parse_str($_REQUEST['data'],$post);
    //debugVar($post);
    $data['id'] =  $_REQUEST['id'];
    $data['name'] =  trim($post['first_name']);
    $data['data'] =  serialize($post);

    $response=edit_business_officer($data);
   
    $aReturn['msg']='record edit successfully';
    $aReturn['f']='1';
    $aReturn['result']=$response;
    echo json_encode($aReturn);
    exit;
}

?>