@extends('layouts.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-8 align-self-center">
          <h3>Users</h3>
        </div>
        <div class="col-4">
          <form method="GET" action="{{ url('dashboard/users') }}">
            <div class="input-group">
              <input placeholder="search" type="text" class="form-control" name="q" value="{{ $request['q'] ?? '' }}">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary btn-sm px-3"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card-body p-0">
      <table class="table table-striped table-borderless table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Registered</th>
            <th>Edited</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{ ($users->currentPage() - 1) * ($users->perPage()) + $loop->iteration }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at }}</td>
              <td>{{ $user->updated_at }}</td>
              <td> <a href="{{ url('dashboard/user/edit/'.$user->id) }}" title="Edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->appends($request)->links() }}
    </div>
  </div>

@endsection