<?php
include_once 'views/headers_popup.php';
include_once 'helpers/init.php';
 //debugVar($_REQUEST);
 $result=get_bo_by_id($_REQUEST['id']);
 // debugVar($result);
 $fname='';
 $lname='';
 $jobTitle='';
 $phoneNumber='';
 $email='';
 $citizenshipCountry='USA';
 $dateOfBirth='';
 $nationalIdentifier='';
 $residencyCountry='USA';
 $address1='';
 $address2='';
 $city='';
 $states='';
 $state2='';
 $zipCode='';
 $id=$_REQUEST['id'];
 $params = array();
 $data = array();
 if(!empty($result['business_officer'])){
    $params = unserialize($result['business_officer']);
   // debugVar($params['data']);
    parse_str($params['data'],$data);
    //debugVar($data);
    $fname=$data['first_name'];
    $lname=$data['last_name'];
    $jobTitle=$data['jobTitle'];
    $phoneNumber=$data['businessPhoneNumber'];
    $email=$data['email'];
    $citizenshipCountry=$data['citizenshipCountry'];
    $dateOfBirth=$data['dateOfBirth'];
    $nationalIdentifier=$data['nationalIdentifier'];
    $residencyCountry=$data['residencyCountry'];
    $address1=$data['businessRepresentativeAddress1'];
    $address2=$data['businessRepresentativeAddress2'];
    $city=$data['businessRepresentativeCity'];
  
    $state2=$data['businessRepresentativeState2'];
    $zipCode=$data['businessRepresentativeStateZipCode'];
    if(isset($data['businessRepresentativeState'])){
        $states=$data['businessRepresentativeState'];
    }
    if(isset($data['businessRepresentativeState2'])){
        $state2=$data['businessRepresentativeState2'];
    }
 }
 //debugVar($data);
?>
<form name="frmEditOfficer" id="frmEditOfficer" method="post" action="">
    <input type="hidden" name="ac" value="edit">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="mt-2 mr-5 p-3">
<h3 class="mb-3 mt-3">Update Business Representative</h3>
          <div class="mb-3">
                <label for="firstName" class="form-label">Legal Name</label>
                <input  type="text" name="first_name" id="first_name" value="<?=$fname;?>" class="form-control aos" placeholder="First Name"  required><br>
                <input  type="text" name="last_name" id="last_name" value="<?=$lname;?>" class="form-control aos" placeholder="Last Name"  required>
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Title / Role</label>
                <input  type="text" name="jobTitle" id="jobTitle" value="<?=$jobTitle;?>"  class="form-control aos" placeholder="Last Name"  required>
            </div>
            <div class="mb-3">
                <label for="businessPhoneNumber" class="form-label">Business Phone Number</label>
                <!-- onkeypress="phone_number_mask(this.id);" -->
                <input  type="text" name="businessPhoneNumber" id="businessPhoneNumber" value="<?=$phoneNumber;?>" class="form-control aos" placeholder="########## "   required maxlength="10">
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Email</label>
                <input  type="text" name="email" id="email"  value="<?=$email?>"class="form-control aos" placeholder="Email" value="abc@gmail.com"  required>
            </div>
            <div class="mb-3">
                <label for="citizenshipCountry" class="form-label">Country of Citizenship</label>
                <select class="form-select aos" name="citizenshipCountry" id="citizenshipCountry">
                    <?=country_list($citizenshipCountry)?>
                </select>  
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Date of Birth</label>
                <input  type="text" name="dateOfBirth" id="dateOfBirth" value="<?=$dateOfBirth?>" class="form-control datepicker aos" placeholder="MM/DD/YYYY" required readonly>
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Social Security Number</label>
                <input  type="text" name="nationalIdentifier" id="nationalIdentifier" value="<?=$nationalIdentifier?>"  class="form-control aos" placeholder="#########" required maxlength="9">
            </div>
            <div class="mb-3">
                <label for="residencyCountry" class="form-label">Country of Residency</label>
                <select class="form-select aos" name="residencyCountry" id="residencyCountry">
                    <?=country_list($residencyCountry)?>
                </select>  
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeAddress1" id="businessRepresentativeAddress1" value="<?=$address1;?>" class="form-control aos"   placeholder="Address line 1" required>
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeAddress2" id="businessRepresentativeAddress2" value="<?=$address2;?>" class="form-control aos"  placeholder="Address line 2">
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeCity" id="businessRepresentativeCity" value="<?=$city;?>" class="form-control aos"  placeholder="City" required>
            </div>
            <div class="mb-3">
                <label for="states" class="form-label">State</label>
                <select class="form-select aos" name="businessRepresentativeState" id="businessRepresentativeState">
                    <?=states_list($states)?>
                </select> 
                <input type="text" name="businessRepresentativeState2" id="businessRepresentativeState2" value="<?=$state2?>" class="form-control aos" placeholder="state" style="display: none;"> 
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeStateZipCode" id="businessRepresentativeZipCode" value="<?=$zipCode?>" class="form-control aos"  placeholder="Zip"  style="width: 300px !important;">
            </div>
            <div class="mb-3">
            <button type="button" class="btn btn-primary" onclick="editOfficer('<?=$id?>')">Update</button>
            <button type="button" class="btn btn-primary" onclick="self.close();">Cancel</button>
            </div>
          </div>