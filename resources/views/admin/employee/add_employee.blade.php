@extends('admin.master')
@section('outlook','Add Employee')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card">
            <div class="row">
                <div class="card-header col-md-6 col-6">
                    <h3 class="font-weight-bolder">Add Employee</h3>
                </div>
                <div class="card-header col-md-6 col-6 text-right">
                    <a href="" class="viewall btn btn-info btn-xs"><i class="fa fa-user"></i> All Employees</a>
                </div>
            </div> 
            @include('admin.includes.message')
            <div class="card-body">
                <form method="POST"  enctype="multipart/form-data" id="formEmployee">
                 @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="f_name">Name</label>
                          <input type="text" id="f_name" class="form-control" name="f_name" >
                            @if ($errors->has('f_name'))
                                <p class="text-danger">{{ $errors->first('f_name') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                          <input type="email" id="email" class="form-control" name="email" >
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone">Mobile</label>
                          <input type="text" id="phone" class="form-control" name="phone" >
                            @if ($errors->has('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>

						<div class="form-group col-md-6">
                            <label for="address">Address</label>
                          <textarea type="text" id="address" class="form-control" name="address" cols="40" rows="3"></textarea>
                            @if ($errors->has('address'))
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label for="experience">Experience</label>
                          <input type="text" id="experience" class="form-control" name="experience" >
                            @if ($errors->has('experience'))
                                <p class="text-danger">{{ $errors->first('experience') }}</p>
                            @endif
                        </div>

 						<div class="form-group col-md-6">
                            <label for="designation">Designation</label>
                          <select id="designation" class="form-control" name="designation" autocomplete="off" >
                          	<option value="">--Select one--</option>
                          	<option value="1">Store Kepper</option>
                          	<option value="2">Sales Manager</option>
                          	<option value="3">Sales Man</option>
                          </select>
                            @if ($errors->has('designation'))
                                <p class="text-danger">{{ $errors->first('designation') }}</p>
                            @endif
                        </div>

                           <div class="form-group col-md-6">
                            <label for="nid_no">NID</label>
                          <input type="text" id="nid_no" class="form-control" name="nid_no" >
                            @if ($errors->has('nid_no'))
                                <p class="text-danger">{{ $errors->first('nid_no') }}</p>
                            @endif
                        </div>

                         <div class="form-group col-md-6">
                            <label for="salary">Salary</label>
                          <input type="text" id="salary" class="form-control" name="salary" >
                            @if ($errors->has('salary'))
                                <p class="text-danger">{{ $errors->first('salary') }}</p>
                            @endif
                        </div>

                         <div class="form-group col-md-6">
                            <label for="vacation">Vacation</label>
                          <input type="text" id="vacation" class="form-control" name="vacation" >
                            @if ($errors->has('vacation'))
                                <p class="text-danger">{{ $errors->first('vacation') }}</p>
                            @endif
                        </div>

                         <div class="form-group col-md-6">
                            <label for="city">City</label>
                          <input type="text" id="city" class="form-control" name="city" >
                            @if ($errors->has('city'))
                                <p class="text-danger">{{ $errors->first('city') }}</p>
                            @endif
                        </div>

                         <div class="form-group col-md-4">
                           <label for="photo">Photo</label>
                          <input type="file" id="photo" class="form-control-file" name="photo">
                            @if ($errors->has('photo'))
                                <p class="text-danger">{{ $errors->first('photo') }}</p>
                            @endif
                        </div>

                         <div class="form-group col-md-2">
                           <div id="preview">
                           	
                           </div>
                        </div>


                    </div>
                    <input class="btn btn-success" type="submit" id="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>

        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>

@endsection

@section('custom_js')
<script type="text/javascript">
$('input[type="file"][name="photo"]').val('');
$('input[type="file"][name="photo"]').val('').on('change',function(){
var img_path = $(this)[0].value;
var preview = $('#preview');
var extention = img_path.substring(img_path.lastIndexof('.')+1).toLowerCase();
alert(extention)
if(extention == 'jpeg' || extention == 'jpg' || extention =='png'){
    if(typeof(FileReader) != 'undefined'){
        $(preview).empty();
        var reader = new FileReader();
        reader.onload = function(e){
        $('<img/>',{'src' : e.target.result, 'class':'img-fluid','style':'width:80px;height:80px;'}).appendTo(preview)
        }
       preview.show();
       reader.readAsDataURL($(this)[0].files[0]);
    }
    else{
     $(preview).html('not supported');
    }
 }else{
    $(preview).empty();
 }
});

// pass the csrf token for post method
$.ajaxSetup({
headers:{
 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function(){
$("#formEmployee").on("submit",function(e){
e.preventDefault();
var form = new FormData(this);
$.ajax({
 
url:"{{route('store.employee')}}",
data: form,
contentType:false,
cache:false,
processData:false,
method:"POST",

success:function(response){
    $("#formEmployee")[0].reset();
    alert('done');
},
error:function(error){
    alert('not done');
}
  });

});  

});
</script>
@endsection

