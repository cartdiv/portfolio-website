@extends('admin.admin_master')
@section('admin')
    
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Change Password</h4>
                                       <br>


                                       @if(count($errors))
                                            @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show">{{$error}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>

                                            @endforeach

                                        @endif

                                        <form method="post" action=" {{ route('update.password') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Old password</label>
                                                <div class="col-sm-10">
                                                    <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">New password</label>
                                                <div class="col-sm-10">
                                                    <input name="newpassword" class="form-control" type="password" id="newpassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm password</label>
                                                <div class="col-sm-10">
                                                    <input name="confirm_password" class="form-control" type="password" id="confirm_password">
                                                </div>
                                            </div>





                                           
                                            <input type="submit" class="btn btn-secondary waves-effect waves-light" value="Change Password">
                                        </form>

                                        

                                       
                                      
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection