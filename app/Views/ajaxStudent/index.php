<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- AlertifyJS CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<title>JQuery AJAX CRUD Operations</title>
</head>
<body>



<!-- As a heading  of NavBar-->
<nav class="navbar navbar-light bg-light">
<div class="container-fluid">
<span class="navbar-brand mb-4 h1 " >Navbar</span>
</div>
</nav>

<!-- Add Student Modal -->
<!-- Modal (PoP Up Option-)->

 <!-- <?= csrf_token() ?> -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="studentModal">Student Data</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="form-group">
<Lable>Full Name</lable><span id="error_name" class="text-danger ms-3"></span>
<input type="text" class="form-control name" placeholder="Enter Your Full Name">
</div>

<div class="form-group">
<Lable>Email</lable>
<input type="text" class="form-control email" placeholder="Enter Your Email">
</div>

<div class="form-group">
<Lable>Phone</lable>
<input type="text" class="form-control phone" placeholder="Enter Your Phone ">
</div>


<div class="form-group">
<Lable>Course</lable>
<input type="text" class="form-control course" placeholder="Enter Your Course ">
</div>     


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary studentsave">Save</button> -->
<input type="submit" name="submit" value="Save" class="btn btn-primary studentsave">
</div>
</div>
</div>
</div>

<!-- view student Model -->
<div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="studentModalLabel">Student Veiw</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="model-body">
  <h4>ID:<span class="id_view"></span></h4>
  <h4>Name:<span class="name_view"></span></h4>
  <h4>Email:<span class="email_view"></span></h4>
  <h4>Phone:<span class="phone_view"></span></h4>
  <h4>Course:<span class="course_view"></span></h4>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary studentsave">Save</button> -->
<input type="submit" name="submit" value="Save" class="btn btn-primary studentsave">
</div>
</div>
</div>
</div>

<!-- Edit Student Model -->

<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="studentEditModal">Edit Student Data</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  <input type="hidden" id="stud_id">
<div class="form-group">
<Lable>Full Name</lable><span id="error_name" class="text-danger ms-3"></span>
<input type="text" id="stud_name" class="form-control name" placeholder="Enter Your Full Name">
</div>

<div class="form-group">
<Lable>Email</lable>
<input type="text" id="stud_email" class="form-control email" placeholder="Enter Your Email">
</div>

<div class="form-group">
<Lable>Phone</lable>
<input type="text" id="stud_phone" class="form-control phone" placeholder="Enter Your Phone ">
</div>


<div class="form-group">
<Lable>Course</lable>
<input type="text" id="stud_course" class="form-control course" placeholder="Enter Your Course ">
</div>     


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary studentsave">Save</button> -->
<input type="submit" name="submit" value="Update" class="btn btn-primary studentupdate">
</div>
</div>
</div>
</div>
</div>


<!-- Delete student Model -->
<div class="modal fade" id="studentDeleteModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="studentDeleteModal">Student Veiw</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="model-body">
  <input type="text" id="stu_delete_id">
  <h4>Are you want to Delete</h4>
  
</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary studentsave">Save</button> -->
<input type="submit" name="submit" value="Delete" class="btn btn-primary studentdelete">
</div>
</div>
</div>
</div>



<div class="container">
<div class="row">
  <div class="col-md-12 my-4">
    <h2 class="text-center">JQuery AJAX CRUD Operations - Student Data</h2>
  </div>

<div class="col-md-12 my-12">
<div class="card">
<div class="card-header">
<h3>Jquery Ajax Operation - Student Data
<a href="#" data-bs-toggle="modal" data-bs-target="#studentModal" class="btn btn-primary float-end">Add</a>
</h3>

</div>


<!-- Code to create Table -->
<div class="card-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID </th>
        <th>Name </th>
        <th>Email </th>
        <th>Phone </th>
        <th>Course </th>
        <th>Created_at </th>
        <th>Action </th>
      </tr>
    </thead>
    <tbody class="studentdata">

    </tbody>
  </table>
</div>


</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AlertifyJS JS -->
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
<!-- Java Script Code -->

