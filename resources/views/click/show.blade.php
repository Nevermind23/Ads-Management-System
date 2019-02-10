@extends('layout')

@section('content')
    <div class="wrapper">
        <table class="table" style="width: 100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Request ID</th>
                <th>Banner Name</th>
                <th>Click Cost</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $click->id }}</th>
                    <td>{{$click->request_id}}</td>
                    <td>{{$click->banner_name}}</td>
                    <td>{{$click->click_cost}} $</td>
                    <td>{{$click->created_at}}</td>
                    <td>{{$click->updated_at}}</td>
                    <td><a href="{{route('click.edit', $click->id)}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{route('click.delete', $click->id)}}" onclick="return confirm('You are deleting click #{{$click->id}}')"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection