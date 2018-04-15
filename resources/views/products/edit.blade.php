@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Edit Product</h2>
      </div>
      <div class="pull-right">
        <a href="{{ route('products.index') }}" class="btn btn-success"> Back</a>
      </div>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input. <br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('products.update', $product->id) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          <input type="text" class="form-control" name="name" value="{{ $product->name }}">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Detail:</strong>
          <textarea name="detail" class="form-control" style="height:150px">{{ $product->detail }}</textarea>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
@endsection
