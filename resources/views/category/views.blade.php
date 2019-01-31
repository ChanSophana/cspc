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
<!-- row -->
<div class="row mt">
    <div class="col-sm-12">
      {{-- <div class="content-panel showback"> --}}
        <table class="table table-striped table-advance table-hover">
          <h4>PRODUCT</h4>
          <button class="btn btn-success  fa fa-plus-circle">Add New</button>
          <hr>
          <thead>
            <tr>
                <th></th>
              <th>No</th>
              <th class="hidden-phone">Name</th>
              <th>Photo</th>
              <th>Discription</th>
              <th><i class=" fa fa-edit"></i> Status</th>
            </tr>
          </thead>
          <?php
              $i=1;
              ?>
              @foreach ($cate as $row)
          <tbody>                       
            <tr>
                <td></td>
                <td>{{$i++}}</td>
                <td>{{$row->category}}</td>
                <td><img src="{{ URL::asset("assets/images/category/".$row->image)}}" class="elevation-2" alt="User Image" Width="20px"></td>
                <td>{!! nl2br($row->description) !!}</td>
              <td>
                <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      {{-- </div> --}}
      <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
  </div>
  <!-- /row -->
@endsection
@section('js')
<script src="{{ URL::asset("assets/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{ URL::asset("assets/plugins/datatables/dataTables.bootstrap4.min.js")}}"></script>
<script type="text/javascript" language="javascript" src="{{ URL::asset("assets/lib/advanced-datatable/js/jquery.dataTables.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("assets/lib/advanced-datatable/js/DT_bootstrap.js")}}"></script>
<script type="text/javascript">
  /* Formating function for row details */
  function fnFormatDetails(oTable, nTr) {
    var aData = oTable.fnGetData(nTr);
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
    sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
    sOut += '</table>';

    return sOut;
  }

  $(document).ready(function() {
    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement('th');
    var nCloneTd = document.createElement('td');
    nCloneTd.innerHTML = '<img src="{{ URL::asset("assets/lib/advanced-datatable/images/details_open.png")}}">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each(function() {
      this.insertBefore(nCloneTh, this.childNodes[0]);
    });

    $('#hidden-table-info tbody tr').each(function() {
      this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
    });

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#hidden-table-info').dataTable({
      "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": [0]
      }],
      "aaSorting": [
        [1, 'asc']
      ]
    });

    $('#hidden-table-info tbody td img').live('click', function() {
      var nTr = $(this).parents('tr')[0];
      if (oTable.fnIsOpen(nTr)) {
        /* This row is already open - close it */
        this.src = "{{ URL::asset("assets/lib/advanced-datatable/media/images/details_open.png")}}";
        oTable.fnClose(nTr);
      } else {
        /* Open this row */
        this.src = "{{ URL::asset("assets/lib/advanced-datatable/images/details_close.png")}}";
        oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
      }
    });
  });
</script>
  @endsection