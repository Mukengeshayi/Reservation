@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card mb-3">
          <div class="card-body">
                <h4 class="card-title text-center">Creer une nouvelle Reservation</h4>
                <form class="form-sample" action="{{route('reservations.index')}}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="salle_id" class="col-sm-3 col-form-label">Le nom de la Salle</label>
                                <div class="col-sm-9">
                                  <select name="salle_id" id="salle_id"  class="form-control">
                                    <option value="">-- Sélectionnez une salle --</option>
                                    @foreach($salles as $salle)
                                            <option value="{{ $salle->id }}">{{ $salle->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date de reservation</label>
                                <div class="col-sm-9">
                                  <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Heure de debut</label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Heure de Fin</label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" flex justify-end ">
                        <button type="submit" class="btn btn-primary self-end">Envoyez la demande</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Mes reservations</h4>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        Nom de la salle
                      </th>
                      <th>
                        Date de reservation
                      </th>
                      <th>
                        Heure de debut
                      </th>
                      <th>
                        Heure de fin
                      </th>
                      <th>
                        Statut
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="py-1">1</td>
                      <td>Bc banque</td>
                      <td> 45</td>
                      <td>OUI</td>
                      <td>Apr 12, 2015 </td>
                      <td> En attente</td>
                    </tr>
                    <tr>
                        <td class="py-1">2</td>
                        <td>Bc banque</td>
                        <td> 45</td>
                        <td>OUI</td>
                        <td>Apr 12, 2015 </td>
                        <td> En attente </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
    </div>

</div>
@endsection
