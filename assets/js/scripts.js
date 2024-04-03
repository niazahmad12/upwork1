
$(document).ready(function(){
    // $('#nextBtn').on('click', function() {
    //     $("#treasureForm").valid();
    // });
    $(".exempt").hide();
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
        var left  = ($(window).width()/2)-(900/2);
        var top   = ($(window).height()/2)-(600/2);
     
        var url ='add_officer_dialog.php?id='+uid;
       
        if (userOption == 'add_officer'){
            window.open(url,'Business Officier',"width=400, height=600, top="+top+", left="+left);
        }
    });
    $("#add_bn").change(function(){
        var userOption = $("#add_bn").val();
        var left  = ($(window).width()/2)-(900/2);
        var top   = ($(window).height()/2)-(600/2);
        url ='add_officer_dialog.php';
        if (userOption == 'add_officer'){
            window.open(url,'Business Officier',"width=400, height=600, top="+top+", left="+left);
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
    
});
function phone_number_mask(id){
document.getElementById(id).addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = '(' +x[1] + ') '+ x[2] + '-' + x[3]
  });
}
function boe(id){
    var uid = $("#uid").val();
    var left  = ($(window).width()/2)-(900/2);
    var top   = ($(window).height()/2)-(600/2);
    
    var url ='edit_officer_dialog.php?id='+id;
    
    window.open(url,'Business Officier',"width=400, height=600, top="+top+", left="+left);
    // var url = 'process.ajax.php';
    // $.ajax({
    //     url: url,
    //     dataType: "json",
    //     method: "GET",
    //     async: false,
    //     data: {
    //         "id": id,
    //         "ac":'edit'
    //     },
    //     success: function(response)
    //     {
    //         alert(response.success);
    //         location.reload();

    //     }
        
    //  });
}

function bod(id){
    //let id = e.attr('data-id');
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
             alert(response.msg);
             if(response.f =='1'){
                location.reload();
             }
            
 
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
            window.close();
            //location.reload();
            window.location.reload();

        }
        
     });
}