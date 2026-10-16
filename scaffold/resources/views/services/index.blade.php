@extends('layouts.app')

@section('title','Services - ITSEBA')

@section('content')
  <h1>Services</h1>
  <div class="row">
    @foreach($services as $service)
      <div class="col-md-4 mb-4">
        <div class="card">
          @if($service->image)
            <img src="{{ asset('storage/'.$service->image) }}" class="card-img-top" alt="{{ $service->title }}">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $service->title }}</h5>
            <p class="card-text">{{ Str::limit($service->excerpt, 120) }}</p>
            <a href="{{ route('services.show', $service) }}" class="btn btn-primary">Read more</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
