@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-lg-12 margin-tb">
        <div class="pull-left">
          <h2>Role Management</h2>
        </div>
        <div class="pull-right">
          @can ('role-create')
            <a href="{{ route('roles.create') }}" class="btn btn-success"> Create New Role</a>
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
          <th width="280px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $key => $role)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $role->name }}</td>
            <td>
              <a href="{{ route('roles.show', $role->id) }}">Show</a>
              @can ('role-edit')
                <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
              @endcan
              @can ('role-delete')
                <form action="{{ route('roles.destroy', $role->id) }}" method="post" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              @endcan
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {!! $roles->render() !!}
@endsection
