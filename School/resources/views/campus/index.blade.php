@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>campuses </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('campuses.create') }}" title="Create a campus"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>school</th>

        </tr>
        @foreach ($campuses as $campus)
            <tr>
                <td>{{ $campus->id }}</td>
                <td>{{ $campus->name }}</td>
                <td>{{ $campus->email }}</td>
                <td> {{ $campus->phone }} </td>
                <td> {{ $campus->address }} </td>
                <td> {{ $campus->school->id }}. {{ $campus->school->name }} </td>

            </tr>
        @endforeach
    </table>

    {!! $campuses->links() !!}

@endsection