<!-- Java Script code for Get Request (Retrive Data) (Get Data) -->

 <script>
  $(document).ready(function()
    {
      //function call
      loadstudent();

      //Get Data by using Id
      //Click Event
      //This Method for view button
      $(document).on('click','.view_btn',function()
    {
      var stud_id=$(this).closest('tr').find('.stud_id').text();
      // alert(stud_id);

      // AJAX Query
       $.ajax({      
        method:"POST",
        url:"/student/veiwStudent",
        data:{
            'stud_id':stud_id,
            },
        success:function(response){

          //It show the data on a console
          // console.log(response);

          $.each(response, function(key, studview)
        {
          $('.id_view').text(studview['id']);
          $('.name_view').text(studview['name']);
          $('.email_view').text(studview['email']);
          $('.phone_view').text(studview['phone']);
          $('.course_view').text(studview['course']);
          $('#studentViewModal').modal('show');

        });

        }

      });

    });

    });

   
    //This Function is Used to load Data(Get Data)
  function loadstudent()
    {

      //AJAX Query
      $.ajax({
        method:"GET",
        url:"/student/getdata",
        success: function(response)
        {
          // console.log(response.students);

          $.each(response.students , function (key, value){
            // console.log(response.students);
            // console.log(value['name']);

          $('.studentdata').append ( '<tr>\
            <td class="stud_id">'+value['id']+'</td>\
            <td>'+value['name']+'</td>\
            <td>'+value['email']+'</td>\
            <td>'+value['phone']+'</td>\
            <td>'+value['course']+'</td>\
            <td>'+value['created_at']+'</td>\
            <td>\
            <a href="#" class="badge btn-info view_btn"> VIEW </a>\
            <a href="#" class="badge btn-primary edit_btn">EDIT</a>\
            <a href="#" class="badge btn-danger delete_btn">DELETE</a>\
            </td>\
            </tr>'
          );          

        });
      }
    });
  }


  </script>

  <!-- Edit Data method (Update Data)-->

   <script>

    $(document).ready(function(){
      // loadstudent();
    

    $(document).on('click','.edit_btn',function()
    {

      var stud_id=$(this).closest('tr').find('.stud_id').text();

      $.ajax({
        method:"POST",
        url:"/student/edit",
        data:{
          'stud_id': stud_id,
        },
        success: function(response)
        {
          // console.log(response);

          $.each(response, function(key , studvalue){
            $('#stud_id').val(studvalue['id']);
            $('#stud_name').val(studvalue['name']);
            $('#stud_email').val(studvalue['email']);
            $('#stud_phone').val(studvalue['phone']);
            $('#stud_course').val(studvalue['course']);

            $('#studentEditModal').modal('show');

          });

        }

      });



    });

    $(document).on('click','.studentupdate',function(){
      var data ={
        'stud_id':$('#stud_id').val(),
        'name':$('#stud_name').val(),
        'email':$('#stud_email').val(),
        'phone':$('#stud_phone').val(),
        'course':$('#stud_course').val(),
      };

      $.ajax({

        method:"POST",
        url:"/student/update",
        data: data,
        success: function(response)
        {
          $('#studentEditModal').modal('hide');
          $('.studentdata').html("");
          loadstudent();


          alertify.set('notifier','position','top-right');
          alertify.success(response.status);

        }

      });




    });



  });

    </script>


<!-- Delete Data Method -->

<script>
    $(document).ready(function(){
      $(document).on('click','.delete_btn',function(){

       var stud_id =$(this).closest('tr').find('.stud_id').text();
          // alert(stud_id);

          $('#stu_delete_id').val(stud_id);
          $('#studentDeleteModal').modal('show');

      });
      $(document).on('click','.studentdelete',function(){
        var stud_id =$('#stu_delete_id').val();

        $.ajax({
          method:"POST",
          url:"/student/delete",
          data:{
            'stud_id': stud_id
          },
          success:function(response)
          {
            // $('#studentDeleteModal').modal('hide');
            // $('.studentdata').html("");
            //  loadstudent();




            alertify.set('notifier','position','top-right');
            alertify.success(response.status);

          }

        });

      });

    });



  </script>






<!-- Java Script code For Post Request (Save Data in Data Base) -->
<script>
  $(document).ready(function(){
    $(document).on('click', '.studentsave', function(e){
    e.preventDefault();

    if($.trim($('.name').val()).length == 0)
    {
      error_name ="Plese Enter Full Name";
      $('#error_name').text(error_name);

    }
    else
    {
      error_name ="";
      $('#error_name').text(error_name);
    }


    if(error_name !='') 
    {
      return false;
    }
    else{
      var data ={

      'name':$('.name').val(),
      'email':$('.email').val(),
      'phone':$('.phone').val(),
      'course':$('.course').val(),
      '<?= csrf_token() ?>':'<?=csrf_hash()?>'// Include CSRF Token
      }

          // AJAX Query
      $.ajax({
          method:"POST",
          url:"/student/store",
          data:data,
          success: function(response)
          {
            $('.container').model('hide');
            $('.container').find('input').val('');

            $('.studentdata').model('hide');
            $('.studentdata').find('input').val('');

            $('.studentdata').html('');
            loadstudent();

            alertify.set('notifier', 'position' , 'top-right');
            alertify.success(response.status);

            alert(response.status);

            }

        });
      }


    });

  });
</script>


</html>