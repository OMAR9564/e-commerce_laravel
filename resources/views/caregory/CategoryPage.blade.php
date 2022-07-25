@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center bg-success text-light">Kategoryler</div>
        <div class="card-body">
          @if(session('message'))
          <div class="alert alert-success" role="alert">
            {{ session('message') }}
          </div>
          @endif
          <table class="table table-borderd text-cneter">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kategorynin Adı</th>
                <th scope="col">Düzlet</th>
                <th scope="col">Sil</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cats as $key => $row)
              <tr>
                <th scope="row" style="width: 9%;">{{ $key=$key+1 }}</th>
                <td hidden>{{$row->id}}</td>
                <td>{{ $row->cat_name }}</td>
                <td style="width: 15%;"><button class="btn btn-primary editbtn">Düzelt</button></td>
                <td style="width: 15%">
                  <a href="{{ route('cat.delete', $row->id) }}" class="btn btn-danger" id="delete">Sil</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <div class="col-md-4 ">
      <div class="card">
        <div class="card-header text-center bg-success text-light">Kategory</div>
        <form action="{{ route('cat.store') }}" method="post">
          <!-- Databese verileri göndermek için @csrf kullanılır -->
          @csrf
          <div class="card-body text-right">
            <div class="form-group">
              <label for="name">Kategorynin Adı</label>
              <input type="text" class="form-control" name="cat_name" placeholder="Katogerynin Adı">
            </div>
            <br>
            <div class="dorm-group text-center">
              <button class="btn btn-danger" type="submit">Kaydet</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yeni Message</h5>
      </div>
      <div class="modal-body">
        <form action=" {{ route('cat.update') }}" method="POST">
          @csrf
          <input type="hidden" class="form-control" name="id" id="id">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Kategorynin Adı:</label>
            <input type="text" class="form-control" id="cat_name" name="cat_name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-primary">Düzelt</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
      $('#exampleModal').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();
      console.log(data);
      $('#id').val(data[0]);
      $('#cat_name').val(data[1]);
    });
  });
</script>
@endsection