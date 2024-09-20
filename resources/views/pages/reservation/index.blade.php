@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card mb-3">
          <div class="card-body">
                <h4 class="card-title text-center">Creer une nouvelle Reservation</h4>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-sample" action="{{route('reservations.store')}}" method="POST">
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
                                  @error('salle_id')
                                    <div class="text-danger"> {{$message}}</div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="reservation_date" class="col-sm-3 col-form-label">Date de reservation</label>
                                <div class="col-sm-9">
                                  <input type="date" name="reservation_date" id="reservation_date" value="{{ old('reservation_date') }}" class="form-control" placeholder="dd/mm/yyyy">
                                  @error('reservation_date')
                                      <div class="text-danger"> {{$message}}</div>
                                  @enderror
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="start_time_reservation" class="col-sm-3 col-form-label">Heure de debut</label>
                                <div class="col-sm-9">
                                    <input type="time" name="start_time_reservation" id="start_time_reservation" value="{{ old('start_time_reservation') }}" class="form-control">
                                    @error('start_time_reservation')
                                      <div class="text-danger"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="end_time_reservation" class="col-sm-3 col-form-label">Heure de Fin</label>
                                <div class="col-sm-9">
                                    <input type="time" name="end_time_reservation" id="end_time_reservation" value="{{ old('end_time_reservation') }}" class="form-control">
                                    @error('end_time_reservation')
                                      <div class="text-danger"> {{$message}}</div>
                                    @enderror
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
                      <th>#</th>
                      <th>Nom de la salle</th>
                      <th>Date de reservation</th>
                      <th>Heure de debut</th>
                      <th>Heure de fin</th>
                      <th>Statut</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->salle->name }}</td>
                            <td>{{ $reservation->reservation_date }}</td>
                            <td>{{ $reservation->start_time_reservation }}</td>
                            <td>{{ $reservation->end_time_reservation }}</td>
                            <td><label class="badge badge-info">{{ $reservation->status }}</td>
                            <td>
                                <a href="{{ route('reservations.edit', $reservation->id) }}"><i class="mdi mdi-pencil" style="font-size: 1.5em; color: rgb(0, 13, 255);"></i></a>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">
                                        <i class="mdi mdi-delete" style="font-size: 1.5em; color: red;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucune reservation de salle de reunion</td>
                        </tr>
                     @endforelse
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $reservations->links() }}
                </div>
              </div>
        </div>
    </div>

</div>
@endsection
