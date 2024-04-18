<?php 

function getTreasureAccessToken($CLIENT_ID, $CLIENT_SECRET) {
    $token_url = 'https://sandbox.treasurefinancial.com/v1/oauth/token';

    $data = array(
    'client_id' => $CLIENT_ID,
    'client_secret' => $CLIENT_SECRET
    );

    $post_data = json_encode($data);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    ));

    $response = curl_exec($ch);

    if ($response === false) {
    die('Error: ' . curl_error($ch));
    }
    curl_close($ch);
    $response_data = json_decode($response, true);
    return $response_data['access_token'];
}

function createBusiness($access_token, $business_data) {

    $business_url = 'https://sandbox.treasurefinancial.com/v1/businesses';
    $post_data_business = json_encode($business_data);
    $ch_business = curl_init();
    curl_setopt($ch_business, CURLOPT_URL, $business_url);
    curl_setopt($ch_business, CURLOPT_POST, true);
    curl_setopt($ch_business, CURLOPT_POSTFIELDS, $post_data_business);
    curl_setopt($ch_business, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch_business, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json',
    'Authorization: Bearer ' . $access_token
    ));
    $response_business = curl_exec($ch_business);


    if ($response_business === false) {
        return 'Error: ' . curl_error($ch_business);
    }
 
    curl_close($ch_business);

    $response_data_business = json_decode($response_business, true);

    return $response_data_business;
    }

    //Onboarding call
function createOnBoarding($access_token, $business_data, $business_id) {
   
    $business_url = 'https://sandbox.treasurefinancial.com/v1/businesses/'.$business_id.'/onboarding';
    $post_data_business = json_encode($business_data);
  //var_dump( $post_data_business );exit;

    $ch_business = curl_init();
    curl_setopt($ch_business, CURLOPT_URL, $business_url);
    curl_setopt($ch_business, CURLOPT_POST, true);
    curl_setopt($ch_business, CURLOPT_POSTFIELDS, $post_data_business);
    curl_setopt($ch_business, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_business, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json',
    'Authorization: Bearer ' . $access_token
    ));

    $response_business = curl_exec($ch_business);
 

    if ($response_business === false) {
        return 'Error: ' . curl_error($ch_business);
    }

    curl_close($ch_business);
    
    $response_data_business = json_decode($response_business, true);

    return $response_data_business;
    }

    function country_list($id=0){
        include_once('DBClass.php');
        $db = new DBClass();
    
        $query="SELECT * FROM countries WHERE  status ='Y'";
        $rs=$db->query($query);
        $num_rows=$db->numRows($rs);
        $countries='';
        $selected='';
        while($row = $db->fetchAssoc($rs)) {
            $selected='';
            if(!empty($id) && $row["iso3"]==$id){
                $selected='selected="selected"';
            }
            $countries .= '<option value="'.$row["iso3"].'" '.$selected.'>'.strtolower($row["name"]).'</option>';
        }
        return $countries;
    }

    function states_list($id=0){
        include_once('DBClass.php');
        $db = new DBClass();
        $cid=226;
        $query="SELECT * FROM states WHERE  status ='Y' AND country_id = '".addslashes($cid)."'";
        $rs=$db->query($query);
        $num_rows=$db->numRows($rs);
        $states='';
        $selected='';
        while($row = $db->fetchAssoc($rs)) {
            $selected='';
            if(!empty($id) && $row["code"]==$id){
                $selected='selected="selected"';
            }
            $states .= '<option value="'.$row["code"].'" '.$selected.'>'.$row["name"].'</option>';
        }
        return $states;
    
    }

    
    function business_type_list($id=0){
        include_once('DBClass.php');
        $db = new DBClass();
        $cid=226;
        $query="SELECT * FROM business_type WHERE  status ='Y' ";
        $rs=$db->query($query);
        $num_rows=$db->numRows($rs);
        $types='';
        $selected='';
        while($row = $db->fetchAssoc($rs)) {
            $selected='';
            if(!empty($id) && $row["code"]==$id){
                $selected='selected="selected"';
            }
            $types .= '<option value="'.$row["code"].'" '.$selected.'>'.$row["type"].'</option>';
        }
        return $types;
    
    }
    function beneficial_ownership_exemption_list($id=0){
        global $beneficial_ownership_exemption;
        $list='';
        $selected='';
        foreach($beneficial_ownership_exemption as $key=>$val){
            $selected='';
            if(!empty($id) && $key==$id){
                $selected='selected="selected"';
            }
            $list .= '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
        }
      
        return $list;
    
    }
    function debugVar( $variableToDebug = "", $shouldExitAfterDebug = false)
    {
    if ( defined("DEBUG_ON")
        && DEBUG_ON == true )
    {
        $arrayFileDetails = debug_backtrace();
        echo "<pre style='background-color:orange; border:2px solid black; padding:5px; color:BLACK; font-size:13px;'>Debugging at line number <strong>" . $arrayFileDetails[0]["line"] . "</strong> in <strong>" . $arrayFileDetails[0]["file"] . "</strong>";

        if ( !empty($variableToDebug)  )
        {
            echo "<br /><font style='color:blue; font-weight:bold'><em>Value of the variable is:</em></font><br /><pre style='color:BLACK; font-size:13px;'>" . print_r( $variableToDebug, true ) . "</pre>";
        }
        else
        {
            echo "<br /><font style='color:RED; font-weight:bold;'><em>Variable is empty.</em></font>";
        }
        echo "</pre>";
        if ($shouldExitAfterDebug)
            exit();
    }
}

