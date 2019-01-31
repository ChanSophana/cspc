<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset("assets/dist/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset("assets/dist/css/heroic-features.css")}}" rel="stylesheet">
  </head>

  <body class="bg-secondary">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">Company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @foreach ($cate as $column)
            <li class="nav-item">
                   
                    <a class="nav-link" href="{{$column->category}}">{{$column->category}}</a>
            </li>
            @endforeach
            <li class="nav-item">
                    <a class="nav-link" href="#">About
                    </a>
            </li>
        </div>
    </div>
  </nav>

    <!-- Page Content -->
    <div class="container">
      <!-- Jumbotron Header -->
      <header class="jumbotron my-4 ">
        <h1 class="display-3">Welcome!</h1>
        <p class="lead"></p>
      </header> 

      <!-- Page Features -->
      <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <h3>Desktop</h3>
      </div>
      <div class="row text-sm-left">
          @foreach ($laptop as $row)
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
            <img class="img-thumbnail" src="{{ URL::asset("assets/images/product/".$row->image)}}" alt="image">
              <div class="card-body ">
              <h4 class="card-title">{{$row->name}}</h4>
              <p class="card-text" >$ {{$row->outprice}}</p>
              </div>
              <div class="card-footer">
                  <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-mytitle="{{$row->id}}" data-target="#exampleModalCenter">
                      More Detail
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <label  id="description" name="description"><label>
                              <textarea name="description" id="description" cols="30" rows="10"></textarea> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
          @endforeach
      </div>
      <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <h3>Desktop</h3>
      </div>
      <div class="row text-sm-left">
          @foreach ($desktop as $row)
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
            <img class="img-thumbnail" src="{{ URL::asset("assets/images/product/".$row->image)}}" alt="image">
              <div class="card-body ">
              <h4 class="card-title">{{$row->name}}</h4>
              <p class="card-text" >$ {{$row->outprice}}</p>
              </div>
              <div class="card-footer">
              </div>
            </div>
          </div>
          @endforeach
      </div>

      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
          <div class="text-center">
              <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
            </div>  
        <div class="row text-sm-left text-white">
              <span> Center <br/>
                092 12 45 64 <br/>
                023 12 45 64 <br/>
                chansophana7@gmail.com</span>
            </div>    
      </div>

      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset("assets/dist/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{ URL::asset("assets/dist/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script>
    $('#exampleModalCenter').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)
      var description= button.data('mytitle')
      var modal=$(this)
      modal.find('.modal-body #description').val(description);
    }
    )
    </script>
  </body>

</html>
