@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/findSearch" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="search_term" placeholder="Enter name or email to search">
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">FullName</th>
                                <th scope="col">Points</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (isset($output)) { ?>
                        <tbody>
                            @foreach($output as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                <td>{{ $user->points }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="/promote/{{ $user->id }}" class="btn btn-primary btn-sm p-1">Promote</a>
                                    <a href="/demote/{{ $user->id }}" class="btn btn-danger btn-sm p-1">Demote</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    <?php } else { ?>
                        @foreach ($customers as $c)
                        <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{ $c->first_name.' '.$c->last_name }}</td>
                            <td>{{ $c->points }}</td>
                            <td>{{ $c->email }}</td>
                            <td>
                                <a href="/promote/{{ $c->id }}" class="btn btn-primary btn-sm p-1">Promote</a>
                                <a href="/demote/{{ $c->id }}" class="btn btn-danger btn-sm p-1">Demote</a>
                            </td>
                        </tr>
                        @endforeach

                    <?php } ?>


                    </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection