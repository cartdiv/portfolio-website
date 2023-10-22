@extends('admin.admin_master')
@section('admin')
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Footer Page</h4>
<br><br>
                                        <form method="post" action="{{route('update.footer')}} ">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$footer->id}}">

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input name="phone_number" class="form-control" type="text" value="{{ $footer->phone_number }}" id="example-text-input">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">About Info</label>
                                                <div class="col-sm-10">
                                                    <input name="about_info" class="form-control" type="tite" value="{{ $footer->about_info }}" id="example-email-input">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Country</label>
                                                <div class="col-sm-10">
                                                    <input name="country" class="form-control" type="text" value="{{ $footer->country }}" id="example-text-input">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input name="address" class="form-control" type="text" value="{{ $footer->address }}" id="example-text-input">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="email" class="form-control" type="text" value="{{ $footer->email }}" id="example-text-input">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Socal Info</label>
                                                <div class="col-sm-10">
                                                    <input name="socal_info" class="form-control" type="text" value="{{ $footer->socal_info }}" id="example-text-input">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                                <div class="col-sm-10">
                                                    <input name="facebook" class="form-control" type="text" value="{{ $footer->facebook }}" id="example-text-input">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                                <div class="col-sm-10">
                                                    <input name="twitter" class="form-control" type="text" value="{{ $footer->twitter }}" id="example-text-input">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin</label>
                                                <div class="col-sm-10">
                                                    <input name="linkedin" class="form-control" type="text" value="{{ $footer->linkedin }}" id="example-text-input">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                                                <div class="col-sm-10">
                                                    <input name="instagram" class="form-control" type="text" value="{{ $footer->instagram }}" id="example-text-input">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                                <div class="col-sm-10">
                                                    <input name="copyright" class="form-control" type="text" value="{{ $footer->copyright }}" id="example-text-input">
                                                </div>
                                            </div>

                                           
                                            <input type="submit" class="btn btn-secondary waves-effect waves-light" value="Update footer">
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