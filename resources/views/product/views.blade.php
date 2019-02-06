@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ URL::asset("assets/lib/DataTables/datatables.min.css")}}"/>  
@endsection
@section('content')
<!-- row -->
<div class="row mt">
  <div class="col-md-12">
      <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered text-center" id="product-table">
        <h4>PRODUCT</h4>
        <button class="btn btn-primary fa fa-plus-circle" id="addnewpro"> Add New</button>
        <hr>
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="hidden-phone text-center"> Name</th>
            <th class="text-center">Company</th>
            <th class="text-center">Category</th>
            <th class="text-center">QTY</th>
            <th class="text-center">Price In</th>
            <th class="text-center">Price Out</th>
            <th class="text-center fa fa-edit">Action</th>
          </tr>
        </thead>
        <tbody>                       
          {{-- <tr>
              <td>{{$i++}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->sup_name}}</td>
              <td>{{$row->category}}</td>
              <td>{{$row->qty}}</td>
              <td>$ {{$row->inprice}}</td>
              <td>$ {{$row->outprice}}</td>
          <td>
              <button class="btn btn-success btn-xs" onclick="Edit({{$row->id}})"><i class="fa fa-check"></i></button>
              <button class="btn btn-primary btn-xs edit"><i class="fa fa-pencil"></i></button>
              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
            </td>
          </tr> --}}
        </tbody>
      </table>
  </div>
</div>
{{-- <div class="modal fade" id="addnewp" role="dialog">
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
            <form action="{{ route('updatepro') }}" method="POST" enctype="multipart/form-data" id="editform">
              @csrf
              @method('PUT')
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
</div> --}}
@endsection
@section('js')
<script type="text/javascript" src="{{ URL::asset("assets/lib/DataTables/datatables.min.js")}}"></script>
<script>
  var table1=$('#product-table').DataTable(
    {
              processing:true,
              serverSide:true,
              ajax:"{{ route('viewspro')}}",
              column:[
                {data:'id',name:'id'},
                {data:'name',name:'name'},
                {data:'supid',name:'supiid'},
                {data:'catid',name:'catid'},
                {data:'qty',name:'qty'},
                {data:'inprice',name:'inprice'},
                {data:'outprice',name:'outprice'},
                {data:'action',name:'action',
                orderable:false,searchacle:false},
              ],

    }
  );
</script>
@endsection
