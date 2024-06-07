@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h3>{{ __(' Nouvelle Demande') }}</h3>
    @if(session()->has('successful'))
            <div class="alert alert-success">
                <h3> {{session()->get('successful')}}</h3>

            </div>


            @endif

    <form method="POST" action="{{ route('createDemande') }}">
        @csrf

        @if (Auth::user())
        <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id}}">
        @endif

        <div class="form-group">
            <label for="objet">{{ __('OBJET') }}</label>
            <input id="objet" type="text" class="form-control @error('objet') is-invalid @enderror" name="objet"
                value="{{ old('objet') }}" required >
            @error('objet')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description"> {{ __('Description') }}</label>
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                name="description" value="{{ old('description') }}" required >

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="lieux"> {{ __('Lieux') }}</label>
            <input id="lieux" type="text" class="form-control @error('lieux') is-invalid @enderror"
                name="lieux" value="{{ old('lieux') }}" required >

            @error('lieux')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="role"> {{ __('TYPE') }}</label>
            <select class="form-select form-select-sm" aria-label="type Filter" name="type" id="type" >
                <option value="0" selected>Select Type</option>
                <option value="Perte" >Perte</option>
                <option value="Objet retrouve" >Objet retrouve</option>
                <option value="autre" >Autre</option>

            </select>
        </div>
        <div class="form-group">
            <label for="date"> {{ __('DATE') }}</label>
            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                name="date" value="{{ old('date') }}" required >

            @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="demande_button">
            <button type="submit" class="btn btn-info position-relative"> {{ __('Create') }}</button>
            <button type="button" class="btn btn-secondary position-relative"
                onclick="window.location='{{ url()->previous() }}'">Cancel</button>
        </div>
    </form>
</div>
@endsection
