@extends('layouts.app')
@section('content')
<!-- row -->
<div class="row mt">
  <div class="col-md-12">
      <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
        <h4>PRODUCT</h4>
        <button class="btn btn-primary fa fa-plus-circle" id="addnewpro"> Add New</button>
        <hr>
        <thead>
          <tr>
            <th>No</th>
            <th class="hidden-phone"> Name</th>
            <th>Company</th>
            <th>Category</th>
            <th>QTY</th>
            <th>Price In</th>
            <th>Price Out</th>
            <th><i class="fa fa-edit"></i>Status</th>
          </tr>
        </thead>
        <?php
            $i=1;
            ?>
            @foreach ($pro as $row)
        <tbody>                       
          <tr>
              <td>{{$i++}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->sup_name}}</td>
              <td>{{$row->category}}</td>
              <td>{{$row->qty}}</td>
              <td>$ {{$row->inprice}}</td>
              <td>$ {{$row->outprice}}</td>
          <td>
              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
              <button class="btn btn-primary btn-xs" data-name="{{$row->name}}"
                                                      data-qty="{{$row->qty}}"
                                                      data-inprice="{{$row->inprice}}"
                                                      data-outprice="{{$row->outprice}}"                                                                                                          
                                                      data-editor1="{!! nl2br($row->description)!!}"
               data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i></button>
              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
  </div>
</div>
<div class="modal fade" id="addnewp" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <form action="{{ route('addpro') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Name:</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">QTY:</label>
                      <input type="text" class="form-control" name="qty">
                    </div>
                    <div class="form-group">
                        <label for="">Price In:</label>
                        <input type="text" class="form-control" name="inprice">
                    </div>
                    <div class="form-group">
                        <label for="">Price Out:</label>
                        <input type="text" class="form-control" name="outprice">
                    </div>
                    <div class="form-group">
                        <label for="">Supplier Company:</label>
                        <select class="form-control" name="supid">
                            @foreach ($sup as $row)
                            <option value="{{$row->id}}">{{$row->com_name}}</option>     
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                          <label>Supplier Company</label>
                          <select class="form-control" name="catid">
                              @foreach ($cat as $row)
                              <option value="{{$row->id}}">{{$row->category}}</option>     
                              @endforeach
                          </select>
                    </div>
                  </div>
                  <div class="col-sm-6">    
                      <div class="form-group">
                          <label for="">Description:</label>
                          <textarea class="textarea form-control" name="discription" id="editor" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                      <div class="form-group">
                          <label>File input</label>
                          <div class="form-control">
                            <input type="file" name="image" class="custom-file-input">
                          </div>
                      </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-xs">Save Data</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <form action="{{ route('updatepro') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Name:</label>
                      <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">QTY:</label>
                      <input type="text" class="form-control" name="qty" id="qty">
                    </div>
                    <div class="form-group">
                        <label for="">Price In:</label>
                        <input type="text" class="form-control" name="inprice" id="inprice">
                    </div>
                    <div class="form-group">
                        <label for="">Price Out:</label>
                        <input type="text" class="form-control" name="outprice" id="outprice">
                    </div>
                    <div class="form-group">
                        <label for="">Supplier Company:</label>
                        <select class="form-control" name="supid" id="supid">
                            @foreach ($sup as $row)
                            <option value="{{$row->id}}">{{$row->com_name}}</option>     
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                          <label>Supplier Company</label>
                          <select class="form-control" name="catid" id="catid">
                              @foreach ($cat as $row)
                              <option value="{{$row->id}}">{{$row->category}}</option>     
                              @endforeach
                          </select>
                    </div>
                  </div>
                  <div class="col-sm-6">    
                      <div class="form-group">
                          <label for="">Description:</label>
                          <textarea class="textarea form-control" name="editor1" id="editor1"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                      <div class="form-group">
                          <label>File input</label>
                          <div class="form-control">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            
                          </div>
                      </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-xs">Save Data</button>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')

<script>
  
  // CKEDITOR.replace('editor');
  //  CKEDITOR.replace('editor1');
  $(document).ready(function(){
    $("#addnewpro").click(function(){
      $("#addnewp").modal();
    });
  });
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var name = button.data('name')
  var qty = button.data('qty')
  var inprice = button.data('inprice')
  var outprice = button.data('outprice')
  var editor1 = button.data('editor1')
  var modal = $(this)
  modal.find('.modal-body #name').val(name);
  modal.find('.modal-body #qty').val(qty);
  modal.find('.modal-body #inprice').val(inprice);
  modal.find('.modal-body #outprice').val(outprice);
  modal.find('.modal-body #editor1').val(editor1);
});
// (function(){
//         $(".modal").on("hidden.bs.modal", function(){
//         });
// });
  </script>
@endsection
