@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">DigitalWorker - Catégories </h2>
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
                    <h5 class="text-muted">Modifiez les infos de la categorie</h5>

                    <form method="post" action="{{ route('admin.domaines.update', $categorie->id) }}">
                        @csrf
                        <label for="name">Nom de la categorie</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $categorie->name }}" required="">
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="slug">Slug</label>
                        <input type="text" name="slug" value="{{ $categorie->slug }}" required="" class="form-control" id="slug">
                        <button class="btn btn-primary mt-2">Modifier la categorie</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
