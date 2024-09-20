@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card mb-3">
          <div class="card-body">
                <h4 class="card-title text-center">Creer un employé</h4>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-sample" action="{{route('employés.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nom</label>
                                <div class="col-sm-9">
                                  <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Entrez le prenom">
                                  @error('name')
                                      <div class="text-danger"> {{$message}}</div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="firstname" class="col-sm-3 col-form-label">Prenom</label>
                                <div class="col-sm-9">
                                  <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}" placeholder="Entrez le prenom">
                                  @error('firstname')
                                      <div class="text-danger"> {{$message}}</div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="role" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                  <select name="role" id="role"  class="form-control">
                                    <option value="">-- Sélectionnez un role --</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administeur</option>
                                        <option value="demandeur" {{ old('role') == 'demandeur' ? 'selected' : '' }}>demandeur</option>
                                  </select>
                                  @error('role')
                                    <div class="text-danger"> {{$message}}</div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"  class="form-control">
                                    @error('email')
                                      <div class="text-danger"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" id="password"  value="{{ old('password') }}" class="form-control">
                                    @error('password')
                                      <div class="text-danger"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <button type="submit" class="btn btn-primary self-end">Enregister</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Listes des employés</h4>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nom </th>
                      <th>Premom</th>
                      <th>email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($employes as $employe)
                        <tr>
                            <td>{{ $employe->id }}</td>
                            <td>{{ $employe->name }}</td>
                            <td>{{ $employe->firstname }}</td>
                            <td>{{ $employe->email }}</td>
                            <td>{{ $employe->role }}</td>
                            <td>
                                <a href="#"><i class="mdi mdi-pencil" style="font-size: 1.5em; color: rgb(0, 13, 255);"></i></a>
                                <form action="#" method="POST" style="display:inline;">
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
                    {{ $employes->links() }}
                </div>
              </div>
        </div>
    </div>

</div>
@endsection
