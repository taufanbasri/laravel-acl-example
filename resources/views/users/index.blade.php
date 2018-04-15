@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-success"> Create New User</a>
        </div>
      </div>
    </div>

    @include('layouts._message')

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th width="280px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $key => $user)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if ($user->getRoleNames()->isNotEmpty())
                @foreach ($user->getRoleNames() as $role)
                  <label class="badge badge-success">{{ $role }}</label>
                @endforeach
              @endif
            </td>
            <td>
              <a href="{{ route('users.show', $user->id) }}">Show</a>
              <a href="{{ route('users.edit', $user->id) }}">Edit</a>
              <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {!! $data->render() !!}
@endsection
