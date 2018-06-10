@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">All Words</div>
                <div class="card-body">
                    <div>
                        <a href="{{route('word.create')}}" class="btn btn-info">Add New</a>
                    </div>
                </div>
                </div>
            </div>
@endsection
