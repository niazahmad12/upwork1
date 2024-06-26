<?php
include_once 'helpers/init.php';
//debugVar($_REQUEST);

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='add_user'){
    //debugVar($_REQUEST);
    $data=array();
    $aReturn=array();
    $post=array();
    $state='';
    $is_aof=0;
    $id=0;
    $ownership_percent=0;

    if(isset($_REQUEST['is_aof'])){
        $is_aof = $_REQUEST['is_aof'];
    }
    if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
        $id = $_REQUEST['id'];
    }

    parse_str($_REQUEST['data'],$post);

    //debugVar($post);
    if(isset($post['businessRepresentativeState']) && !empty($post['businessRepresentativeState'])){
        $state=$post['businessRepresentativeState'];
    }elseif(isset($post['businessRepresentativeState2']) && !empty($post['businessRepresentativeState2'])){
        $state=$post['businessRepresentativeState2'];
    }
    if(isset($post['ownershipPercentage']) && !empty($post['ownershipPercentage'])){
        $ownership_percent=preg_replace('/[^0-9]/', '',$post['ownershipPercentage']);
    }
    $data['id'] =  preg_replace('/[^0-9]/', '',$id);
    $data['user_id'] =  preg_replace('/[^0-9]/', '',$_REQUEST['uid']);
    $data['type'] =  $_REQUEST['user_type'];
    $data['is_aof'] =  $is_aof;
    $data['name'] =  trim($post['first_name'])." ".trim($post['last_name']);
    $data['first_name'] = trim($post['first_name']);
    $data['last_name'] = trim($post['last_name']);
    $data['role'] = trim($post['jobTitle']);
    $data['phone_number'] = trim(preg_replace('/[^0-9]/', '',$post['businessPhoneNumber']));
    $data['email'] = trim($post['email']);
    $data['citizenship_country'] = trim($post['citizenshipCountry']);
    $data['dob'] = trim($post['dateOfBirth']);
    $data['scn'] = trim(preg_replace('/[^0-9]/', '',$post['nationalIdentifier']));
    $data['residency_country'] = trim($post['residencyCountry']);
    $data['address1'] = trim($post['businessRepresentativeAddress1']);
    $data['address2'] = trim($post['businessRepresentativeAddress2']);
    $data['city'] = trim($post['businessRepresentativeCity']);
    $data['state'] = $state;
    
    if(isset($post['businessRepresentativeZipCode']) && !empty($post['businessRepresentativeZipCode'])){
        $data['zip'] = trim(preg_replace('/[^0-9]/', '',$post['businessRepresentativeZipCode']));
    }else{
        $data['zip'] = trim(preg_replace('/[^0-9]/', '',$post['businessOfficerZipCode']));
    }
   
    $data['ownership_percent'] = $ownership_percent;
    $data['business_officer'] = serialize($_REQUEST);
    
    //debugVar($data,true);

    if(!empty($data['id'])){
        $response=editUser($data);
        $aReturn['msg']='record updated successfully';
    }else{
        $response=addUser($data);
        $aReturn['msg']='record added successfully';
    }

    $aReturn['result']=$response;
    echo json_encode($aReturn);
    exit;
}

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='del'){
    $data=array();
    $response=del_business_officer($_REQUEST['id']);
    $data['msg']='record deleted successfully';
    $data['f']='1';
    $data['result']=$response;
    echo json_encode($data);
    exit;
}
if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='addowner'){
    //debugVar($_REQUEST['data']);
    $data=array();
    $aReturn=array();
    $post=array();
    $flag=true;
    parse_str($_REQUEST['data'],$post);
    //debugVar($post);
    // $data['user_id'] =  $_REQUEST['uid'];
    $data['name'] =  $post['first_name']." ".$post['last_name'];
    $data['name'] = trim($data['name'] );
    $data['user_id'] =  $_REQUEST['uid'];
    $data['type'] = 'bn';
    $data['data'] =  serialize($_REQUEST);
    
    $checkDuplicate=get_bo_by_name_type($data);
    //debugVar($checkDuplicate);
    if(empty($checkDuplicate)){
        $response=add_business_officer($data);
        $aReturn['msg']='record added successfully';
        $aReturn['f']='1';
        $aReturn['result']=$response;
        echo json_encode($aReturn);
    }
   
    //header("location: add_officer_dialog.php?id=".$_REQUEST['uid']."&msg=record added successfully");
    exit;
}


if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='add'){
    //debugVar($_REQUEST);
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
    echo json_encode($aReturn);
    //header("location: add_officer_dialog.php?id=".$_REQUEST['uid']."&msg=record added successfully");
    exit;
}
if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='edit'){
    $data=array();
    $aReturn=array();
    $post=array();
    //debugVar($_REQUEST);
    parse_str($_REQUEST['data'],$post);
   // debugVar($_REQUEST['id']);
   // debugVar($post);
    if(!empty($post['first_name']) && !empty($post['last_name']) && !empty($_REQUEST['id'])){
        $data['name'] =  trim($post['first_name'])." ".trim($post['last_name']);
        $data['id'] =  $_REQUEST['id'];
        $data['data'] =  serialize($post);
 // debugVar($post);
        $response=edit_business_officer($data);
        //debugVar($response);
    
        $aReturn['msg']='record edit successfully';
        $aReturn['f']='1';
        $aReturn['result']=$response;
        echo json_encode($aReturn);
    }
    exit;
}

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='add_off'){
    $data=array();
    $aReturn=array();
    $response='';
    $data['user_id'] =  $_REQUEST['uid'];
    $data['is_aof'] =  1;
    $data['name'] =  $_REQUEST['first_name']." ".$_REQUEST['last_name'];
    $data['name'] = trim($data['name'] );
    $data['data'] =  serialize($_REQUEST);
        if(!empty($_REQUEST['first_name']) && !empty($_REQUEST['last_name'])){
            $existingRecord=fetch_bo_aof($_REQUEST['uid']);
            if(!empty($existingRecord)){
            //debugVar($existingRecord["id"]);
            $data['id'] = $existingRecord["id"];
            edit_business_officer($data);
            }else{
                $response=add_business_officer($data);
            }
            $aReturn['msg']='record added successfully';
            $aReturn['f']='1';
            $aReturn['result']=$response;
            //debugVar($aReturn["id"]);
            echo json_encode($aReturn);
            exit;
        }
    
    
}

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='get_off'){
    //debugVar($_REQUEST);
    $data=array();
    $aReturn=array();
    $response=get_business_officer_list($_REQUEST['uid']);

    $aReturn['result']=$response;
    echo json_encode($aReturn);
    //echo $response;
    exit;
}

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='get_off_table'){
    //debugVar($_REQUEST);
    $data=array();
    $aReturn=array();
    $response=get_business_officer_table($_REQUEST['uid']);

    $aReturn['result']=$response;
    echo json_encode($aReturn);
    //echo $response;
    exit;
}

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=='get_bo_by_id'){
    //debugVar($_REQUEST);
    $data=array();
    $aReturn=array();
    $params='';
    if(!empty($_REQUEST['id'])){
        $response=get_bo_by_id($_REQUEST['id']);
       //  debugVar($response);
        $params = unserialize($response['business_officer']);
        //debugVar($params);
        // parse_str($params['data'],$data);
        //debugVar($data);
        $aReturn['data']=$response;
        echo json_encode($aReturn);
    }
  
    //echo $response;
    exit;
}
?>