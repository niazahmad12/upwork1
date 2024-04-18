<?php
include_once 'helpers/init.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$mapping=[];
$post=array();
$access_token = getTreasureAccessToken($CLIENT_ID,$CLIENT_SECRET);

//var_dump($access_token);

$create_business_data = [
    "legal_name"=> "Treasure Financial",
    "doing_business_as"=> "Treasure",
    "user_data"=> [
      "additionalProp1"=> []
    ]
];

$business_setup = createBusiness($access_token , $create_business_data);
$business_id='';
//debugVar($business_setup,true);
if(!empty($business_setup )){
    $business_id=$business_setup['id'];
}

$post = $_POST;
//debugVar($post);
$state='';
$aDob='';
$aBO=array();
$aBusinessMembers=array();
$businessMembersState='';
$aBRep=array();

$businessRepresentativeState='';
if(isset($post['state']) && $post['state']!=''){
  $state=$post['state'];
}elseif(isset($post['state2']) && $post['state2']!=''){
  $state=$post['state2'];
}

if(isset($post['businessRepresentativeState']) && $post['businessRepresentativeState']!=''){
  $businessRepresentativeState=$post['businessRepresentativeState'];
}elseif(isset($post['businessRepresentativeState2']) && $post['businessRepresentativeState2']!=''){
  $businessRepresentativeState=$post['businessRepresentativeState2'];
}

if(!empty($post['dateOfBirth'])){
  $aDob = explode("/",$post['dateOfBirth']);
}


if(!empty($post['uid'])){
  $aRecordOfficer =get_business_officer_by_type($post['uid'],"bo");
  if(!empty($aRecordOfficer)){
    foreach($aRecordOfficer as $key => $val){

      $aBO['first_name']=$val['first_name'];
      $aBO['last_name']=$val['last_name'];
      if(!empty($val['dob'])){
        $boDob = explode("/",$val['dob']);
        $aBO['date_of_birth']=array('month'=>$boDob[0],'day'=>$boDob[1],'year'=>$boDob[2]);
      }
      $aBO['residency_country']=$val['residency_country'];
      $aBO['citizenship_country']=$val['citizenship_country'];
      $aBO['job_title']=$val['role'];
      $aBO['is_entity_officer']=true;
      $aBO['phone_number']=array('country_code'=>'+1','phone_number'=>preg_replace('/[^0-9]/', '', $val['phone_number'])); //string,minLength: 10,maxLength: 10
      $aBO['is_authorized_signer']=false;
      if(isset($val['state']) && $val['state']!=''){
        $businessMembersState=$val['state'];
      }
      // if(isset($business_officer['businessRepresentativeState2']) && $business_officer['businessRepresentativeState2']!=''){
      //   $businessMembersState=$business_officer['businessRepresentativeState2'];
      // }

      
      $aBO['addresses'][]=array('address1'=>$val['address1'],'address2'=>$val['address2'],'city'=>$val['city'],
      'postal_code'=>$val['zip'],'region'=> $businessMembersState,'country'=>$val['citizenship_country']);
      $aBO['ownership_percentage']=0;
      $aBO['national_identifier']=$val['scn'];
      $aBO['email']=$val['email'];

      $aBusinessMembers[]=$aBO;
      //debugVar($aBO);
    }
  }
  //debugVar($aBusinessMembers);
}


$mapping['business']['have_interested_parties_to_report']=false ;//* boolean;
//minItems:1 maxItems:10
$mapping['business']['addresses'][]=array(
  'address1'=>$post['address1'] ,'address2'=>$post['address2'],'city'=>$post['city'],'region'=>$state,'country'=>$post['businessCountry'],'postal_code'=>$post['zipCode'],
);
//phone_number: string,minLength: 10,maxLength: 10,example: 5555555555
$mapping['business']['phone_number']=array('country_code'=>'+1','phone_number'=>preg_replace('/[^0-9]/', '', $post['phoneNumber']));
$mapping['business']['business_description']=$post['businessDescription'];
$mapping['business']['business_type']=$post['businessTypeId'];
$mapping['business']['tax_classification']=$post['taxClassification'];
$mapping['business']['investment_objective']=$post['investment_objective'];
$mapping['business']['industry_type']=$post['industryType'];

