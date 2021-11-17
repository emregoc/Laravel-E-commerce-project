<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ödeme Ekranı</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
   <form method="POST" action="{{route('payment.result')}}" enctype="multipart/form-data">
     @csrf
    <table class="table table-striped" style="margin-top: 50px">
        <thead>
          <tr>
            <th scope="col">Adresler</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($userAdresses as $userAdress)
                <tr>
                    <td>
                        <input type="radio" id="html" name="adress_id" value="{{$userAdress->id}}">
                        <label for="html">{{$userAdress->adress}}</label><br>
                    </td>
                    <td> </td>
                    <td>--</td>
                </tr>
            @endforeach
        </tbody>
      </table>

      <table class="table table-striped" style="margin-top: 50px">
        <thead>
          <tr>
            <th scope="col">Kartlar</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($userPayments as $userPayment)
                <tr>
                    <td>
                        <input type="radio" id="html" name="cart_id" value="{{ $userPayment->id }}">
                        <label for="html">{{ $userPayment->account_no }}</label><br>
                    </td>
                    <td>--</td>
                    <td>--</td>
                </tr>
            @endforeach
        </tbody>
      </table>

      <table class="table table-striped" style="margin-top: 50px">
        <thead>
          <tr>
            <th scope="col">Ödeme Türü</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($paymentTypes as $paymentType)
                <tr>
                    <td>
                        <input type="radio" id="html" name="payment_type_id" value="{{ $paymentType->id }}">
                        <label for="html">{{ $paymentType->payment_type }}</label><br>
                    </td>
                    <td>--</td>
                    <td>--</td>
                </tr>
            @endforeach
        </tbody>
      </table>

      <table class="table table-striped" style="margin-top: 50px">
        <thead>
          <tr>
            <th scope="col">Ürünler</th>
            <th scope="col">Fiyat</th>
            <th scope="col">Miktar</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($userProducts as $userProduct)
                <tr>
                    <td>{{ $userProduct->name }}</td>
                    <td>{{ $userProduct->price }}</td>
                    <td>{{ $userProduct->quantity }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>   
                <td>Toplam Fiyat</td>
                <td>{{ $totals }}</td>
                <input type="hidden" name="total" value="{{ $totals }}">
            </tr>
        </tbody>
      </table>
      <input type="submit" style="margin-bottom: 50px" class="btn btn-success" value="Siparişi Onayla">
   </form>
      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>