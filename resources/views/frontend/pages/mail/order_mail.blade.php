<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            width: 50%;
            text-align: center;
        }
        td, th {
            padding: 8px;
        }
        thead{
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
        }
    </style>
</head>
<body>
    <h4>Cảm ơn bạn đã mua hàng tại của hàng Store Classic</h4>
    <h4>Họ Tên: {{ $orders['name'] }}</h4>
    <h4>Email: {{ $orders['email'] }}</h4>
    <h4>Địa Chỉ: {{ $orders['address'] }}</h4>
    <h4>Số Điện Thoại:{{ $orders['phone'] }}</h4>
    <table class="table table-bordered" border="1">
        <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng giá</th>
            </tr>
          </thead>
        <tbody>   
            @foreach($item as $check)
            <tr>
                <td>{{ $check['name'] }}</td>
                <td>{{ $check['qty'] }}</td>
                <td>{{ number_format($check['price'],0,',','.') }} <sup>đ</sup> </td>
                <td colspan="3">Tổng tiền: {{ number_format($check['subtotal'],0,',','.') }}<sup>đ</sup></td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align:center">Thành tiền: {{ number_format($orders['subtotal'],0,',','.') }} <sup>đ</sup></td>
            </tr>
        </tbody>
    </table>
</body>
</html>