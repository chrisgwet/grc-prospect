@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">E-commerce - Catégories - Corbeille </h2>
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
                    <h5 class="text-muted">Liste des categories</h5>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories->count() === 0)
                                <p><strong class="text-warning">Il n'ya rien dans la corbeille!</strong></p>
                            @endif
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td><img src="{{ asset('uploads/domaines/'.$categorie->image) }}" alt="" height="75" width="75"></td>
                                    <td>{{ $categorie->name }}</td>
                                    <td>{{ $categorie->slug }}</td>
                                    <td><a href="{{ route('admin.domaines.restore', $categorie->id) }}" class="text-primary">Restaurer</a>
                                    <a href="{{ route('admin.domaines.deleteforce', $categorie->id) }}" class="text-danger ml-3">Supprimer</a></td>
                                </tr>


                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
