@extends('layout.master')
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
          <h3 class="card-title">Insert Product</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                  {{-- left --}}
              <div class="card-body">
                <div class="form-group">
                    <label for="product">Product Name</label>
                    <input type="text" class="form-control" id="product" name="proname" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                    <label for="price_in">Price In</label>
                    <input type="text" class="form-control" id="price_in" name="pricein" placeholder="Enter Price In">
                </div>
                <div class="form-group">
                  <label for="price_out">Price Out</label>
                  <input type="text" class="form-control" id="price_out" name="priceout" placeholder="Enter Price Out">
                </div>
                <div class="form-group">
                  <label for="qty">Quanlity</label>
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Quanlity">
                </div>
                <div class="form-group">
                    <label for="discription">Dicription</label>
                    <textarea class="textarea form-control"  name="discription" id="editor" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <label>Supplier Company</label>
                  <select class="form-control" name="supplier">
                    @foreach ($sup as $row)
                      <option value="{{$row->id}}">{{$row->com_name}}</option>     
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                {{-- right --}}
              <div class="card-body">
                
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category">
                    @foreach ($cat as $row)
                      <option value="{{$row->id}}">{{$row->category}}</option>     
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="unitinstock">Unit In Stock</label>
                    <input type="text" class="form-control" id="unitinstock" name="unitinstock" placeholder="Enter Unit In Stock">
                </div>
                <div class="form-group">
                  <label for="unitonorder">Unit On Order</label>
                  <input type="text" class="form-control" id="unitonorder" name="unitonorder" placeholder="Enter Unit On Order">
                </div>
                <div class="form-group">
                  <label for="reorderlevel">Reorder Level</label>
                  <input type="text" class="form-control" id="reorderlevel" name="reorderlevel" placeholder="Enter Reorder Level">
                </div>
                <div class="form-group">
                  <label>Discontinued</label>
                  <select class="form-control" name="discontinued">
                      <option value="1">Yes</option>
                      <option value="0">No</option>      
                  </select>
                </div>
                <div class="form-group">
                  <label>Upload Image</label>
                  <div class="input-group">
                      <span class="input-group-btn">
                          <span class="btn btn-default btn-file">
                              Browse… <input type="file" id="imgInp">
                          </span>
                      </span>
                      <input type="text" class="form-control" readonly>
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