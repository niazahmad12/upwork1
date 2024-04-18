
$(document).ready(function(){

    $('.datepicker').datepicker();
    $(".exempt").hide();
    $("#owner_percent").hide();
    $("#user_type").val('bo');
    $("#foreignFinancialInstitution").change(function(){
       if($('#foreignFinancialInstitution').is(':checked')){
        $("#chkAcc").show();
        $('#nextBtn').prop("disabled",true);
       }else{
        $("#chkAcc").hide();
        $('#nextBtn').prop("disabled",false);
       }
    });
    $("#country").change(function(){
        if($("#country").val() == 'USA'){
           $("#states").show(); 
           $("#states2").hide(); 
        }else{
            $("#states").hide(); 
            $("#states2").show(); 
        }
    });
    $("#residencyCountry").change(function(){
        if($("#residencyCountry").val() == 'USA'){
           $("#states").show(); 
           $("#states2").hide(); 
        }else{
            $("#states").hide(); 
            $("#states2").show(); 
        }
    });

    $("#add_bo").change(function(){
        var userOption = $("#add_bo").val();
        var uid = $("#uid").val();
        var url ='add_officer2.php';
        $("#owner_percent").hide();
        $("#user_type").val('bo');

        if(userOption == 'nothing'){
           // console.log(userOption);
        }else if(userOption == 'add_officer'){
            cleanBO();
            $('#modal-title-officer').text('Add Business Officer');
            //console.log(userOption);
            //$('#modal-title-officer').html('Add Business Officer');
               $('#myModal').modal("show");
                    $('#myModal').on('show.bs.modal', function () {
                  
                });
        }else{
             var url = 'process.ajax.php';
             $('#modal-title-officer').text('Update Business Officer');

              $.ajax({
                   url: url,
                   dataType: "json",
                   type: "POST",
                   async: false,
                   data: {
                   "ac":'get_bo_by_id',
                   "id":userOption
                   },
                   success: function(response)
                   {
                   console.log(response.data);
                   $("#first_name").val(response.data.first_name);
                   $("#eid").val(response.data.id);
                   $("#last_name").val(response.data.last_name);
                   $("#jobTitle").val(response.data.role);
                   $("#businessPhoneNumber").val(response.data.phone_number);
                   $("#email").val(response.data.email);
                   $("#citizenshipCountry").val(response.data.citizenship_country);
                   $("#dateOfBirth").val(response.data.dob);
                   $("#nationalIdentifier").val(response.data.scn);
                   $("#residencyCountry").val(response.data.residency_country);
                   $("#businessRepresentativeAddress1").val(response.data.address1);
                   $("#businessRepresentativeAddress2").val(response.data.address2);
                   $("#businessRepresentativeCity").val(response.data.city);
                   $("#businessRepresentativeState").val(response.data.state);
                   $("#businessRepresentativeState2").val(response.data.stat2);
                   $("#businessOfficerZipCode").val(response.data.zip);
                   }
               });

               $('#myModal').modal("show");
                    $('#myModal').on('show.bs.modal', function () {
    
                });

        }
    });
    $("#add_bn").change(function(){
        var userOption = $("#add_bn").val();
        $("#owner_percent").show();
        $("#user_type").val('bn');
        url ='add_officer_dialog.php';
        if (userOption == 'add_officer'){
            // $('.modal-body-owner').load('add_officer_dialog.php',function(){
            //     $('#ownerModal').modal("show");
            // });
            $('#modal-title-officer').text('Add Business Owner');
            $('#myModal').modal("show");
            //$('#myModal').on('show.bs.modal', function (e) {
            //$("#modal-title-officer").text("Update Business Officers");
           // });
        
        }
    });

    $("#exemptListingBeneficialOwners").change(function(){
        if($('#exemptListingBeneficialOwners').is(':checked')){
            $(".exempt").show();
            $(".exempt_add").show();
            $(".bownership").hide();
        }else{
            $(".exempt").hide();
            $(".exempt_add").hide();
            $(".bownership").show();
        }
    });
    $('input[type=radio][name=businessOwnership]').change(function() {
        //alert($(this).val());
        if($(this).val() =='No'){
            $(".exempt").hide();
            $(".exempt_add_owner").hide();
            $(".exempt_add").show();
        }
        if($(this).val() =='Yes'){
            $(".exempt").hide();
            $(".exempt_add_owner").show();
            $(".exempt_add").show();
        }
    });
    $("#btnAddOfficer").click(function(e){
        e.preventDefault();
        var uid = $("#uid").val();
        var eid = $("#eid").val();
        var first_name= $("#first_name").val();
        var last_name= $("#last_name").val();
        var data = $('#divAODialog :input').serialize();
        var url = 'process.ajax.php';
        var ac="add_user";
        var user_type=$("#user_type").val();

       if($("#first_name").val() == ''){
        alert("please enter first name")
            return false;
       }
       if($("#last_name").val() == ''){
        alert("please enter last name")
            return false;
       }
  
       if(user_type == 'bn' && ($("#ownershipPercentage").val() =='' || $("#ownershipPercentage").val()==0)){
         alert("please enter ownership percentage")
            return false;
       }
       if($("#jobTitle").val() == ''){
        alert("please enter job title")
            return false;
       }
       if($("#businessPhoneNumber").val() == ''){
        alert("please enter phone number")
            return false;
       }
       if($("#email").val() == ''){
        alert("please enter email")
            return false;
       }

       if($("#dateOfBirth").val() == ''){
        alert("please enter date of birth")
            return false;
       }
       if($("#nationalIdentifier").val() == ''){
        alert("please enter social security number")
            return false;
       }
       if($("#businessRepresentativeAddress1").val() == ''){
        alert("please enter address1")
            return false;
       }
       if($("#businessRepresentativeCity").val() == ''){
        alert("please enter city")
            return false;
       }
  
      
        // if(eid != ''){
        //     var ac="edit";
        // }
        $.ajax({
            url: url,
            dataType: "json",
            type: "POST",
            async: false,
            cache: false,
            data: {
            "ac":ac,
            "uid":uid,
            "id":eid,
            "user_type":user_type,
            "first_name":first_name,
            "last_name":last_name,
            "data":data
            },
            success: function(response)
            {
                console.log(response);
                //console.log(typeof(response.result));
                if(response.result==true){
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
                    $.ajax({
                        url: url,
                        dataType: "json",
                        type: "POST",
                        async: false,
                        data: {
                        "ac":'get_off_table',
                        "uid":uid
                        },
                        success: function(response)
                        {
                        //console.log(response);
                        $("#dTable").html(response.result);
                        }
                    });
                    $("#first_name").val('');
                    $("#eid").val('');
                    $("#last_name").val('');
                    $("#ownershipPercentage").val('');
                    $("#jobTitle").val('');
                    $("#businessPhoneNumber").val('');
                    $("#email").val('');
                    //$("#citizenshipCountry").val('');
                    $("#dateOfBirth").val('');
                    $("#nationalIdentifier").val('');
                    //$("#residencyCountry").val('');
                    $("#businessRepresentativeAddress1").val('');
                    $("#businessRepresentativeAddress2").val('');
                    $("#businessRepresentativeCity").val('');
                   // $("#businessRepresentativeState").val('');
                    $("#businessRepresentativeState2").val('');
                    $("#businessRepresentativeStateZipCode").val('');

                    $('.modal-header .btn-close').click();

                }
                return false;
            }
        });
    });

    $("#btnAddOwner").click(function(e){
        e.preventDefault();
       
        var uid = $("#uid").val();
        var data = $('#divAddOfficer :input').serialize();
        var url = 'process.ajax.php';
        var ac="addowner";

        $.ajax({
            url: url,
            dataType: "json",
            type: "POST",
            async: false,
            cache: false,
            data: {
            "ac":ac,
            "uid":uid,
            "data":data
            },
            success: function(response)
            {
                console.log(response);
                //console.log(typeof(response.result));
                if(response.result==true){
                    $.ajax({
                        url: url,
                        dataType: "json",
                        type: "POST",
                        async: false,
                        data: {
                        "ac":'get_off_table',
                        "uid":uid
                        },
                        success: function(response)
                        {
                        //console.log(response);
                        $("#dTable").html(response.result);
                        }
                    });
                    $('.modal-header .btn-close').click();

                }
                return false;
            }
        });
    });

    
});
function phone_number_mask(id){
document.getElementById(id).addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = '(' +x[1] + ') '+ x[2] + '-' + x[3]
  });
}
function boe(id,type){
    var uid = $("#uid").val();
    $("#owner_percent").show();
    var url = 'process.ajax.php';
    $("#user_type").val(type);

    if(type == 'bn'){
        $("#modal-title-officer").text("Update Business Owner");
        $("#owner_percent").show();
    }else{
        $("#modal-title-officer").text("Update Business Officers");
        $("#owner_percent").hide();
    }
        $.ajax({
                url: url,
                dataType: "json",
                type: "POST",
                async: false,
                data: {
                "ac":'get_bo_by_id',
                "id":id
                },
                success: function(response)
                {
                //console.log(response.data);
                    $("#first_name").val(response.data.first_name);
                    $("#eid").val(id);
                    $("#last_name").val(response.data.last_name);
                    $("#ownershipPercentage").val(response.data.ownership_percent);
                    $("#jobTitle").val(response.data.role);
                    $("#businessPhoneNumber").val(response.data.phone_number);
                    $("#email").val(response.data.email);
                    $("#citizenshipCountry").val(response.data.citizenship_country);
                    $("#dateOfBirth").val(response.data.dob);
                    $("#nationalIdentifier").val(response.data.scn);
                    $("#residencyCountry").val(response.data.residency_country);
                    $("#businessRepresentativeAddress1").val(response.data.address1);
                    $("#businessRepresentativeAddress2").val(response.data.address2);
                    $("#businessRepresentativeCity").val(response.data.city);
                    $("#businessRepresentativeState").val(response.data.state);
                    $("#businessRepresentativeState2").val(response.data.stat2);
                    $("#businessOfficerZipCode").val(response.data.zip);
                }
            });
        
            $('#myModal').on('show.bs.modal', function (e) {
    
                
            })

                // var myModal = document.getElementById('myModal');
                // myModal.addEventListener('show.bs.modal', function (event) {
                //     // Button that triggered the modal
                //     //var button = event.relatedTarget
                //     // Extract info from data-bs-* attributes
                //     //var recipient = button.getAttribute('data-bs-whatever')
                //     // Update the modal's content.
                //     var modalTitle = myModal.querySelector('.modal-title')
                //     alert(modalTitle);

                //     modalTitle.textContent = 'Update Business Officers '
                //     });

}

