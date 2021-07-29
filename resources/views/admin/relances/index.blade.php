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
                    <h5 class="text-muted">Liste des relances
                    </h5>
                    <a href="{{ route('admin.relances.create') }}" class="btn btn-sm btn-primary mb-4">Ajouter une relance</a>
                    <form class="form-inline float-right" method="GET">
                        <div class="form-group mr-2">
                            <input type="date" class="form-control" name="dateRelance" placeholder="Date..." value="{{ $dateRelance }}">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Filtrer</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Prospect</th>
                                <th>Date de Relance</th>
                                <th>Effectuee</th>
                                <th>Auteur</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data->count() === 0)
                                <p><strong class="text-warning">Il n'ya pas de relances. Creer une !</strong></p>
                            @endif
                            @foreach ($data as $relance)
                                <tr>
                                    <td>{{ $relance->id }}</td>
                                    <td><a href="{{ route('admin.relances.edit',$relance->id) }}"><strong
                                                class="text-primary">{{ $relance->prospect->nom }}</strong></a></td>
                                    <td>{{ $relance->dateRelance }}</td>
                                    <td>
                                        @if($relance->effectuee)
                                            Oui
                                        @else
                                            Non
                                        @endif
                                    </td>
                                    <td>{{ $relance->user->name }}</td>
                                    <td><a href="{{ route('admin.relances.destroy',$relance->id) }}" class="text-danger">Supprimer</a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Prospect</th>
                                <th>Date de Relance</th>
                                <th>Effectuee</th>
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
