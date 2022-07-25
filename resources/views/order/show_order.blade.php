@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-center">Geçmiş Siparişler</div>
        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th scope="col">Ad</th>
                <th scope="col">Telefon</th>
                <th scope="col">E-posta</th>
                <th scope="col">Tarih</th>
                <th scope="col">Saat</th>
                <th scope="col">Yemeğin Adı</th>
                <th scope="col">Adet</th>
                <th scope="col">Yemeğin Fiyatı</th>
                <th scope="col">Toplam(₺)</th>
                <th scope="col">Adres</th>
                <th scope="col">Siparişin Durumu</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order as $row)
              <tr>
                <td>{{ $row->user->name }}</td>
                <td>{{ $row->phone }}</td>
                <td>{{ $row->user->email }}</td>
                <td>{{ $row->date }}</td>
                <td>{{ $row->time }}</td>
                <td>{{ $row->meal->name }}</td>
                <td>{{ $row->qty }}</td>
                <td>{{ $row->meal->price }}</td>
                <td>{{ $row->meal->price * $row->qty }}</td>
                <td>{{ $row->address}}</td>
                @if($row->status == "Onaylanıyor")
                <td class="mt-3 badge bg-secondary text-wrap">{{ $row->status}}</td>
                @endif
                @if($row->status == "Kabul")
                <td class="mt-3 badge bg-primary text-wrap">{{ $row->status}}</td>
                @endif
                @if($row->status == "Ret")
                <td class="mt-3 badge bg-danger text-wrap">{{ $row->status}}</td>
                @endif
                @if($row->status == "Tamamlandı")
                <td class="mt-3 badge bg-success text-wrap">{{ $row->status}}</td>
                @endif
              </tr>
              @endforeach
            </tbody>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection