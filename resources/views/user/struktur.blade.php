@extends('layouts.user.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="card bg-light my-3" style="border-radius: 25px">
            @foreach ($data as $item)
                <h1 class="text-center">{{ $item->title }}</h1>
                <img src="{{ asset('assets/img/profile/' . $item->content) }}" alt="" srcset="">
            @endforeach
        </div>
    </div>
@endsection
