<?php

$mapping['business']['have_interested_parties_to_report']=false;
$mapping['business']['addresses'][]=array('address1'=>'123 Main St.','address2'=>'Unit #1','city'=>'San Francisco','region'=>'CA','country'=>'USA');
$mapping['business']['phone_number']=array('country_code'=>'+1','phone_number'=>'5555555555');
$mapping['business']['business_description']='A description of Treasure Financial';
$mapping['business']['business_type']='llc';
$mapping['business']['tax_classification']='c_corporation';
$mapping['business']['investment_objective']='capital_preservation';
$mapping['business']['industry_type']='agriculture_forestry_and_fishing';
$mapping['business']['tax_identification_number']='123456789';
$mapping['business']['annual_gross_revenue']=array('currency'=>'USD','amount'=>' 150000.00');
$mapping['business']['total_liquid_assets']=array('currency'=>'USD','amount'=>' 150000.00');
$mapping['business']['exempt_listing_beneficial_owners']='';
$mapping['business']['foreign_financial_institution']='';
$mapping['business']['business_members'][]=array(
  'first_name'=>'Bob','last_name'=>'John','date_of_birth'=>array('month'=>1,'day'=>1,'year'=>1970),
  'residency_country'=>'USA','citizenship_country'=>'USA','job_title'=>'CEO','is_entity_officer'=>1,
  'phone_number'=>array('country_code'=>'+1','phone_number'=>'5555555555'),
  'is_authorized_signer'=>1
);
$mapping['business']['business_members']['addresses'][]=array('address1'=>'123 Main St.','address2'=>'Unit #1','city'=>'San Francisco','region'=>'CA','country'=>'USA');
$mapping['business']['business_members']['ownership_percentage']=0;
$mapping['business']['business_members']['national_identifier']='123456789';
$mapping['business']['business_members']['email']='email@provider.com';

$mapping['business_member_onboarding']['first_name']='Bob';
$mapping['business_member_onboarding']['last_name']='John';
$mapping['business_member_onboarding']['date_of_birth']=array('month'=>1,'day'=>1,'year'=>1970);
$mapping['business_member_onboarding']['residency_country']='USA';
$mapping['business_member_onboarding']['citizenship_country']='USA';
$mapping['business_member_onboarding']['job_title']='CEO';
$mapping['business_member_onboarding']['is_entity_officer']=1;
$mapping['business_member_onboarding']['phone_number']=array('country_code'=>'+1','phone_number'=>'5555555555');
$mapping['business_member_onboarding']['is_authorized_signer']=1;
$mapping['business_member_onboarding']['addresses'][]=array('address1'=>'123 Main St.','address2'=>'Unit #1','city'=>'San Francisco','region'=>'CA','country'=>'USA');
$mapping['business_member_onboarding']['ownership_percentage']=0;
$mapping['business_member_onboarding']['leader_of_public_company']='';
$mapping['business_member_onboarding']['broker_dealer']='';
$mapping['business_member_onboarding']['large_trader']='';
$mapping['business_member_onboarding']['stock_exchange_finra_member_associated']='';
$mapping['business_member_onboarding']['politically_exposed']='';
$mapping['business_member_onboarding']['national_identifier']='';
$mapping['business_member_onboarding']['email']='email@provider.com';

$mapping['policies']['bank_account_agreement']='';
$mapping['policies']['investment_management_agreement']='';
$mapping['policies']['entity_llc_agreement']='';
$mapping['policies']['entity_corporation_cash_account_agreement']='';
$mapping['policies']['entity_new_account_ria']='';
debugVar($mapping);
//exit;
$jsonEncode = json_encode($mapping,true);
debugVar($jsonEncode);


$business_data='{
    "business": {
      "have_interested_parties_to_report": false,
      "addresses": [
        {
          "address1": "123 Main St.",
          "address2": "Unit #1",
          "city": "San Francisco",
          "postal_code": "12345",
          "region": "CA",
          "country": "USA"
        }
      ],
      "phone_number": {
        "country_code": "+1",
        "phone_number": "5555555555"
      },
      "business_description": "A description of Treasure Financial",
      "business_type": "llc",
      "tax_classification": "c_corporation",
      "investment_objective": "capital_preservation",
      "industry_type": "agriculture_forestry_and_fishing",
      "tax_identification_number": "123456789",
      "annual_gross_revenue": {
        "currency": "USD",
        "amount": "150000.00"
      },
      "total_liquid_assets": {
        "currency": "USD",
        "amount": "150000.00"
      },
      "exempt_listing_beneficial_owners": false,
      "foreign_financial_institution": false,
      "business_members": [
        {
          "first_name": "Bob",
          "last_name": "John",
          "date_of_birth": {
            "month": 1,
            "day": 1,
            "year": 1970
          },
          "residency_country": "USA",
          "citizenship_country": "USA",
          "job_title": "CEO",
          "is_entity_officer": true,
          "phone_number": {
            "country_code": "+1",
            "phone_number": "5555555555"
          },
          "is_authorized_signer": true,
          "addresses": [
            {
              "address1": "123 Main St.",
              "address2": "Unit #1",
              "city": "San Francisco",
              "postal_code": "12345",
              "region": "CA",
              "country": "USA"
            }
          ],
          "ownership_percentage": 0,
          "national_identifier": "123456789",
          "email": "email@provider.com"
        }
      ]
    },
    "business_member_onboarding": {
      "first_name": "Bob",
      "last_name": "John",
      "date_of_birth": {
        "month": 1,
        "day": 1,
        "year": 1970
      },
      "residency_country": "USA",
      "citizenship_country": "USA",
      "job_title": "CEO",
      "is_entity_officer": true,
      "phone_number": {
        "country_code": "+1",
        "phone_number": "5555555555"
      },
      "is_authorized_signer": true,
      "addresses": [
        {
          "address1": "123 Main St.",
          "address2": "Unit #1",
          "city": "San Francisco",
          "postal_code": "12345",
          "region": "CA",
          "country": "USA"
        }
      ],
      "ownership_percentage": 0,
      "leader_of_public_company": false,
      "broker_dealer": false,
      "large_trader": false,
      "stock_exchange_finra_member_associated": false,
      "politically_exposed": false,
      "national_identifier": "123456789",
      "email": "email@provider.com"
    },
    "policies": {
      "bank_account_agreement": false,
      "investment_management_agreement": false,
      "entity_llc_agreement": false,
      "entity_corporation_cash_account_agreement": false,
      "entity_new_account_ria": false
    }
  }';
  
  $business_data_dcode = json_decode($business_data,true);
  debugVar($business_data_dcode);
?>