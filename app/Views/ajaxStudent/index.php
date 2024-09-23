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

<!-- Modal (PoP Up Option-->

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

<!-- Java Script code for Get Request -->

 <script>
  $(document).ready(function()
    {
      loadstudent();

    });
     
  function loadstudent()
    {
      $.ajax({
        method:"GET",
        url:"/student/getdata",
        success: function(response)
        {
          console.log(response.students);

          $.each(response.students , function (key, value){
            // console.log(response.students);
            // console.log(value['name']);

          $('.studentdata').append ( '<tr>\
            <td class="stud_id">'+value['id']+'</td>\
            <td>'+value['name']+'</td>\
            <td>'+value['email']+'</td>\
            <td>'+value['phone']+'</td>\
            <td>'+value['course']+'</td>\
            <td>\
            <a href="#" class="badge btn-info viewbtn"> VIEW </a>\
            <a href="#" class="badge btn-primary edit_btn">EDIT</a>\
            <a href="#" class="badge btn-danger deletebtn">DELETE</a>\
            </td>\
            </tr>'
          );          

        });
      }
    });
  }


  </script>




<!-- Java Script code For Post Request  -->
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

            // alertify.set('notifier', 'position' , 'top-right');
            // alertify.success(response.status);

            alert(response.status);

            }

        });
      }


    });

  });
</script>




</html>