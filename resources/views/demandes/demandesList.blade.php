@extends('layouts.app')
@section('content')
<!-- Start infrastructure list -->
<div class="container-fluid">
    <div class="row justify-content-center-between">
        <div class="col-lg-2 col-12">

        </div>



        <div class="col-12 col-lg-12  justify-content-end mb-1">
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-header text-bg-info text-center"><b> Liste des Demandes</b></div>
                <table class="table table-sm small table-bordered table align-middle mb-0" id="dataTable">
                    <thead>
                        <tr class="table-secondary">
                            <th>ID</th>
                            <th>Objet</th>
                            <th>Description</th>
                            <th>Lieux</th>
                            <th>Type</th>
                            <th>date</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th>Reponse Demande</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($demandes as $demande)

                        <tr>
                            <td>{{$demande->id}}</td>
                            <td>{{$demande->objet}}</td>
                            <td>{{$demande->description}}</td>
                            <td>{{$demande->lieux}}</td>
                            <td>{{$demande->type}}</td>
                            <td>{{$demande->date}}</td>
                            <td>{{$demande->etat}}</td>

                            <td>
                                <div class="d-grid">
                                    <a  href="{{route('demande.show',['id'=>$demande->id])}}" class="btn btn-sm btn-warning"
                                        >Details</a>
                                </div>
                            </td>
                            <td>
                                <div class="d-grid">
                                    <a  href="{{route('demande.show',['id'=>$demande->id])}}" class="btn btn-sm btn-info reponse_demande" data-bs-toggle="modal" demandeid="{{$demande->id}}" data-bs-target="#reponse_demande_Modal"
                                        >Repondrre</a>
                                </div>
                            </td>

                            <td>

                                <button href="#" class="btn btn-sm btn-danger delete_demande" data-bs-toggle="modal" demandeid="{{$demande->id}}" data-bs-target="#delete_demande_Modal">Delete</button>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End infrastructure list -->

<!-- Delete layer Modal -->
<div class="modal fade" id="delete_demande_Modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true" style="backdrop-filter: blur(5px);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header navbar">
                <h5 class="modal-title text-white"> Delete Demande</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"  aria-label="Close"></button>
            </div>

            <div class="modal-body ">
                <form method="post" action="{{route('delete.demande')}}">
                    @csrf
                    <input type="hidden" id="demandeid" name="demandeid" >
                    <div class="container-fluid">
                        <div class="row gx-3">
                            <h5 class="modal-title">Voulez vous vraiment supprimer cette demende ?</h5>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-sm btn-danger">Confirm</button>
                                <a href="{{route('demandes')}}" class="btn btn-sm btn-warning" >Nope, Go back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete layer Modal -->


<!-- Reponse layer Modal -->
<div class="modal fade" id="reponse_demande_Modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true" style="backdrop-filter: blur(5px);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header navbar">
                <h5 class="modal-title text-white"> Repondre au client</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"  aria-label="Close"></button>
            </div>

            <div class="modal-body ">
                <form method="post" action="{{route('delete.demande')}}">
                    @csrf
                    <input type="hidden" id="demandeid" name="demandeid" >
                    <div class="container-fluid">
                        <div class="row gx-3">
                            <div class="form-group">
                                <label for="description"> {{ __('Description') }}</label>
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description" value="{{ old('description') }}" required >


                            </div>
                            <div class="form-group">
                                <label for="lieux"> {{ __('Resulta') }}</label>
                                <select class="form-select form-select-sm" aria-label="type Filter" name="type" id="type" >
                                    <option value="0" selected>Select Resuttat</option>
                                    <option value="Retrouve" >Retrouve</option>
                                    <option value="Non Retroute" >Non Retroute</option>
                                    <option value="En Cours" >En Cours</option>

                                </select>


                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-sm btn-info">Enregistrer</button>
                                <a href="{{route('demandes')}}" class="btn btn-sm btn-warning" >Nope, Go back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Reponse layer Modal -->


@endsection
