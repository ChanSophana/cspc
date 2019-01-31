@extends('layouts.app')
@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset("assets/dist/css/adminlte.min.css")}}">
    
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Insert Suppliers</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                  {{-- left --}}
              <div class="card-body">
                <div class="form-group">
                    <label for="campanyname">Campany Name</label>
                    <input type="text" class="form-control" id="campanyname" name="campanyname" placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                    <label for="contactname">Contact Name</label>
                    <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Enter Cantact Name">
                </div>
                <div class="form-group">
                    <label for="contactnumber">Contact Number</label>
                    <input type="text" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Cantact Number">
                </div>
                
              </div>
            </div>
            <div class="col-md-6">
                {{-- right --}}
              <div class="card-body">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label>Upload Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input type="file" id="imgInp" name="image">
                            </span>
                        </span>
                        <input type="text" class="form-control" name="image" readonly >
                    </div><br/>
                    <img id='img-upload' width="120px" height="120px" class="image"/>
                  </div>
                <div class="card card-primary">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> 
              </div>
            </div>
        </div>
    </div>
  </div>
</div>  
@endsection
</body>
@section('js')
<!-- FastClick -->
<script src="{{ URL::asset("assets/plugins/fastclick/fastclick.js")}}"></script>
<!-- CK Editor -->
<script src="{{ URL::asset("assets/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
  CKEDITOR.replace('editor');
  $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>  
  @endsection