function bod(id){
    //let id = e.attr('data-id');
    var uid = $("#uid").val();
     var url = 'process.ajax.php';
     $.ajax({
         url: url,
         dataType: "json",
         method: "GET",
         async: false,
         data: {
             "id": id,
             "ac":'del'
         },
         success: function(response)
         {
           //  alert(response.msg);
             $.ajax({
                url: url,
                dataType: "json",
                type: "POST",
                async: false,
                data: {
                "ac":'get_off_table',
                "uid":uid
                },
                success: function(response)
                {
                //console.log(response);
                $("#dTable").html(response.result);
                }
            });
 
         }
         
      });
 }

 function editOfficer(id){

    var uid = $("#uid").val();
    //window.open(url,'Business Officier',"width=400, height=600, top="+top+", left="+left);
    var url = 'process.ajax.php';
    var data = $("#frmEditOfficer").serialize();

    $.ajax({
        url: url,
        dataType: "json",
        type: "POST",
        async: false,
        data: {
            "id": id,
            "ac":'edit',
            "data":data
        },
        success: function(response)
        {
            alert(response.msg);
           // window.close();
            //location.reload();
            //window.location.reload();
            $.ajax({
                url: url,
                dataType: "json",
                type: "POST",
                async: false,
                data: {
                "ac":'get_off_table',
                "uid":uid
                },
                success: function(response)
                {
                //console.log(response);
                $("#dTable").html(response.result);
                }
            });
            $('.modal-header .btn-close').click();
        }
        
     });
}
function addPercentageSign(){
    $('#ownershipPercentage').keyup(function(e) {
        if(e.which != 13) { //13 is enter, you dont want to submit the form on enter
          var value = $.trim($(this).val());
          if(value != '') {
             $(this).val(value +'%');
          }
        } else {
             return false;
        }
    });
}
function cleanBO(){
    $("#first_name").val('');
    $("#eid").val('');
    $("#last_name").val('');
    $("#jobTitle").val('');
    $("#businessPhoneNumber").val('');
    $("#email").val('');
    //$("#citizenshipCountry").val('');
    $("#dateOfBirth").val('');
    $("#nationalIdentifier").val('');
    //$("#residencyCountry").val('');
    $("#businessRepresentativeAddress1").val('');
    $("#businessRepresentativeAddress2").val('');
    $("#businessRepresentativeCity").val('');
   // $("#businessRepresentativeState").val('');
    $("#businessRepresentativeState2").val('');
    $("#businessRepresentativeStateZipCode").val('');
    $('.modal-header .btn-close').click();
}