@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">All Words</div>
                <div class="card-body">
                    <div>
                        <a href="{{route('word.create')}}" class="btn btn-info">Add New</a>
                    </div>
                    <div class="pt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Word</th>
                                    <th>Mean</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($words as $word)
                                    <tr>
                                        <td>{{$word->word}}</td>
                                        <td>{{$word->mean}}</td>
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
