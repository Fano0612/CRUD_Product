<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fano's Shopping Inc.</title>
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('images/Logo.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
                        .background {
                      position: fixed;
                      background-size: cover;
                      top: 0;
                      left: 0;
                      z-index: -1;
                      width: 100%;
                      height: 100%;
                      background-image: url('https://www.pixelstalk.net/wp-content/uploads/images2/Gucci-Live-Wallpaper.jpg');
                      filter: blur(5px);
                    }
  </style>

</head>

<body>
<div class ="background"></div>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
  <div class="container-fluid">

  <nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="">
      <img src="{{ URL::asset('images/Logo.png') }}" alt="" width="60" height="55" style="border-radius: 50%;">
    </a>
  </div>
</nav>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">



      <h1 class = "position-absolute top-50 start-50 translate-middle">Product Data Update</h1>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
    &nbsp;  &nbsp;
  <div class="dropdown ml-auto">


  </div>
</nav>
    </div>
  </div>
</nav>



  <div class="container">

    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="/editproduct/{{$productdata->product_id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product ID</label>
                <input type="number" name="product_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$productdata->product_id}}" readonly>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$productdata->product_name}}">
              </div>
              <div class="mb-3">

                <label for="exampleInputEmail1" class="form-label">Price</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">Rp</span>
                  <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$productdata->product_price}}">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="number" name="product_stock" class="form-control input-number" id="exampleInputEmail1" value="{{ $productdata->product_stock }}" min="1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Picture</label>
                <input type="file" name="product_picture" class="form-control custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" value="">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                  <option value="{{$productdata->category_id}}" selected>{{$productdata->product__category->product_category }}</option>
                  <option value="1">Apparel</option>
                  <option value="2">Shoes</option>
                  <option value="3">Bags</option>

                </select>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
  





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>