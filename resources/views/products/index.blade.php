@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
        <div class="pull-right">
          @can ('product-create')
            <a href="{{ route('products.create') }}" class="btn btn-success"> Create New Product</a>
          @endcan
        </div>
      </div>
    </div>

    @include('layouts._message')

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Details</th>
          <th width="280px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $key => $product)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
              <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')

                <a href="{{ route('products.show', $product->id) }}">Show</a>
                @can ('product-edit')
                  <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                @endcan
                @can ('product-delete')
                  <button type="submit" class="btn btn-danger">Delete</button>
                @endcan
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {!! $products->links() !!}
@endsection
