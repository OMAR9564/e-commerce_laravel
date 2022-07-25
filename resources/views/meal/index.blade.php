@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header bg-info text-light text-center">Bütün Yemekler</div>
      </div>
      <div class="card-body">
        @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{ session('message') }}
        </div>
        @endif
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Yemeğin Fotoğrafı</th>
              <th scope="col">Yemeğin Adı</th>
              <th scope="col">Açıklama</th>
              <th scope="col">Kategory</th>
              <th scope="col">Fiyat(₺)</th>
              <th scope="col">Düzelt</th>
              <th scope="col">Sil</th>
            </tr>
          </thead>
          <tbody>
            @if(count($meals) > 0)
            @foreach($meals as $row)
            <tr>
              <th scope="row">{{$row->id}}</th>
              <td><img src="{{asset($row->image)}}" width="80"></td>
              <td>{{$row->name}}</td>
              <td><textarea style="resize: none; background-color:white; border-style: none ;" disabled>{{$row->description}}</textarea></td>
              <td>{{$row->category}}</td>
              <td>{{$row->price}}</td>
              <td><a href="{{route('meal.edit', $row->id)}}"><button class="btn btn-primary">Düzelt</button></a></td>
              <td><a href=""><button class="btn btn-primary">Sil</button></a></td>
            </tr>
            @endforeach
            @else
            <p>Kayıtlı Yemek Bulunmadı!!</p>
            @endif
          </tbody>
        </table>
        {{$meals->links()}}
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header bg-info text-light text-center">Menü</div>
        <div class="card-body text-right">
          <ul class="list-group">
            <a href="{{ route('cat.show') }}" class="list-group-item list-group-item-action">Kategoryleri Göster</a>
            <a href="{{ route('meal.create') }}" class="list-group-item list-group-item-action">Yemek Ekle</a>
            <a href="" class="list-group-item list-group-item-action">Müşterilerin Siparişleri</a>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection