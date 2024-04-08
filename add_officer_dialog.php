<?php
include_once 'views/headers_popup.php';
include_once 'helpers/init.php';
?>


<form name="frmAddOfficer" id="frmAddOfficer" method="post" action="process.ajax.php">
    <input type="hidden" name="ac" value="add">
   
    <input type="hidden" name="uid" value="<?=$_REQUEST['id']?>">
        <div class="mt-2 mr-5 p-3">
        <h3 class="mb-3 mt-3">Add Business Owners</h3>
        <?php
            if(isset($_REQUEST['msg'])){
                echo '<div class="alert alert-success">'.$_REQUEST['msg'].'</div>';
            }
            ?>
            <div class="mb-3">
                <label for="firstName" class="form-label">Legal Name</label>
                <input  type="text" name="first_name" id="first_name" value="" class="form-control" placeholder="First Name"  required><br>
                <input  type="text" name="last_name" id="last_name" value="" class="form-control" placeholder="Last Name"  required>
            </div>
          
            <div class="mb-3">
                <label for="ownershipPercentage" class="form-label">Ownership percentage</label>
                <input  type="number" name="ownershipPercentage" id="ownershipPercentage"  class="form-control" placeholder="%"  value="0" required maxlength="3" style="width: 80px;">
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Title / Role</label>
                <input  type="text" name="jobTitle" id="jobTitle"  class="form-control" placeholder="Last Name"  required>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Business Phone Number</label>
                <input  type="text" name="phoneNumber" id="phoneNumber"  class="form-control" placeholder="########## "  required maxlength="10">
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Email</label>
                <input  type="text" name="email" id="email"  class="form-control" placeholder="Email" value="abc@gmail.com"  required>
            </div>
            <div class="mb-3">
                <label for="citizenshipCountry" class="form-label">Country of Citizenship</label>
                <select class="form-select" name="citizenshipCountry" id="citizenshipCountry">
                    <?=country_list('USA')?>
                </select>  
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Date of Birth</label>
                <input  type="text" name="dateOfBirth" id="dateOfBirth"  class="form-control datepicker" placeholder="MM/DD/YYYY" required readonly>
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Social Security Number</label>
                <input  type="text" name="nationalIdentifier" id="nationalIdentifier"  class="form-control" placeholder="#########" required maxlength="9">
            </div>
            <div class="mb-3">
                <label for="residencyCountry" class="form-label">Country of Residency</label>
                <select class="form-select" name="residencyCountry" id="residencyCountry">
                    <?=country_list('USA')?>
                </select>  
            </div>
            <div class="mb-3">
                <input type="text" name="address1" id="address1" class="form-control"   placeholder="Address line 1" required>
            </div>
            <div class="mb-3">
                <input type="text" name="address2" id="address2" class="form-control"  placeholder="Address line 2">
            </div>
            <div class="mb-3">
                <input type="text" name="city" id="city" class="form-control"  placeholder="City" required>
            </div>
            <div class="mb-3">
                <label for="states" class="form-label">State</label>
                <select class="form-select" name="state" id="state">
                    <?=states_list()?>
                </select> 
                <input type="text" name="state2" id="state2" class="form-control" placeholder="state" style="display: none;"> 
            </div>
            <div class="mb-3">
                <input type="text" name="zipCode" id="zipCode" class="form-control"  placeholder="Zip"  style="width: 300px !important;">
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-primary" onclick="self.close();">Cancel</button>
            </div>
        </div>        
</form>       