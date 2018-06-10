@extends('layouts.app')


@section('content')
    <h1>Add Word</h1>

    <form action="{{route('word.store')}}" method="POST">
        <div class="form-group">
        <label for="key">Word</label>
        <input type="text" name="key" id="key" class="form-control" placeholder="Word"> 
        </div>
        <button type="submit" class="btn btn-secondary">Save</button>
    </form>
@endsection