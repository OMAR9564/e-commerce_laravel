@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-danger text-center text-light">Yemeği Düzelt</div>
        <form action="{{ route('meal.update', $meal->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="old_image" value="{{ $meal->image }}">
          <div class="card-body text-right">
            <div class="form-group">
              <label for="name">Yemeğin Adı</label>
              <input type="text" class="form-control" value="{{ $meal->name }}" name="name" placeholder="Yemeğin Adı">
            </div>
            <div class="form-group">
              <label for="description">Yemeğin Açıklaması</label>
              <textarea name="description" class="form-control">{{ $meal->description }}</textarea>
            </div>
            <div class="row">
              <div class="col">
                <label>Yemeğin Fiyatı(₺)</label>
                <input type="number" name="price" value="{{ $meal->price }}" class=" form-control" placeholder="Yemeğin Fiyatı">
              </div>
            </div>
            <div class="form-group">
              <h6>Kategory Seç <span class="text-danger">*</span></h6>
              <div class="controls">
                <select name="category" required="" class="form-control">
                  <option value="" selected="" disabled="">Kategory Seç</option>
                  @foreach($cats as $cat)
                  <option value="{{ $cat->cat_name }}">{{ $cat->cat_name }}</option>
                  @endforeach
                </select>
                <br>
                <div class="form-group">
                  <label>Yemeğin Fotoğrafı</label>
                  <input type="file" id="image" class="form-control" name="image">
                </div>
                <div class="form-group">
                  <br>
                  <img src=" {{ asset($meal->image) }}" style="width: 100px; height: 100px" id="showImage">
                </div>
                <br>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-danger">Düzelt</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg-danger text-light text-center">Menü</div>
        <div class="card-body text-right">
          <ul class="list-group">
            <a href="{{ route('cat.show') }}" class="list-group-item list-group-item-action">Kategory Ekle</a>
            <a href="{{ route('meal.index') }}" class="list-group-item list-group-item-action">Yemekleri Göster</a>
            <a href="" class="list-group-item list-group-item-action">Müşterilerin Siparişleri</a>

          </ul>
        </div>
      </div>
      @if(count($errors) > 0)
      <div class="card mt-5">
        <div class="card-body">
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>
              {{ $error }}
            </p>
            @endforeach
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#image').change(function(e) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
@endsection