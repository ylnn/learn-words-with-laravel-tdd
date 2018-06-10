@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">All Words</div>
                <div class="card-body">
                    
                    <div class="pt-3 pb-3">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{route('home')}}" method="GET">
                                    <input type="text" class="form-control" name="filter" placeholder="Filter...">
                                </form>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="{{route('word.create')}}" class="btn btn-info">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Word</th>
                                    <th>Mean</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($words as $word)
                                    <tr>
                                        <td>{{$word->word}}</td>
                                        <td>{{$word->mean}}</td>
                                        <td class="d-flex justify-content-end"><a href="{{route('word.delete', ['id' => $word->id])}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">
                                           No words.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
@endsection
