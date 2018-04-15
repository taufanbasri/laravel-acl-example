@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Create New User</h2>
      </div>
      <div class="pull-right">
        <a href="{{ route('users.index') }}" class="btn btn-success"> Back</a>
      </div>
    </div>
  </div>

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input. <br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('users.store') }}" method="post">
    @csrf

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Email:</strong>
          <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Password:</strong>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Confirm Password:</strong>
          <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Role:</strong>
          <select class="form-control" name="roles[]" multiple>
            @foreach ($roles as $role)
              <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
@endsection
