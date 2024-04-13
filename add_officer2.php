<?php
include_once 'views/headers_popup.php';
include_once 'helpers/init.php';
?>
      <div id="divAODialog">
          <div class="mb-3">
                <label for="firstName" class="form-label">Legal Name</label>
                <input  type="text" name="first_name" id="first_name" value="" class="form-control aos" placeholder="First Name"  required><br>
                <input  type="text" name="last_name" id="last_name" value="" class="form-control aos" placeholder="Last Name"  required>
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Title / Role</label>
                <input  type="text" name="jobTitle" id="jobTitle"  class="form-control aos" placeholder="Last Name"  required>
            </div>
            <div class="mb-3">
                <label for="businessPhoneNumber" class="form-label">Business Phone Number</label>
                <!-- onkeypress="phone_number_mask(this.id);" -->
                <input  type="text" name="businessPhoneNumber" id="businessPhoneNumber"  class="form-control aos" placeholder="########## "   required maxlength="10">
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Email</label>
                <input  type="text" name="email" id="email"  class="form-control aos" placeholder="Email" value="abc@gmail.com"  required>
            </div>
            <div class="mb-3">
                <label for="citizenshipCountry" class="form-label">Country of Citizenship</label>
                <select class="form-select aos" name="citizenshipCountry" id="citizenshipCountry">
                    <?=country_list('USA')?>
                </select>  
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Date of Birth</label>
                <input  type="text" name="dateOfBirth" id="dateOfBirth"  class="form-control datepicker aos" placeholder="MM/DD/YYYY" required readonly>
            </div>
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Social Security Number</label>
                <input  type="text" name="nationalIdentifier" id="nationalIdentifier"  class="form-control aos" placeholder="#########" required maxlength="9">
            </div>
            <div class="mb-3">
                <label for="residencyCountry" class="form-label">Country of Residency</label>
                <select class="form-select aos" name="residencyCountry" id="residencyCountry">
                    <?=country_list('USA')?>
                </select>  
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeAddress1" id="businessRepresentativeAddress1" class="form-control aos"   placeholder="Address line 1" required>
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeAddress2" id="businessRepresentativeAddress2" class="form-control aos"  placeholder="Address line 2">
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeCity" id="businessRepresentativeCity" class="form-control aos"  placeholder="City" required>
            </div>
            <div class="mb-3">
                <label for="states" class="form-label">State</label>
                <select class="form-select aos" name="businessRepresentativeState" id="businessRepresentativeState">
                    <?=states_list()?>
                </select> 
                <input type="text" name="businessRepresentativeState2" id="businessRepresentativeState2" class="form-control aos" placeholder="state" style="display: none;"> 
            </div>
            <div class="mb-3">
                <input type="text" name="businessRepresentativeStateZipCode" id="businessRepresentativeZipCode" class="form-control aos"  placeholder="Zip"  style="width: 300px !important;">
            </div>
          </div>