@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">GRC - Prospect </h2>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

        </div>
    </div>

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Entrer les infos du prospect</h5>

                    <form method="post" action="{{ route('admin.prospects.store') }}">
                        @csrf

                        <label class="col-form-label">Selectionnez le domaine</label>
                        <div class="col-sm-12 mb-2">
                            <select name="domaine">
                                @foreach($domaines as $domaine)
                                    <option>{{ $domaine }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="nom">Nom du prospect</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom') }}" required>
                        <div class="invalid-feedback">
                            @error('nom') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="email">Telephone</label>
                        <input type="text" name="telephone" value="{{ old('telephone') }}" required class="form-control @error('telephone') is-invalid @enderror" id="telephone">
                        <div class="invalid-feedback">
                            @error('telephone') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="telephone">Addresse</label>
                        <input type="text" name="addresse" value="{{ old('addresse') }}" required="" class="form-control @error('addresse') is-invalid @enderror" id="addresse">
                        <div class="invalid-feedback">
                            @error('addresse') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="longitude">Longitude</label>
                        <input type="text" name="longitude" required="" class="form-control @error('longitude') is-invalid @enderror" id="longitude">
                        <div class="invalid-feedback">
                            @error('longitude') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="latitude">Latitude</label>
                        <input type="text" name="latitude" required="" class="form-control @error('latitude') is-invalid @enderror" id="latitude">
                        <div class="invalid-feedback">
                            @error('latitude') {{ $message }} @enderror
                        </div>

                        <button class="btn btn-primary mt-2">Valider</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