$mapping['business']['tax_identification_number']=$post['ein']; //string,minLength: 0,maxLength: 9,example: 123456789
$mapping['business']['annual_gross_revenue']=array('currency'=>'USD','amount'=>number_format($post['annual_gross_revenue'], 2, ".", ""));
$mapping['business']['total_liquid_assets']=array('currency'=>'USD','amount'=>number_format($post['total_liquid_assets'],2,".",""));
$mapping['business']['exempt_listing_beneficial_owners']=false; //* boolean 
$mapping['business']['foreign_financial_institution']=false; //* boolean
$mapping['business']['business_members']=$aBusinessMembers;



/* business_member_onboarding */
$mapping['business_member_onboarding']['first_name']=$post['first_name'];
$mapping['business_member_onboarding']['last_name']=$post['last_name'];


$mapping['business_member_onboarding']['date_of_birth']=array('month'=>$aDob[0],'day'=>$aDob[1],'year'=>$aDob[2]);
$mapping['business_member_onboarding']['residency_country']=$post['residencyCountry'];
$mapping['business_member_onboarding']['citizenship_country']=$post['citizenshipCountry'];
$mapping['business_member_onboarding']['job_title']=$post['jobTitle'];
$mapping['business_member_onboarding']['is_entity_officer']=true; //* boolean
$mapping['business_member_onboarding']['phone_number']=array('country_code'=>'+1','phone_number'=>preg_replace('/[^0-9]/', '', $post['businessPhoneNumber']));
$mapping['business_member_onboarding']['is_authorized_signer']=true; //* boolean
$mapping['business_member_onboarding']['addresses'][]=array('address1'=>$post['businessRepresentativeAddress1'],'address2'=>$post['businessRepresentativeAddress2'],'city'=>$post['businessRepresentativeCity'],
'postal_code'=>$post['businessRepresentativeZipCode'],'region'=>$businessRepresentativeState,'country'=>$post['citizenshipCountry']);

$ownershipPercentage=0;
if(!empty($post['ownershipPercentage'])){
  $ownershipPercentage = $post['ownershipPercentage'];
}

$mapping['business_member_onboarding']['ownership_percentage']=$ownershipPercentage;

$mapping['business_member_onboarding']['leader_of_public_company']=isset($post['leaderOfPublicCompany'])?true:false;
$mapping['business_member_onboarding']['broker_dealer']=isset($post['brokerDealer'])?true:false;
$mapping['business_member_onboarding']['large_trader']=isset($post['largeTrader'])?true:false;
$mapping['business_member_onboarding']['stock_exchange_finra_member_associated']=isset($post['stockExchangeFinraMemberAssociated'])?true:false;
$mapping['business_member_onboarding']['politically_exposed']=isset($post['politicallyExposed'])?true:false;
$mapping['business_member_onboarding']['national_identifier']=$post['nationalIdentifier'];
$mapping['business_member_onboarding']['email']=$post['email'];

//	OnboardingPoliciesObject
$mapping['policies']['bank_account_agreement']=false ;//boolean
$mapping['policies']['investment_management_agreement']=true ;//boolean
$mapping['policies']['entity_llc_agreement']=true ;//boolean
$mapping['policies']['entity_corporation_cash_account_agreement']=false ;//boolean
$mapping['policies']['entity_new_account_ria']=true ;//boolean
//debugVar($mapping);
//exit;

$jsonEncode = json_encode($mapping,true);

//debugVar($jsonEncode);

// $business_data_dcode = json_decode($business_data,true);
// debugVar($business_data_dcode);
//$bid='23e0cec2-f1ee-11ee-aa14-759416b06ab6';
$bording = createOnBoarding($access_token, $mapping,$business_id);
print_r($bording);

//debugVar($bording['error_message']);
//debugVar($bording['error_code']);
if(empty($bording['error_message']))
  del_user_all_officers($post['uid']);

?>