<?php
include_once 'views/headers.php';
include_once 'helpers/init.php';

//debugVar(country_list('USA'));
//debugVar(beneficial_ownership_exemption_list());
$user='test1';
$uid=$USERS[$user];
$business_officer=get_business_officer($uid);
//debugVar($business_officer);

//debugVar($uid);
//debugVar($_REQUEST['id']);
?>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:10px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
        <div id="add_bussiness_officer"></div>
        <div id="update_bussiness_officer"></div>
        <div id="add_bussiness_owner"></div>
        <div id="update_bussiness_owner"></div>
<div class="container section mt-2">
        <form name="treasureForm" id="treasureForm" method="post" action="process.php">
            <input type="hidden" name="uid" id="uid" value="<?=$uid?>">
                <!-- Start Step-1 Business Structure -->
                <div class="tab">
                    <h3 class="p-2">Business Structure</h3>
                    <span>
                    This information about your business helps Treasure meet requirements from regulators and financial partners. 
                    By continuing you agree to our 
                    <a href="https://www.treasurefi.com/investment-agreement" rel="noreferrer" target="_blank">Investment Management Agreement</a>, 
                    <a href="https://www.treasurefi.com/bank-account-agreement" rel="noreferrer" target="_blank">Grasshopper Bank N.A. Account Agreement</a>, 
                    <a href="https://www.treasurefi.com/privacy-policy" rel="noreferrer" target="_blank">Privacy Policy</a> and
                    <a href="https://www.treasurefi.com/terms-of-use" rel="noreferrer" target="_blank">Terms of Use</a>
                    </span>       
                    <div class="mb-5 mt-3 form-check">
                        <input type="checkbox" class="form-check-input" id="accountTerms" name="accountTerms" required>
                        <label class="form-check-label" for="chk-terms">I agree to these account terms</label>
                    </div>

                    <div class="mb-3">
                        <label for="businessCountry" class="form-label">Registered Business Address</label>
                        <select class="form-select" name="businessCountry" id="businessCountry" name="businessCountry" required>
                        <option value="">Please country</option>
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
                        <!-- <label for="states" class="form-label">State</label> -->
                        <select class="form-select" name="state" id="state" required>
                            <?=states_list()?>
                        </select> 
                        <input type="text" name="state2" id="state2" class="form-control" placeholder="state" style="display: none;"> 
                    </div>
                    <div class="mb-3">
                        <input type="text" name="zipCode" id="zipCode" class="form-control"  placeholder="Zip"  style="width: 300px !important;" required>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Business Phone Number</label>
                        <!-- onkeypress="phone_number_mask(this.id);" -->
                        <input  type="text" name="phoneNumber" id="phoneNumber"  class="form-control" placeholder="########## "  required maxlength="10">
                    </div>

                    <div class="mb-3">
                        <label for="businessTypeId" class="form-label">Type of Business</label>
                        <select class="form-select" name="businessTypeId" id="businessTypeId" required>
                            <option value="">Please select</option>
                            <?=business_type_list()?>
                        </select>  
                    </div>
        
            </div> 
            <!-- End Step-1 Business Structure -->
        
            <!-- Start Step-2 Business Details -->       
            <div class="tab">
                <h3>Business Details</h3>
                <div class="mb-2 mt-2">
                    <label for="legalName" class="form-label">Legal business name</label>
                    <input  type="text" name="legalName" id="legalName"  class="form-control" placeholder="Company" required>
                    <span class="mb-5">The combination of your name and Employer Identification Number 
                        (EIN) must exactly match the one listed on your IRS documents 
                        (e.g., Letter 147C or SS-4 Confirmation letter), including 
                        capitalization and punctuation.</span>
                </div>
                <div class="mb-3">
                    <label for="businessDescription" class="form-label">Business description</label>
                    <textarea name="businessDescription" id="businessDescription" cols="60" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="ein" class="form-label">Employer Identification Number (EIN)</label>
                    <input  type="text" name="ein" id="ein"  class="form-control" placeholder="123456789" required maxlength="9">
                </div>
                <div class="mb-3">
                    <label for="doingBusinessAs" class="form-label">Doing business as (optional)</label>
                    <input  type="text" name="doingBusinessAs" id="doingBusinessAs"  class="form-control" placeholder="NZ-Tech">
                </div>
                <div class="mb-3">
                    <label for="industry_type" class="form-label">Industry</label>
                        <select name="industryType"  id="industryType" class="form-select" required>
                            <option value="">Please select...</option>
                            <option value="agriculture_forestry_and_fishing">Agriculture, Forestry, and Fishing</option>
                            <option value="mining">Mining</option>
                            <option value="construction">Construction</option>
                            <option value="manufacturing">Manufacturing</option>
                            <option value="utility_services">Transportation, Communications, Electric, Gas, and Sanitary Services</option>
                            <option value="wholesale_trade">Wholesale Trade</option>
                            <option value="retail_trade">Retail Trade</option> --&gt;
                            <option value="financial_services">Finance, Insurance, and Real Estate</option>
                            <option value="services">Services</option>
                            <option value="public_administration">Public Administration</option>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="doingBusinessAs" class="form-label">Tax classification)</label>
                    <select name="taxClassification" id="taxClassification" class="form-select" required>
                        <option value="">Please select...</option>
                        <option value="c_corporation">C-Corporation</option>
                        <option value="s_corporation">S-Corporation</option>
                        <option value="partnership">Partnership</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="annual_gross_revenue" class="form-label">Estimated annual gross revenue</label>
                    <input  type="text" name="annual_gross_revenue" id="annual_gross_revenue"  class="form-control" placeholder="Please enter an amount"  required maxlength="9">
                </div>
                <div class="mb-3">
                    <label for="total_liquid_assets" class="form-label">Estimated total liquid assets</label>
                    <input  type="text" name="total_liquid_assets" id="total_liquid_assets"  class="form-control" placeholder="Please enter an amount"  required maxlength="9">
                </div>
                <div class="mb-3">
                    <label for="totalLiquidAssets" class="form-label">Investment objectives</label>
                    <select name="investment_objective" class="form-select" required>
                        <option value="capital_preservation">Capital Preservation</option>
                        <option value="income">Income</option>
                        <option value="growth_income">Growth &amp; Income</option>
                        <option value="growth">Growth</option>
                        <option value="speculation">Speculation</option>
                    </select>
                </div>

                <div class="mb-5 form-check">
                    <input type="checkbox" class="form-check-input" id="foreignFinancialInstitution" name="foreignFinancialInstitution">
                    <label class="form-check-label" for="foreignFinancialInstitution">My company is a foreign financial institution</label>
                    <span>
                    The entity if not domiciled in the US and accepts deposits, holds financial assets for others, or is in the business of investing securities.
                    </span>
                    <br>
                    <span style="color: red; display:none;" id="chkAcc">
                    A Treasure account cannot be created for businesses that qualify as foreign financial institutions. Please update your selections to continue or contact
                    <a href="mailto:support@treasure.tech?subject=Foreign Financial Institution" target="hidden-mailto-iframe" class="sc-hgZZql fTDAlW">support@treasure.tech</a>
                    if you have any questions.
                    </span>
                </div>
            </div>
            <!-- End Step-2 Business Details -->   
            
            <!-- Start Step-3 Business Representative -->   
            <div class="tab">
                <h3>Business Representative</h3>
                <span>
                    Federal law requires that we obtain, verify, and record information that identifies each person who opens an account. This requires us to collect information that will allow us to identify you.
                </span>
                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="isAuthorizedSigner" name="isAuthorizedSigner" required>
                    <label class="form-check-label" for="isAuthorizedSigner">I am authorized to open financial accounts and enter agreements on behalf of my company</label>
                </div>
                <?php include_once('add_officer.php') ?>
            
            </div>
            <!-- End Step-3 Business Representative -->
            
            <!-- Step-4 Start >Do Any Of These Happen To Apply? -->
            <div class="tab">
                <h3 class="mt-3 mb-3">Do Any Of These Happen To Apply?</h3>
                <span>
                If these terms are not familiar, these cases likely do not apply and you can continue.
                </span>
                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="leaderOfPublicCompany" name="leaderOfPublicCompany">
                    <label class="form-check-label" for="leaderOfPublicCompany">I am a leader at a public company</label>
                    <br>
                    <span> You are a director, officer or hold more than 10% of shares of another company
                        I am a broker-dealer holding assets for other broker-dealers
                    </span>
                </div>
                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="brokerDealer" name="brokerDealer">
                    <label class="form-check-label" for="leaderOfPublicCompany">I am a broker-dealer holding assets for other broker-dealers</label>
                    <br>
                    <span>
                    You are a financial entity who is a buyer and seller of cash and securities for another broker-dealer
                    </span>
                </div>

                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="largeTrader" name="largeTrader">
                    <label class="form-check-label" for="largeTrader">I am a Large Trader</label>
                    <br>
                    <span>
                    You have traded more than 2 million shares/$20 million in a single day, or 20 million shares/$200 million of exchange listed securities in a month
                    </span>
                </div>

                
                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="stockExchangeFinraMemberAssociated" name="stockExchangeFinraMemberAssociated">
                    <label class="form-check-label" for="stockExchangeFinraMemberAssociated">I am associated with a stock exchange or FINRA member firm/label>
                    <br>
                    <span>
                    You work for, with, or are affiliated with a FINRA registered firm
                    </span>
                </div>
                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="haveInterestedPartiesToReport" name="haveInterestedPartiesToReport">
                    <label class="form-check-label" for="haveInterestedPartiesToReport">I have interested parties to report</label>
                    <br>
                    <span>
                    You have a designated third party that should receive duplicate statements and confirmations
                    </span>
                </div>

                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="politicallyExposed" name="politicallyExposed">
                    <label class="form-check-label" for="politicallyExposed">I am a politically exposed persont</label>
                    <br>
                    <span>
                    You are, or are related to a current or former senior political figure
                    </span>
                </div>

            </div>
            <!-- Step-4 End >Do Any Of These Happen To Apply? -->

            <!-- Start Step-5 Business Owners And Officers -->       
            <div class="tab">
                <h3 class="mb-3 mt-3">Business Owners And Officers</h3>
                <span>
                Due to regulatory guidelines, we're required to collect information on anyone who has significant ownership or control of your business.
                </span>
                <div class="mb-5 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exemptListingBeneficialOwners" name="exemptListingBeneficialOwners" value="true">
                    <label class="form-check-label" for="exemptListingBeneficialOwners" style="padding: 5px;">
                        My company is exempt from listing beneficial owners
                    </label>
                    <br>
                    <span>
                    This entity is subject to federal or state regulation and ownership info is available from those agencies.
                    </span>
                </div>
            <div class="mb-5 mt-3 bownership">
                        <span>
                        Does any single person own 25% or more of the company or controlling entity?
                        </span> <br><br>
                    <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="radio" id="businessOwnership" name="businessOwnership" value="Yes">
                        <label class="form-check-label" for="businessOwnership">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="businessOwnership2" name="businessOwnership" value="No">
                        <label class="form-check-label" for="businessOwnership">No</label>
                    </div>            
                </div>
                <div class="mb-3 exempt">
                    <label for="jobTitle" class="form-label">Beneficial Ownership Exemption</label>
                    <select class="form-select" name="exemptListingBeneficialOwnersExemptionStatus" id="exemptListingBeneficialOwnersExemptionStatus">
                        <?=beneficial_ownership_exemption_list()?>
                    </select> 
                </div>
                <div class="mb-3 exempt_add_owner" style="display: none;">
                    <label for="businessOwner" class="form-label">Add all individuals with ownership of 25% or more</label>
                    <select class="form-select" name="add_bn" id="add_bn">
                        <option value="nothing" selected="selected"> Select or add new business owner</option>
                    <option value="add_officer"> Add business owner</option>
                    </select> 
                </div>

                <div class="mb-3 exempt_add">
                    <label for="jobTitle" class="form-label">Add at least one c-level exective of ABC Trading</label>
                    <select class="form-select" name="add_bo" id="add_bo">
                        <option value="nothing" selected="selected"> Select or add new business officier</option>
                        <option value="add_officer"> Add business officier</option>
                    </select> 
                </div>
                <div class="row mb-3">
                <table class="table table-hover table-striped table-responsive">
                   <tbody id="dTable">
                <?php 
                if(!empty($business_officer)){
                    foreach($business_officer as $key => $val){
                ?>
                    
                            <tr>
                                <td style="width:80%;"><?=$val['name'];?></td>
                                <td style="width:20%;">
                                    <button type="button" class="btn btn-primary edit_business_officer" id="btnEdit-<?=$val['id']?>" data-id="<?=$val['id']?>" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-whatever="@mdo" onclick="boe(<?=$val['id']?>,'<?=$val['type']?>')">Edit</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger" id="btnCancel-<?=$val['id']?>" data-id="<?=$val['id']?>" onclick="bod(<?=$val['id']?>)">X</button>
                                </td>
                            </tr>
                    
                <?php        
                    }
                    ?>

                <?php } ?>
                </tbody>
                    </table>
                </div>
            </div>
            <!-- End Step-5 Business Owners And Officers -->    

            <!-- Start Step-6 Legal Disclosures -->  
            <div class="tab">
                <h3>Legal Disclosures</h3>
                <p>Please review all of the terms & conditions.</p>
                <div style="border: 1px solid; height: 500px;  overflow: hidden; overflow-y: scroll;" id="disclosure1" >
                    <?php include_once('legal_disclosure1.php') ?>
                </div>
                <div style="border: 1px solid; height: 500px;  overflow: hidden; display:none; overflow-y: scroll;" id="disclosure2">
                    <?php include_once('legal_disclosure2.php') ?>
                </div>
            </div>   
            <!-- End Step-6 Legal Disclosures -->       

            <div class="mb-3 p-3 npb" style="overflow:auto; ">
                <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)"  class="btn btn-primary">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary">Next</button>
                <!-- <button type="submit" class="btn btn-primary btn-lg" id="btnSubmit">Submit</button> -->
                </div>
            </div>

                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <div id="loading" style="display:none;text-align:center; background-color:#fff;"><img src="assets/img/loading.gif"></div>
        </form>
    </div>
    <!-- Modal Add Officer-->

        <div class="modal" id="myModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-officer">Business Officers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php //include_once('add_officer.php') ?>
                    <div id="divAODialog">
                    <input type="hidden" name="eid" id="eid" value="">
                    <input type="hidden" name="user_type" id="user_type" value="bo">
                        <div class="mb-3">
                                <label for="firstName" class="form-label">Legal Name</label>
                                <input  type="text" name="first_name" id="first_name" value="" class="form-control aos" placeholder="First Name"  required><br>
                                <input  type="text" name="last_name" id="last_name" value="" class="form-control aos" placeholder="Last Name"  required>
                            </div>
                            <div class="mb-3" id="owner_percent" style="display: none;">
                                <label for="ownershipPercentage" class="form-label">Ownership percentage</label>
                                <input  type="text" name="ownershipPercentage" id="ownershipPercentage"  class="form-control" placeholder="%"  value="0" required maxlength="3" style="width: 80px;">                            </div>
                            <div class="mb-3">
                                <label for="jobTitle" class="form-label">Title / Role</label>
                                <input  type="text" name="jobTitle" id="jobTitle"  class="form-control aos" placeholder="Job Role"  required>
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
                                <input type="text" name="businessOfficerZipCode" id="businessOfficerZipCode" class="form-control aos"  placeholder="Zip"  style="width: 300px !important;">
                            </div>
                     </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnAddOfficer">Submit</button>
                    </div>
                </div>
            </div>
       </div>
       <!-- Modal Add Officer End-->
