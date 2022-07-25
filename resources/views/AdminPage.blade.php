@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breakcrumb">
        <ol class="breakcrumb bg-warning">
          <li class="breakcrumb-item active" aria-current="page">Müşterilerin Siparişleri</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          <a href="{{ route('cat.show') }}" style="float:right"><button class="btn btn-success btn-default" style="margin-left:6px;">
              Yeni Kategory Ekle
            </button></a>
          <a href="{{ route('meal.index') }}" style="float:right"><button class="btn btn-info btn-default" style="margin-left:6px;">
              Yemekleri Göster
            </button></a>
          <a href="{{ route('meal.create') }}" style="float:right"><button class="btn btn-danger btn-default" style="margin-left:6px;">
              Yemek Ekle
            </button></a>
        </div>
        <div class="card-body text-center">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Ad</th>
                <th scope="col">Telefon</th>
                <th scope="col">E-Posta</th>
                <th scope="col">Tarih</th>
                <th scope="col">Saat</th>
                <th scope="col">Yemek</th>
                <th scope="col">Adet</th>
                <th scope="col">Yemeğin Fiyatı(₺)</th>
                <th scope="col">Toplam Fiyat(₺)</th>
                <th scope="col">Adres</th>
                <th scope="col">Durum</th>
                <th scope="col">Kabul</th>
                <th scope="col">Sipariş Rett</th>
                <th scope="col">Sipariş Tamamlandı</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order as $row)
              <tr>
                <td>{{$row -> user -> name}}</td>
                <td>{{$row -> phone}}</td>
                <td>{{$row -> user -> email}}</td>
                <td>{{$row -> date}}</td>
                <td>{{$row -> time}}</td>
                <td>{{$row -> meal -> name}}</td>
                <td>{{$row -> qty}}</td>
                <td>{{$row -> meal -> price}}₺</td>
                <td>{{$row -> meal -> price * $row -> qty}}₺</td>
                <td>{{$row -> address}}</td>
                <td>{{$row -> status}}</td>
                <form action="{{ route('order.status', $row->id) }}" method="post">
                  @csrf
                  <td>
                    <input type="submit" value="Kabul" name="status" class="btn btn-primary btn-sm">
                  </td>
                  <td>
                    <input type="submit" value="Ret" name="status" class="btn btn-danger btn-sm">
                  </td>
                  <td>
                    <input type="submit" value="Tamamlandı" name="status" class="btn btn-success btn-sm">
                  </td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection