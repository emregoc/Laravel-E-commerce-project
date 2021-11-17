<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SİPARİŞLERİM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
  <h1> Siparişlerim </h1>

  @foreach ($orders as $order) 
        <table class="table table-striped" style="margin-top: 50px">
            <thead>
            <tr>
                <th scope="col">Sipariş Id</th>
                <th scope="col">Ürün Adı</th>
                <th scope="col">Ürün Fiyatı</th>
                <th scope="col">Ürün Adedi</th>
                <th scope="col">Ürün Bazlı Toplam Fiyat</th>
                <th scope="col">Toplam Fiyat</th>
                <th scope="col">Kart Numarası</th>
                <th scope="col">Ödeme Tipi</th>
                <th scope="col">Adres Bilgisi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetail as $orderDetail)
                     @foreach ($orderDetail->orderItem as $orderItem)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $orderItem->name }}</td>
                            <td>{{ $orderItem->price }}</td>
                            <td>{{ $orderDetail->quantity }}</td>
                            <td>{{ $orderDetail->product_total_price }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->userPayment[0]->account_no }}</td>
                            <td>{{ $order->paymentType[0]->payment_type }}</td>
                            <td>{{ $order->userAdress[0]->adress }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endforeach
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>