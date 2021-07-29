@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">GRC - Prospects </h2>
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
                    <h5 class="text-muted">Liste des prospects - <a
                            href="{{ route('admin.prospects.trash') }}">@if($prospectInTrash > 0)
                                Corbeille( {{ $prospectInTrash }} ) @else Corbeille( 0 ) @endif</a>
                    </h5>
                    <a href="{{ route('admin.prospects.create') }}" class="btn btn-sm btn-primary mb-4">Ajouter un prospect</a>
                    <form class="form-inline float-right" method="GET">
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label mr-2">Filtrer</label>
                            <input type="text" class="form-control" name="addresse" placeholder="Addresse..." value="{{ $addresse }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom" placeholder="Nom..." value="{{ $nom }}">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Filtrer</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Domaine</th>
                                <th>Telephone</th>
                                <th>Addresse</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data->count() === 0)
                                <p><strong class="text-warning">Il n'ya pas de prospects. Creer un
                                        prospect!</strong></p>
                            @endif
                            @foreach ($data as $prospect)
                                <tr>
                                    <td>{{ $prospect->id }}</td>
                                    <td><a href="{{ route('admin.prospects.edit',$prospect->id) }}"><strong
                                                class="text-primary">{{ $prospect->nom }}</strong></a></td>
                                    <td><strong>{{ $prospect->domain->nom }}</strong></td>
                                    <td>{{ $prospect->telephone }}</td>
                                    <td>{{ $prospect->addresse }}</td>
                                    <td><a href="{{ route('admin.prospects.destroy',$prospect->id) }}" class="text-danger">Supprimer</a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Domaine</th>
                                <th>Telephone</th>
                                <th>Addresse</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{ $data->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
