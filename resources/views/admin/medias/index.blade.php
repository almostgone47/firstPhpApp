@extends('layouts.admin')

@section('content')

<h1>Media</h1>

<div class="col-sm-6">
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>photo</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
    @if($photos)
      @foreach($photos as $photo)
      <tr>
        <td>{{ $photo->id }}</td>
        <td><img src="/images/{{ $photo->file }}" height="200px" ></td>
        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : "NA" }}</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id] ]) !!}

            <div class="form-group">
              {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger'])!!}
            </div>

          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
</div>

@stop