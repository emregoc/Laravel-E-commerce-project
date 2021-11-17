<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sepetim</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1 class="px-5"> Sepetim </h1>
    <div class="py-5">
        <div class="container">
          <div class="row hidden-md-up">
              @foreach ($userProducts as $userProduct)
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-block">
                        <input type="hidden" name="id" value="{{ $userProduct->id }}">
                        <input type="hidden" name="name" value="{{ $userProduct->name }}">
                        <input type="hidden" name="price" value="{{ $userProduct->price }}">
                        <h4 class="card-title">{{$userProduct->name}}</h4>
                        <h6 class="card-subtitle text-muted">{{$userProduct->price}}</h6>
                        <p class="card-text p-y-1">Some quick example text to build on the card title .</p>
                        <a href="#" class="card-link btn btn-success">Ürün Detayı</a>
                        <a href="#" class="card-link btn btn-danger">Ürünü Sil</a>
                    </div>
                  </div>
                </div>
              @endforeach
              <a href="{{route('product.payment')}}" class="card-link btn btn-success">Siparişi Tamamla</a>
          </div>
          <br>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>