function add_business_officer($post){
    include_once('DBClass.php');
    $db = new DBClass();
    global $USERS;
    $data=array();
    $is_aof=0;
    $type="bo";
    if(isset($post['is_aof'])){
        $is_aof = $post['is_aof'];
    }
    if(isset($post['type'])){
        $type = $post['type'];
    }
    $query = "INSERT INTO business_officer(user_id, name, business_officer,is_aof,type) VALUES ('".addslashes($post["user_id"])."', '".addslashes($post["name"])."','".addslashes($post["data"])."','$is_aof','$type')";
    $rs=$db->query($query);
    return $rs;
}
function edit_business_officer($post){
    include_once('DBClass.php');
    $db = new DBClass();
    $query = "UPDATE business_officer SET name='".addslashes($post["name"])."', business_officer='".addslashes($post["data"])."' WHERE id= '$id'";
    $rs=$db->query($query);
    return $rs;
}
function addUser($post){
    include_once('DBClass.php');
    $db = new DBClass();
    //global $USERS;
    $data=array();
    $query = "INSERT INTO business_officer
    (
         user_id,
         type,
         first_name,
         last_name,
         name,
         is_aof,
         role,
         phone_number,
         email,
         citizenship_country,
         dob,
         scn,
         residency_country,
         address1,
         address2,
         city,
         state,
         zip,
         ownership_percent,
         business_officer
         ) 
        VALUES (
        '".addslashes($post["user_id"])."', 
        '".addslashes($post["type"])."', 
        '".addslashes($post["first_name"])."',
        '".addslashes($post["last_name"])."',
        '".addslashes($post["name"])."',
        '".addslashes($post["is_aof"])."',
        '".addslashes($post["role"])."',
        '".addslashes($post["phone_number"])."',
        '".addslashes($post["email"])."',
        '".addslashes($post["citizenship_country"])."',
        '".addslashes($post["dob"])."',
        '".addslashes($post["scn"])."',
        '".addslashes($post["residency_country"])."',
        '".addslashes($post["address1"])."',
        '".addslashes($post["address2"])."',
        '".addslashes($post["city"])."',
        '".addslashes($post["state"])."',
        '".addslashes($post["zip"])."',
        '".addslashes($post["ownership_percent"])."',
        '".addslashes($post["business_officer"])."'
        )";
    $rs=$db->query($query);
    return $rs;
}
function editUser($post){
    include_once('DBClass.php');
    $db = new DBClass();
    $current_datetime=date("Y-m-d H:i");
    $query = "UPDATE business_officer 
              SET 
                    first_name          = '".addslashes($post["first_name"])."',
                    last_name           = '".addslashes($post["last_name"])."',
                    name                = '".addslashes($post["name"])."',
                    role                = '".addslashes($post["role"])."',
                    phone_number        = '".addslashes($post["phone_number"])."',
                    email               = '".addslashes($post["email"])."',
                    citizenship_country = '".addslashes($post["citizenship_country"])."',
                    dob                 = '".addslashes($post["dob"])."',
                    scn                 = '".addslashes($post["scn"])."',
                    residency_country   = '".addslashes($post["residency_country"])."',
                    address1            = '".addslashes($post["address1"])."',
                    address2            = '".addslashes($post["address2"])."',
                    city                = '".addslashes($post["city"])."',
                    state               = '".addslashes($post["state"])."',
                    zip                 = '".addslashes($post["zip"])."',
                    ownership_percent   = '".addslashes($post["ownership_percent"])."',
                    business_officer    = '".addslashes($post["business_officer"])."'
                WHERE 
                    id= '".$post["id"]."'
                ";
    $rs=$db->query($query);
    return $rs;
}
function get_business_officer($id){
    include_once('DBClass.php');
    $db = new DBClass();
    //global $USERS;
    $data=array();
    $query="SELECT * FROM business_officer WHERE  user_id ='$id' ";
    $rs=$db->query($query);
    $num_rows=$db->numRows($rs);
    while($row = $db->fetchAssoc($rs)) {
        $data[]=$row;
    }
    return $data;
}
function get_business_officer_by_type($id,$type="bo"){
    include_once('DBClass.php');
    $db = new DBClass();
    //global $USERS;
    $data=array();
    $query="SELECT * FROM business_officer WHERE  user_id ='$id' AND type='$type' ";
    $rs=$db->query($query);
    $num_rows=$db->numRows($rs);
    while($row = $db->fetchAssoc($rs)) {
        $data[]=$row;
    }
    return $data;
}
function get_bo_by_id($id){
    include_once('DBClass.php');
    $db = new DBClass();
    //global $USERS;
    $data=array();
    $query="SELECT * FROM business_officer WHERE  id ='$id' ";
    $rs=$db->query($query);
    $num_rows=$db->numRows($rs);
    $row=$db->fetchArray($rs);
    return $row;

}
function del_business_officer($id){
    include_once('DBClass.php');
    $db = new DBClass();
    if(!empty($id)){
        $query="DELETE FROM business_officer WHERE  id ='$id' ";
        $rs=$db->query($query);
        return $rs;
    }
    
}
function del_user_all_officers($uid){
    include_once('DBClass.php');
    $db = new DBClass();
    if(!empty($uid)){
        $query="DELETE FROM business_officer WHERE  user_id ='$uid' ";
        $rs=$db->query($query);
        return $rs;
    }
    
}

