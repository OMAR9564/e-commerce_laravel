@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-success text-center text-light">Yemek</div>
        <div class="card-body text-right">
          <div class="row">
            <div class="col-md-6">
              <p>
              <h4><strong style="color:seagreen; font-size:22px;">Kategory:
                </strong>{{$meal->category}}</h4>
              </p>
              <p>
              <h4><strong style="color:seagreen; font-size:22px;">Yemeğin Adı:
                </strong>{{$meal->name}}</h4>
              </p>
              <p>
              <h4><strong style="color:seagreen; font-size:22px;">Yemeğin Fiyatı:
                </strong>{{$meal->price}}</h4>
              </p>
              <p>
              <h4><strong style="color:seagreen; font-size:22px;">Yemeğin Açıklaması:</p>
                  <p>
                </strong>{{$meal->description}}</h4>
              </p>
            </div>
            <div class="col-md-6">
              <img src="{{asset($meal->image)}}" class="img-thumbnail" style="width: 500px;">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg-success text-center text-light">Siparişin Bilgileri</div>
        <div class="card-body text-right">
          @if(Auth::check())
          <form action="{{ route('order.store') }}" method="post">
            @csrf
            <div class="form-group">
              <p><strong style="color:seagreen;font-size:18px;">Ad:</strong>{{ auth()->user()->name }}</p>
              <p><strong style="color:seagreen;font-size:18px;">E-Posta:</strong>{{ auth()->user()->email }}</p>
              <p><strong style="color:seagreen;font-size:18px;">Telefon Numarası:</strong>
                <input type="tel" name="phone" required class="form-control" required>
              </p>
              <p><strong style="color:seagreen;font-size:18px;">Adet:</strong>
                <input type="number" name="qty" class="form-control" value="0" required>
              </p>
              <p><input type="hidden" name="meal_id" value="{{ $meal->id }}"></p>
              <p><strong style="color:seagreen;font-size:18px;">Tarih:</strong>
                <input type="date" name="date" id="date" class="form-control" required>
              </p>
              <p><strong style="color:seagreen;font-size:18px;">Saat:</strong>
                <input type="time" name="time" class="form-control" required>
              </p>
              <p><strong style="color:seagreen;font-size:18px;">Adres:</strong>
                <textarea name="address" class="form-control" required></textarea>
              </p>
              <p class="text-center">
                <button class="btn btn-success" type="submit" style="font-size: 20px;">Sipariş Et</button>
              </p>
            </div>
          </form>
          @else
          <p><a href="/login">Lütfen Giriş Yapınız</a></p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('date').valueAsDate = new Date();
</script>
@endsection