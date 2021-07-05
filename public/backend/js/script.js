$(document).ready(function(){
   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    

    $('.dropify').dropify();

    $('.venobox').venobox(); 
    

    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['#000']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

       $('#summernote1').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['#000']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });


      $(".updateBannerstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/bannerupdatestatus',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#banner-"+section_id).html("<a href='javascript:void(0)' class=' updateBannerstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#banner-"+section_id).html("<a href='javascript:void(0)' class=' updateBannerstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateachivestatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/achivementupdatestatus',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#achive-"+section_id).html("<a href='javascript:void(0)' class=' updateachivestatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#achive-"+section_id).html("<a href='javascript:void(0)' class=' updateachivestatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateCategorystatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/categories',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#category-"+section_id).html("<a href='javascript:void(0)' class=' updateCategorystatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#category-"+section_id).html("<a href='javascript:void(0)' class=' updateCategorystatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatesubCategorystatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/subcategories',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#subcategory-"+section_id).html("<a href='javascript:void(0)' class=' updatesubCategorystatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#subcategory-"+section_id).html("<a href='javascript:void(0)' class=' updatesubCategorystatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateFacilitiesstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/facilities',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#facilities-"+section_id).html("<a href='javascript:void(0)' class=' updateFacilitiesstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#facilities-"+section_id).html("<a href='javascript:void(0)' class=' updateFacilitiesstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateLeadersstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/leaders',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#leaders-"+section_id).html("<a href='javascript:void(0)' class=' updateLeadersstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#leaders-"+section_id).html("<a href='javascript:void(0)' class=' updateLeadersstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateaboutstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/abouts',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#about-"+section_id).html("<a href='javascript:void(0)' class=' updateaboutstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#about-"+section_id).html("<a href='javascript:void(0)' class=' updateaboutstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    
    $(".updateproducerstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/addmissionproducers',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#producer-"+section_id).html("<a href='javascript:void(0)' class=' updateproducerstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#producer-"+section_id).html("<a href='javascript:void(0)' class=' updateproducerstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatejobsstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/jobplacements',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#jobs-"+section_id).html("<a href='javascript:void(0)' class=' updatejobsstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#jobs-"+section_id).html("<a href='javascript:void(0)' class=' updatejobsstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatefaqparentsstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/faqparents',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#faqparent-"+section_id).html("<a href='javascript:void(0)' class=' updatefaqparentsstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#faqparent-"+section_id).html("<a href='javascript:void(0)' class=' updatefaqparentsstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });
    $(".updatefaqstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/faqs',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#faq-"+section_id).html("<a href='javascript:void(0)' class=' updatefaqstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#faq-"+section_id).html("<a href='javascript:void(0)' class=' updatefaqstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    var table = $('#myTable').DataTable();

    table.on('click', '.edit', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('chlid')){
            $tr = $tr.prev('.parent');

        }

        var data = table.row($tr).data();
        // console.log(data);

        $('#name').val(data[1]);
        $('#slug').val(data[2]);
        $('#editForm').attr('action', '/admin/categories/edit/'+data[0]);
        $('#editCategory').modal('show');
    });







    var table = $('#myTable').DataTable();

    table.on('click', '.editfaqsparent', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('chlid')){
            $tr = $tr.prev('.parent');

        }

        var data = table.row($tr).data();
        console.log(data);

        
        $('#slug').val(data[2]);
        $('#faqtitle').val(data[1]);
        $('#editFaqsparent').attr('action', '/admin/faqparents/edit/'+data[0]);
        $('#editfaqsparent').modal('show');
    });



    jQuery('#datetimepicker1').datetimepicker({
       format: 'd-M-y g:i A',
        formatTime: 'A g:i',
   
      });



      $(".updatemsgstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/contactdetalis',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#msg-"+section_id).html("<a href='javascript:void(0)' class=' updatemsgstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#msg-"+section_id).html("<a href='javascript:void(0)' class=' updatemsgstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


     $(".updatepoststatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/posts',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#posts-"+section_id).html("<a href='javascript:void(0)' class=' updatepoststatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#posts-"+section_id).html("<a href='javascript:void(0)' class=' updatepoststatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatesupportstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/support',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#support-"+section_id).html("<a href='javascript:void(0)' class=' updatesupportstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#support-"+section_id).html("<a href='javascript:void(0)' class=' updatesupportstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatereviewstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/reviews',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#review-"+section_id).html("<a href='javascript:void(0)' class=' updatereviewstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#review-"+section_id).html("<a href='javascript:void(0)' class=' updatereviewstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });
    

     $(".updateLogostatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/logosupdatestatus',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#logo-"+section_id).html("<a href='javascript:void(0)' class=' updateLogostatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#logo-"+section_id).html("<a href='javascript:void(0)' class=' updateLogostatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    // $('#category_id').on('change',function(e) {
    //     var cat_id = e.target.value;

       
    //     $.ajax({
    //     url:"/admin/subcat",
    //     type:"POST",
    //     data: {
    //     cat_id: cat_id
    //     },
    //     dataType : 'json',
    //     success:function (data) {
    //     $('#subcategory').empty();
    //     $.each(data.subcategories[0].subcategories,function(index,subcategory){
    //     $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
    //     })
    //     },error:function(data){
    //         alert("error");
    //        }
    //     })
    //     });


    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "/admin/subcat/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');

                      });

                },
               
            });
        } else {
            alert('danger');
        }

    });




    $(".updateaboutapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approveabout',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 $("#aboutapprove-"+section_id).html("<a href='javascript:void(0)' class='updateaboutapprove'>Deactive</a>");
             }else if(resp['approve'] == 1){
                 $("#aboutapprove-"+section_id).html("<a href='javascript:void(0)' class='updateaboutapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateachiveapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approveachive',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#achiveApprove-"+section_id).html("<a href='javascript:void(0)' class='updateachiveapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#achiveApprove-"+section_id).html("<a href='javascript:void(0)' class='updateachiveapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatebannerapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvebannerse',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#bannerApprove-"+section_id).html("<a href='javascript:void(0)' class='updatebannerapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#bannerApprove-"+section_id).html("<a href='javascript:void(0)' class='updatebannerapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatebannerapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvebannerse',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#bannerApprove-"+section_id).html("<a href='javascript:void(0)' class='updatebannerapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#bannerApprove-"+section_id).html("<a href='javascript:void(0)' class='updatebannerapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatecategoryapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvecategory',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#categoryApprove-"+section_id).html("<a href='javascript:void(0)' class='updatecategoryapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#categoryApprove-"+section_id).html("<a href='javascript:void(0)' class='updatecategoryapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatecategoryapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvecategory',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#categoryApprove-"+section_id).html("<a href='javascript:void(0)' class='updatecategoryapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#categoryApprove-"+section_id).html("<a href='javascript:void(0)' class='updatecategoryapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateesubCategoryapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvesubcategory',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#subcategoryApprove-"+section_id).html("<a href='javascript:void(0)' class='updateesubCategoryapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#subcategoryApprove-"+section_id).html("<a href='javascript:void(0)' class='updateesubCategoryapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatepostapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvepost',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#postApprove-"+section_id).html("<a href='javascript:void(0)' class='updatepostapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#postApprove-"+section_id).html("<a href='javascript:void(0)' class='updatepostapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatefacilitiesapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvefacilities',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#facilitesApprove-"+section_id).html("<a href='javascript:void(0)' class='updatefacilitiesapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#facilitesApprove-"+section_id).html("<a href='javascript:void(0)' class='updatefacilitiesapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatefaqparentapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvefaqparent',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#faqparentApprove-"+section_id).html("<a href='javascript:void(0)' class='updatefaqparentapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#faqparentApprove-"+section_id).html("<a href='javascript:void(0)' class='updatefaqparentapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatejobsapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvejob',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#jobsApprove-"+section_id).html("<a href='javascript:void(0)' class='updatejobsapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#jobsApprove-"+section_id).html("<a href='javascript:void(0)' class='updatejobsapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updateleaderapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approveleader',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#leaderApprove-"+section_id).html("<a href='javascript:void(0)' class='updateleaderapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#leaderApprove-"+section_id).html("<a href='javascript:void(0)' class='updateleaderapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatesemenirapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approveseminer',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#sesemenirApprove-"+section_id).html("<a href='javascript:void(0)' class='updatesemenirapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#sesemenirApprove-"+section_id).html("<a href='javascript:void(0)' class='updatesemenirapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatecontactapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvecontact',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#contactApprove-"+section_id).html("<a href='javascript:void(0)' class='updatecontactapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#contactApprove-"+section_id).html("<a href='javascript:void(0)' class='updatecontactapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updatesupportapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(approve);
        // alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvesupport',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#supportApprove-"+section_id).html("<a href='javascript:void(0)' class='updatesupportapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#supportApprove-"+section_id).html("<a href='javascript:void(0)' class='updatesupportapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(".updateprodcerapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approveproducer',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#producerApprove-"+section_id).html("<a href='javascript:void(0)' class='updateprodcerapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#producerApprove-"+section_id).html("<a href='javascript:void(0)' class='updateprodcerapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    
    
    $(".updatereviewapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvereviews',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#reviewApprove-"+section_id).html("<a href='javascript:void(0)' class='updatereviewapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#reviewApprove-"+section_id).html("<a href='javascript:void(0)' class='updatereviewapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatelogosapprove").click(function(){
        var approve = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/approvelogos',
            data : {approve:approve, section_id:section_id},
            success:function(resp){
             if(resp['approve'] == 0){
                 
                $("#logoApprove-"+section_id).html("<a href='javascript:void(0)' class='updatelogosapprove'>Deactive</a>");
               
             }else if(resp['approve'] == 1){
                 $("#logoApprove-"+section_id).html("<a href='javascript:void(0)' class='updatelogosapprove'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });


    $(document).on('keyup', '#old_password', function(){
        var old_password = $("#old_password").val();
       $.ajax({
           type: 'post',
           url: '/admin/update-password',
           data:{old_password:old_password,},
           success:function(resp){
              if(resp == "false"){
                  $("#chkoldpwd").html("<font  > Current Password is InCorrect </font>").css({"color": "red"});
              }else if(resp =="true"){
                   $("#chkoldpwd").html("<font  > Current Password is Correct</font>").css({"color": "green"});
              }
           },error:function(){
               alert("eroor");
           }
       });


   });



   



    


});