function get_business_officer_list($uid=0,$type="bo"){
    include_once('DBClass.php');
    $db = new DBClass();

    $query="SELECT * FROM business_officer WHERE  user_id ='$uid' and type='$type'";
    $rs=$db->query($query);
    $num_rows=$db->numRows($rs);
    $list='';
    $selected='';
    $list = '<option value="nothing" selected="selected"> Select or add new business officier</option>';
    $list .= '<option value="add_officer"> Add business officier</option>';
    while($row = $db->fetchAssoc($rs)) {
        $selected='';
        // if($row["is_aof"]==1){
        //     $selected='selected="selected"';
        // }
        $list .= '<option value="'.$row["id"].'" '.$selected.'>'.$row["name"].'</option>';
    }
    return $list;

}

function fetch_bo_aof($uid){
    include_once('DBClass.php');
    $db = new DBClass();
    //global $USERS;
    $data=array();
    $query="SELECT * FROM business_officer WHERE  user_id ='$uid' and is_aof=1 LIMIT 1";
    $rs=$db->query($query);
    //$num_rows=$db->numRows($rs);
    $row = $db->fetchAssoc($rs);
    return $row;
}

function get_business_officer_table($id){
    include_once('DBClass.php');
    $db = new DBClass();
    //global $USERS;
    $data=array();
    $query="SELECT * FROM business_officer WHERE  user_id ='$id' ";
    $rs=$db->query($query);
    $num_rows=$db->numRows($rs);
    $html='';
    while($row = $db->fetchAssoc($rs)) {
        //$data[]=$row;
        $type=trim($row['type']);
        $html.='<tr>';
        $html.='<td style="width:80%;">'.$row["name"].'</td>';
        $html.='<td style="width:20%;">';
        $html.='<button type="button" class="btn btn-success edit_business_officer" id="btnEdit-'.$row["id"].'" data-id="'.$row["id"].'"  data-bs-toggle="modal" data-bs-target="#myModal" data-bs-whatever="@mdo" onclick="boe('.$row['id'].',&quot;'.$type.'&quot;)">Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='<button type="button" class="btn btn-danger" id="btnCancel-'.$row["id"].'" data-id="'.$row["id"].'" onclick="bod('.$row['id'].')">X</button>';
        $html.='</td>';
        $html.='</tr>';
    }
    return $html;
}

function get_bo_by_name_type($data){
    include_once('DBClass.php');
    $db = new DBClass();
    //global $USERS;
    //$data=array();
    $name = $data['name'];
    $type = $data['type'];
    $query="SELECT * FROM business_officer WHERE  name ='$name' and type = '$type'";
    $rs=$db->query($query);
    $num_rows=$db->numRows($rs);
    $row=$db->fetchArray($rs);
    return $row;

}
?>