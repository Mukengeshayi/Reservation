@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Liste de reservations</h4>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Date de reservation</th>
                      <th>Demandeur</th>
                      <th>Nom de la salle</th>
                      <th>Heure de debut</th>
                      <th>Heure de fin</th>
                      <th>Statut</th>
                      <th>Changer Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->reservation_date }}</td>
                            <td>{{ $reservation->user->firstname }} {{ $reservation->user->name }}</td>
                            <td>{{ $reservation->salle->name }}</td>
                            <td>{{ $reservation->start_time_reservation }}</td>
                            <td>{{ $reservation->end_time_reservation }}</td>
                            <td><label class="badge badge-info">{{ $reservation->status }}</td>
                            <td>
                                <form method="POST" action="{{ route('adminreservations.updateStatus', $reservation->id) }}">
                                    @csrf
                                    @method('PATCH')

                                    <select name="status" onchange="this.form.submit()">
                                        <option value="en attente" {{ $reservation->status === 'en attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="Accepté" {{ $reservation->status === 'Accepté' ? 'selected' : '' }}>Accepté</option>
                                        <option value="Rejeté" {{ $reservation->status === 'Rejeté' ? 'selected' : '' }}>Rejeté</option>
                                    </select>
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
