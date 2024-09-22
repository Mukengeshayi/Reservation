@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card mb-3">
          <div class="card-body">
                <h4 class="card-title text-center">Modifier un employé</h4>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-sample" action="{{route('employés.update', $employé->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nom</label>
                                <div class="col-sm-9">
                                  <input type="text" name="name" id="name" class="form-control" value="{{$employé->name}}" placeholder="Entrez le prenom">
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
                                  <input type="text" name="firstname" id="firstname" class="form-control" value="{{$employé->firstname}}" placeholder="Entrez le prenom">
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
                                    <input type="email" name="email" id="email" value="{{ $employé->email}}"  class="form-control">
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
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                      <div class="text-danger"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <button type="submit" class="btn btn-primary self-end">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
