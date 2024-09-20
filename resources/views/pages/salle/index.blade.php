@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card mb-3">
          <div class="card-body">
            <h4 class="card-title text-center">Creer une Salle</h4>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form class="form-sample" action="{{ route('salles.store') }}" method="POST">
              @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nom de la salle</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" id="name" class="form-control">
                              @error('name')
                                <div class="text-danger"> {{$message}}</div>
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label for="place" class="col-sm-3 col-form-label">Nombre de places</label>
                        <div class="col-sm-9">
                            <input type="text"  name="place" id="place" class="form-control">
                            @error('place')
                                <div class="text-danger"> {{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    </div>
                </div>
                <div class=" flex justify-end ">
                    <button type="submit" class="btn btn-primary self-end">Valider</button>
                </div>
            </form>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Liste de salles</h4>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nom</th>
                      <th>Place</th>
                      <th>Disponibilité</th>
                      <th>Date de creation</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($salles as $salle)
                        <tr>
                            <td>{{ $salle->id }}</td>
                            <td>{{ $salle->name }}</td>
                            <td>{{ $salle->place }}</td>
                            <td><label class="badge badge-info">{{ $salle->availability ? 'Disponible' : 'Indisponible' }}</td>
                            <td>{{ $salle->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucune salle disponible.</td>
                        </tr>
                     @endforelse
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $salles->links() }}
                </div>
              </div>
        </div>
    </div>

</div>
@endsection


