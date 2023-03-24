<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fano's Shopping Inc.</title>
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('images/Logo.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
                  .adjustment{
                    display: flex;
                    align-items: flex-start;
                  }
                        .background {
                      position: fixed;
                      background-size: cover;
                      top: 0;
                      left: 0;
                      z-index: -1;
                      width: 100%;
                      height: 100%;
                      background-image: url('https://images7.alphacoders.com/383/383325.jpg');
                      filter: blur(5px);
                    }
                    .card-border{
                      border-style: solid;
                      flex-wrap:wrap; 
                      justify-content:center;
                      width: fit-content;
                      block-size: fit-content;
                      margin-top: 30px;
                      margin-bottom: 30px;
                      margin-right: auto;
                      margin-left: auto;
                    }
                    .card {
                      display: inline-block;
                      margin: 10px;

                      }
                      .hr1 {
                        padding: 0;
                        margin: 0;
                    }
                    
                    footer {
                        background-color: rgba(255, 255, 255, 0.7);
                    }
                    
                    .h1-footer {
                        color: rgb(152, 255, 200);
                        text-align: center;
                        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                    }
                    
                    .text-muted {
                        text-align: center;
                        color: white;
                    }
                    
                    img.sosimg {
                        height: 20px;
                        width: 20px;
                        margin-right: 2px;
                    }
                    .Cart-Container{
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      margin: 30px auto;
                      width: 70%;
                      height: 85%;
                      background-color: #ffffff;
                      border-radius: 20px;
                      box-shadow: 0px 25px 40px #1687d933;

                      }
  </style>

</head>

<body>

<div class ="background"></div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

  <nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="{{route ('mainpage')}}">
      <img src="{{ URL::asset('images/Logo.png') }}" alt="" width="60" height="55" style="border-radius: 50%;">
    </a>
  </div>
</nav>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link"  href="{{route ('mainpage')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route ('productlist')}}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="{{route ('product_menu')}}">Manage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route ('category')}}">Category</a>
        </li>
      </ul>


      <h1 class = "position-absolute top-50 start-50 translate-middle">Product List</h1>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a href="{{route ('cart.index')}}">
      <i class="fa fa-shopping-cart" style="font-size:36px"></i>
      </a>
    &nbsp;  &nbsp;
  <div class="dropdown ml-auto">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="{{ URL::asset('images/Logo.png') }}" alt="" width="60" height="55" style="border-radius: 50%;">
    </button>
    <div class="dropdown-menu dropdown-menu-right position-relative" aria-labelledby="dropdownMenuButton" >
    @if (auth()->check())
  <p>Hello <b>{{ auth()->user()->user_username }}</b></p>
@endif
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{route ('logout')}}">Logout</a>

    </div>
  </div>
</nav>
    </div>
  </div>
</nav>


<div class="Cart-Container">
  <div class="Cart-content" style="display:inline-block;">
    <div class="card-border">
      <?php $total = 0; ?>
      @foreach($clone as $cl)
        <div class="card" style="width: 18rem;">
          <img src="{{ URL::asset('images/product_pictures/'.$cl->product_picture) }}" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">{{ $cl->product_name }}</h5>
            <p class="card-text">Rp {{ $cl->product_price }}.00</p>
              <p class="card-text">Quantity: {{$cl->product_stock}}</p>
              <a href="#" class="btn btn-danger delete" data-id="{{ $cl->product_id }} ">Remove</a>


          </div>
          <?php $total += $cl->product_price * $cl->product_stock; ?>
        </div>
        @if(($loop->iteration % 3) == 0)
          <div style="flex-basis: 100%;"></div>
        @endif
      @endforeach
      <p style ="color:red;">&nbsp;* To add more quantity, go to Products and click BUY on the same item<p>
    </div>
    <hr style="background-color:rgb(0,0,0); height:20px;">
    <?php $tax = $total * 0.1; ?>
    <div class="total">
      <h3>Tax&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;= Rp {{ $tax }}.00</h3>
      <br>
      <?php $total += $tax; ?>
      <h2>Total&nbsp;= Rp {{ $total }}.00</h2>
    </div>
  </div>
</div>


<footer>
<hr class="hr1">
<div class="container">
    <div class="row">
    <div class="col-md-3 col-sm-6">
</div>


    <div class="col-md-3 col-sm-6">
        <h3>Links</h3>
        <ul class="list-inline">
        <li><a class ="sos" href="https://github.com/Fano0612"><img class="sosimg" src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png"alt =""> Fano0612</li>
        <br><br>
        <li><a class ="sos" href="https://www.linkedin.com/in/yonathan-fanuel-mulyadi-08a690231/"><img class="sosimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/LinkedIn_logo_initials.png/800px-LinkedIn_logo_initials.png" alt="">Fano12.M</a></li>
        </ul>
      </div>
      
      <div class="col-md-3 col-sm-6">
        <h3>Stay Connected</h3>
        <ul class="list-inline">
        <li><a class ="sos" href="mailto:Fanomulyadi@gmail.com"><img class="sosimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Gmail_icon_%282020%29.svg/2560px-Gmail_icon_%282020%29.svg.png"alt =""> Fanomulyadi@gmail.com</li>
        <br><br>
        <li><a class ="sos" href="https://www.instagram.com/fano12.m/"><img class="sosimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/2048px-Instagram_logo_2016.svg.png" alt="">Fano12.M</a></li>
      <br><br>
      <li><a class ="sos" href="https://wa.link/dikcdp"><img class="sosimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/640px-WhatsApp.svg.png" alt="">+6281398590772</a></li>
        </ul>
      </div>
   


    <div class="row">
      <div class="col-xs-12">
        <hr>
        <p class="text-muted">©2023<a href="https://www.instagram.com/fano12.m/"> Fano Mulyadi</a></p>
      </div>
    </div>
  </div>
  <hr class="hr1">
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<script>
  $('.delete').click(function() {
    var catId = $(this).data('id');
    swal({
        title: "Delete Data?",
        text: "Delete data " + catId + "?\n" + "Once it's deleted, you won't be able to recover this data anymore",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false,
        closeOnEsc: false,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "{{ url('deletion') }}" + '/' + catId,
            type: "POST",
            data: {
              '_method': 'DELETE',
              '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
              swal("Data has been deleted successfully!", {
                icon: "success",
              }).then(() => {
                window.location.reload();
              });
            },
            error: function(data) {
              swal("Oops", "Something went wrong!", "error");
            }
          });
        } else {
          swal("Data deletion cancelled!");
        }
      });
  });
</script>


</html>