$(document).ready(function(){
    $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

              }
          });


// Tab user
      $(document).on('click','#users',function(){
          $('#frmUser').trigger("reset");
          $('#title-user').text('Create User');
          $('#frmUser').show();
          $('.warningmsg-user').hide();
          $('.action-user').addClass('storeUser');
          $('.action-user').removeClass('changeUser');
          $('.action-user').removeClass('deleteUser');
          $('#footer-btnsubmit-user').text("Insert");
      });

      $('.footer-users').on('click','.storeUser',function(){


        var url = $(this).data('url');
        var data = {
              firstname : $('#firstname').val(),
              lastname : $('#lastname').val(),
              user: $('#user').val(),
              email : $('#email').val(),
              role : $('#role').val(),
              password : $('#password').val()
            };


        $.ajax({
          url: url,
          type:'POST',
          data : data,
          dataType:'JSON',
          success:function(response){
                console.log(response);
              $('#frmUser').trigger("reset");
               $("#user-list").append(getRowUser(response.users));
              $('#userModal').modal('hide');

          }

        });

      });
  $(document).on('click','.edit-user',function(){
      $('#title-user').text('Edit User');
      $('#firstname').val($(this).data('fn') );
      $('#lastname').val($(this).data('ln'));
      $('#user').val($(this).data('user'));
      $('#email').val($(this).data('email'));
      $('#role').val($(this).data('role'));
      $('#userId').val($(this).data('userid'));
      $('#frmUser').show();
      $('.warningmsg-user').hide();
      $('.action-user').addClass('changeUser');
      $('.action-user').removeClass('storeUser');
      $('.action-user').removeClass('deleteUser');
      $('#footer-btnsubmit-user').text("Edit");
      $('#userModal').modal('show');
});
  $('.footer-users').on('click','.changeUser',function(){
      var url = $(this).data('edit');
      var data = {
              id : $('#userId').val(),
              firstname : $('#firstname').val(),
              lastname : $('#lastname').val(),
              user : $('#user').val(),
              email : $('#email').val(),
              role : $('#role').val(),
              password : $('#password').val()};
      $.ajax({
          url: url,
          type: "POST",
          data: data,
          dataType: 'JSON',
          success:function(response){
              var row = getRowUser(response.users);
              $('.user'+response.users.id).replaceWith(row);
               $('#userModal').modal('hide');
          }
      });
  });
  $(document).on('click','.remove-user',function(){
      $('#title-user').text('Delete User');
      $('#userId').val($(this).data('userid'));
      $('#frmUser').hide();
      $('#msgid-user').text($(this).data('fn')+' '+$(this).data('ln'));
      $('.warningmsg-user').show();

      $('.action-user').addClass('deleteUser');
      $('.action-user').removeClass('changeUser');
      $('.action-user').removeClass('storeUser');
      $('#footer-btnsubmit-user').text("Delete");
      $('#userModal').modal('show');
  });
  $('.footer-users').on('click','.deleteUser',function(){
      var url= $(this).data('delete');
      var id = $('#userId').val();


      $.ajax({
          url: url,
          type: 'GET',
          data: id,
          dataType: 'JSON',
          success:function(response){
            $('.user'+id).remove();
            $('#userModal').modal('hide');
          }
      });
  });
      function getRowUser(data){

      var userRow = "";
          userRow += '<tr class="user'+ data.id +'">';
          userRow += '<td>' + data.firstname + '</td>';
          userRow += '<td>' + data.lastname + '</td>';
          userRow += '<td>' + data.user + '</td>';
          userRow += '<td>' + data.email + '</td>';
          if(data.role == 1){
               userRow += '<td> Adim </td>';
          }else{
              userRow += '<td> User </td>';
          }
          userRow += '<td>' + '.....' + '</td>';
          userRow += '<td>';
          userRow += '<button class="btn btn-primary edit-user" data-userid="'+ data.id +'"';
          userRow += ' data-fn="'+ data.firstname +'" data-ln="'+ data.lastname +'"';
          userRow += ' data-email="'+ data.email +'" data-role="'+ data.role +'"  data-user="'+ data.user +'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
          userRow += ' <button class="btn btn-danger remove-user" ';
          userRow += 'data-userid="'+data.id+'" data-fn="'+data.firstname+'" data-ln="'+data.lastname+'"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
          userRow += '</td>';
          userRow += '</tr>';
        return userRow;
      }