<!-- Modal Business Owner-->
<div class="modal fade" id="ownerModal" tabindex="-1" aria-labelledby="ownerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Business Owner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-body-owner">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="btnAddOwner">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>

// $(document).ready(function(){

   
// });

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            $('#nextBtn').prop("disabled",false);
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            var bType = document.getElementById("businessTypeId").value;
            if(bType == 'llc' || bType == 'partnership'){
                $("#disclosure1").show();
                $("#disclosure2").hide();
            }else if(bType == 'c_corporation' || bType == 's_corporation'){
                $("#disclosure1").hide();
                $("#disclosure2").show();
            }else{
                $("#disclosure1").show();
            }
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
        }

        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        //$("#treasureForm").validate();
        // Exit the function if any field in the current tab is invalid:
       // if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
           
            // ... the form gets submitted:
            document.getElementById("treasureForm").submit();
            $(".npb").hide();
            var loading = $("#loading");

           // $(document).ajaxStart(function () {
            loading.show();
            //});
  

            return false;
        }
          // add/update business representative
        if(currentTab== 3){
            addOfficer()
        }

         // populate business representative
        // alert(currentTab);
         if(currentTab == 4){
            getOfficer()
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i,k, c,valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        d = x[currentTab].getElementsByTagName("select");

        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].type === 'checkbox' && y[i].hasAttribute('required')) {
                if(!y[i].checked){
                    y[i].className += " invalid";
                    valid = false;
                }
                
            }
        
            if (y[i].hasAttribute('required') && y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
            }
        }
        for (k = 0; k < d.length; k++) {
            if (d[k].hasAttribute('required') && d[k].value == "") {
                // add an "invalid" class to the field:
                d[k].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
      

        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }

        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
        }
        function addOfficer(){

            var uid = $("#uid").val();
            var first_name= $("#fn").val();
            var last_name= $("#ln").val();
            var data = $('#divAO :input').serialize();
            var url = 'process.ajax.php';
            var is_aof = 1;

            $.ajax({
                url: url,
                dataType: "json",
                type: "POST",
                async: false,
                data: {
                "ac":'add_user',
                "user_type":"bo",
                "uid":uid,
                "first_name":first_name,
                "last_name":last_name,
                "is_aof":is_aof,
                "data":data
                },
                success: function(response)
                {
                //console.log(response);
                //alert(response.msg);
                }
            });
        }
        function getOfficer(){
            var uid = $("#uid").val();
            var url = 'process.ajax.php';
            $.ajax({
                url: url,
                dataType: "json",
                type: "POST",
                async: false,
                data: {
                "ac":'get_off',
                "uid":uid
                },
                success: function(response)
                {
                //console.log(response);
                $("#add_bo").html(response.result);
                }
            });
            }
</script>

<?php
include('views/footer.php');
?>
