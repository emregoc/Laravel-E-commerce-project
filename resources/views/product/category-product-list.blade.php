<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>

     .center{
       text-align: center;
     }

    </style>
<body>

    <div class="row row-cols-1 row-cols-md-3">

      @foreach ($subCategoryProducts->productSubCategory as $product)

        <form action="{{ route('addToCart') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col mb-4">
            <div class="card center">
              <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <input type="hidden" name="name" value="{{ $product->name }}">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text"> <h6> Price : </h6> {{ $product->price }}</p>
                  <input type="submit" class="btn btn-success" value="Sepete Ekle"> 
                </div>
            </div>
          </div>
        </form>

     @endforeach 

   </div>

 

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>