// Tab Project

      $(document).on('click','#projectModal',function(){
          $('#frmProject').trigger("reset");
          $('.warningmsg').hide();
          $('#frmProject').show();
          $('#title-project').text('Create project');
          $('.action').addClass('storeProject');
          $('.action').removeClass('changeProject');
          $('.action').removeClass('deleteProject');
          $('#footer-btnsubmit').text("Insert");
      });

     $('.footer-project').on('click','.storeProject',function(){

          var url = $(this).data('add');

          var Data ={
                   nameProject : $('#nameProject').val(),
                   description : $('#description').val(),
                   duration : $('#duration').val(),
                   other : $('#other').val()
                  };

          $.ajax({
              url:url,
              type:'POST',
              data:Data,
              dataType:'JSON',
              success:function(response){


                  $('#frmProject').trigger("reset");
                  $("#project-list").append(getRow(response.datas));
                  $('#projecForm').modal('hide');
              }
          });

     });
     $(document).on('click','.edit',function(){
                  $('.warningmsg').hide();
                  $('#frmProject').show();
                  $('#title-project').text('Edit project');
                  $('.action').addClass('changeProject');
                  $('.action').removeClass('deleteProject');
                  $('.action').removeClass('storeProject');
                  $('#footer-btnsubmit').text("Edit");
                  $('#nameProject').val($(this).data('name'));
                  $('#description').val($(this).data('desc'));
                  $('#duration').val($(this).data('duration'));
                  $('#other').val($(this).data('other'));
                  $('#idProject').val($(this).data('id'));
                  $('#projecForm').modal('show');
     });
     $(document).on('click','.removeProject',function(){
          $('.warningmsg').show();
          $('.msgName').text($(this).data('name'));
          $('#frmProject').hide();
           $('#title-project').text('Delete project');

           $('#idProject').val($(this).data('id'));
            $('.action').addClass('deleteProject');
             $('.action').removeClass('changeProject');
             $('.action').removeClass('storeProject');
            $('#footer-btnsubmit').text("Delete");
          $('#projecForm').modal('show');
     });
     // $('#projectModal').on('click',function(){
     //       $('#frmProject').trigger("reset");

     //      $('#storeProject').removeClass('hidden');
     // });
     $('.footer-project').on('click','.changeProject',function(){
          var url = $(this).data('edit-url');
          var id = $('#idProject').val();
          var data = {
                  nameProject : $('#nameProject').val(),
                   description : $('#description').val(),
                   duration : $('#duration').val(),
                   other : $('#other').val()
                  };
          $.ajax({
              url:url+'/'+id,
              type:'POST',
              data:data,
              dataType:'JSON',
              success:function(response){


                  $('.project'+ response.data.id).replaceWith(getRow(response.data));
                  $('#projecForm').modal('hide');
              }
          });
     });
     $('.footer-project').on('click','.deleteProject',function(){

            var id = $('#idProject').val();
            var url = $(this).data('url');

            $.ajax({
                url: url+'/'+id,
                type:'GET',
                success:function(response){
                 $('.project'+id).remove();
                 $('#projecForm').modal('hide');
                }
            });
     });

  function getRow(data){
        var row ="";
        row += "<tr class='project"+ data.id +"'>";
        row += "<td>OOP"+ data.id +"</td>";
        row += "<td>"+ data.nameProject + "</td>";
        row += "<td>"+ data.description + "</td>";
        row += "<td>"+ data.duration + "</td>";
        row += "<td>"+ data.other + "</td>";
        row += "<td>";
        row += "<button class='btn btn-primary edit '";
        row += " data-id='"+ data.id +"' ";
        row += "data-name='"+ data.nameProject +"' data-desc='"+ data.description +"'";
        row += "data-duration='"+ data.duration +"' data-other='"+ data.other +"'";
        row += ' ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
        row += ' <button class="btn btn-danger removeProject"';
        row += ' data-name="'+data.nameProject+'" data-id="'+data.id+'"';
        row += '><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
        row +=  '</td>';
        row += '</tr>';
       return row;
  };

  $(document).on('click','.filterReport',function(){
      var url = $(this).data('url');
      var edit = $(this).data('edit-url');
      var remove = $(this).data('remove-url');
      var urlEdit = $(this).data('edit');
      var input = $('#month').val();
      var strCut = input.split('/');

      var data = { month:strCut[0],year:strCut[1]};
      $.ajax({
        url: url,
        type: 'GET',
        data: data,
        dataType:'JSON',
        success:function(data){

        $('#report-list').html(data);



        },

      });
  });

  // event on calendar

  $('.timedatepicker').on('click','.active',function(){

        var day = $('#toDay').val();
        var url = $('#toDay').data('url');

        $.ajax({
          url:url,
          type:'GET',
          data:{day},
          dataType:'JSON',
          success:function(response){
            console.log(response.datas);
            if(response.datas.length > 0){
              $.each(response.datas,function(index,value){
                $('#projectID').val(value.projectId);
                
                $('#project').val(value.project);
                $('#breakTime').val(value.breakTime);
                $('#startTime').val(value.startTime);
                $('#stopTime').val(value.stopTime);
                $('#totalTime').val(value.totalTime);
                $('#task').val(value.task);
                $('#action').val(value.plan);
                $('#knowledge').val(value.note);
                $('#impression').val(value.impression);
                $('#userID').val(value.idUser);
                $('#reportId').val(value.id);
              });

            }else {
              $('#report').trigger('reset');

            }


          }
        });
      });



  //report-list
  $(document).on('click','.modal-delete', function(){
      $('#idReport').val($(this).data('id'));
      $('#msgid').text($(this).data('id'));
      $('#deleteReport').modal('show');

  });
  $('.footer-project').on('click','.removeReport', function(){
      var url = $(this).data('url');
      var id = $('#idReport').val();
      $.ajax({
          url:url,
          type:'GET',
          data:{id},
          success:function(response){
            $('.report'+id).remove();
              $('#deleteReport').modal('hide');
          }
      });
  });
  $(document).on('click','.editReport',function(){
    var url = $(this).data('url');
    var id = $(this).data('id');
    var urlEdit = $(this).data('edit');
    $.ajax({
      url:url,
      type:'GET',
      data:{id},
      dataType:'JSON',
      success:function(response){
        document.report.action = urlEdit;
        $('#btn-title').text('update');
        $('#projectID').val(response.edit.projectId);
        $('#project').val(response.edit.project);
        $('#breakTime').val(response.edit.breakTime);
        $('#startTime').val(response.edit.startTime);
        $('#endTime').val(response.edit.stopTime);
        $('#totalTime').val(response.edit.totalTime);
        $('#task').val(response.edit.task);
        $('#action').val(response.edit.plan);
        $('#knowledge').val(response.edit.note);
        $('#impression').val(response.edit.impression);
        $('#idUser').val(response.edit.idUser);
        $('#id').val(response.edit.id);



      }
    });
  });

  //pagination
  // $(document).on('click','.pagination a',function(e)){
  //   e.preventDefault();
  //   console.log($(this).attr('href').split('page=')[0]);
  // });
  $('.sendMail').on('click',function(){

    document.report.action = $(this).data('url');
  });
  function parseTime(s) {

     var c = s.split(':');
     return parseInt(c[0]) * 60 + parseInt(c[1]);
  }
  $(document).on('change','#stopTime',function(){
  	var start = $('input[name="startTime"]').val();
  	var end = $('input[name="stopTime"]').val();
  	var breakTime = $('input[name="breakTime"]').val();
  	var total = parseTime(end)- parseTime(start)- breakTime;
  	var hour = Math.floor(total/60);
  	var min = total % 60 ;

  $('#totalTime').val(total);



  });
  $('#projectID').on('change',function(){

          console.log(this.selectedIndex);
          $("#project").prop('selectedIndex', this.selectedIndex );

  });


});
