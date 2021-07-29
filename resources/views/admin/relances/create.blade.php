@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">GRC - Relances </h2>
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
                    <h5 class="text-muted">Entrer les infos de la relance</h5>

                    <form method="post" action="{{ route('admin.relances.store') }}">
                        @csrf

                        <label class="col-form-label">Selectionnez le prospect</label>
                        <div class="col-sm-12 mb-2">
                            <select name="prospect">
                                @foreach($prospects as $prospect)
                                    <option>{{ $prospect }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="dateRelance">Date de la relance</label>
                        <input type="date" name="dateRelance" class="form-control @error('dateRelance') is-invalid @enderror" id="dateRelance" value="{{ old('dateRelance') }}" required>
                        <div class="invalid-feedback">
                            @error('dateRelance') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="effectuee">Deja effectuee?</label>
                        <input type="checkbox" name="effectuee" value="{{ old('effectuee') }}" class="form-control col-md-1 @error('effectuee') is-invalid @enderror" id="effectuee">
                        <div class="invalid-feedback">
                            @error('effectuee') {{ $message }} @enderror
                        </div>

                        <button class="btn btn-primary mt-2">Valider</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
