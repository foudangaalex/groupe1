@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Information sur la demande => {{$demande->id}}</h3>
    @if(session()->has('successful'))
    <div class="alert alert-success">
        <h3> {{session()->get('successful')}}</h3>

    </div>
    @endif

    <form  method="POST" action="{{ route('updateDemande') }}">
        @csrf
        <input type="hidden" class="form-control" id="demandeid" name="demandeid"  value="{{ $demande->id }}">
        <div class="form-group">
            <label for="objet">Objet</label>
            <input type="text" class="form-control" id="objet" name="objet" value="{{ $demande->objet }}" disabled>
        </div>
        <div class="form-group">
            <label for="description"> Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $demande->description }}" disabled>
        </div>
        <div class="form-group">
            <label for="lieux"> Lieux</label>
            <input type="text" class="form-control" id="lieux" name="lieux" value="{{ $demande->lieux }}" disabled>
        </div>
        <div class="form-group">
            <label for="role"> Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $demande->type }}" disabled>
              
        </div>
        <div class="form-group">
            <label for="date"> Date</label>
            <input type="text" class="form-control" id="date" name="date" value="{{ $demande->date }}" disabled>
        </div>
        <div class="form-group">
            <label for="userid"> user</label>
            <input type="text" class="form-control" id="userid" name="userid" value="{{ $demande->userId->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="etat"> Statut</label>
            <input type="text" class="form-control" id="etat" name="etat" value="{{ $demande->etat }}" disabled>
        </div>

        <div class="row ">
            <div class="col-6 edit_div">
                <button  class="btn btn-info  edit_demande">Edit demande</button>
            </div>
            <div class="col-6 save_div" style="display:none">
                <button type="submit" class="btn btn-info   save_demande" >Save User</button>
            </div>

            <div class="col-6">
                <button type="button" class="btn btn-secondary   cancel" onclick="window.location='{{ url()->previous() }}'">Cancel</button>
            </div>
        </div>
    </form>
</div>


<!-- Change user password Modal -->

@endsection
