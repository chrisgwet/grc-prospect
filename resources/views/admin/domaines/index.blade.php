@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">GRC - Domaines </h2>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

        </div>
    </div>

    <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Entrez les infos du domaine</h5>

                    <form method="post" action="{{ route('admin.domaines.store') }}">
                        @csrf
                        <label for="nom">Nom du domaine</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom') }}" required="">
                        <div class="invalid-feedback">
                            @error('nom') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="slug">Slug</label>
                        <input type="text" name="slug" required="" class="form-control" id="slug">

                        <button class="btn btn-primary mt-2">Creer le domaine</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Liste des categories</h5>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($domaines->count() === 0)
                                <p><strong class="text-warning">Il n'ya pas de domaines. Creer en une!</strong></p>
                            @endif
                            @foreach ($domaines as $domaine)
                                <tr>
                                    <td>{{ $domaine->id }}</td>
                                    <td><strong>{{ $domaine->nom }}</strong></td>
                                    <td>{{ $domaine->slug }}</td>
                                    <td><a href="{{ route('admin.domaines.destroy',$domaine->id) }}" class="text-danger">Supprimer</a></td>
                                </tr>


                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{ $domaines->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
