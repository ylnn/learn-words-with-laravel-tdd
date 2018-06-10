@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Add Word</div>
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <form action="{{route('word.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="word">Word</label>
                            <input type="text" name="word" id="word"  autofocus class="form-control" />  
                        </div>
                        <div class="form-group">
                            <label for="mean">Mean</label>
                            <input type="text" name="mean" id="mean" class="form-control" /> 
                        </div>
                        <button type="submit" class="btn btn-secondary">Save</button>
                        <a href="{{route('home')}}" class="btn btn-warning">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection