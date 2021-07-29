@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Ipofiz - Administrateurs </h2>
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
                    <h5 class="text-muted">Liste des administrateurs - <a
                            href="{{ route('admin.users.trash') }}">@if($usersInTrash > 0)
                                Corbeille( {{ $usersInTrash }} ) @else Corbeille( 0 ) @endif</a>
                    </h5>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary mb-4">Ajouter un utilisateur</a>
                    <form class="form-inline float-right" method="GET">
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label mr-2">Filtrer</label>
                            <input type="text" class="form-control" name="reference" placeholder="Reference..." value="{{ $reference }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nom..." value="{{ $name }}">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Filtrer</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reference</th>
                                <th>Nom</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data->count() === 0)
                                <p><strong class="text-warning">Il n'ya pas d'utilisateurs. Creer un
                                        administrateur!</strong></p>
                            @endif
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->reference }}</td>
                                    <td><a href="{{ route('admin.users.edit',$user->id) }}"><strong
                                                class="text-primary">{{ $user->name }}</strong></a></td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><a href="{{ route('admin.users.destroy',$user->id) }}" class="text-danger">Supprimer</a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Reference</th>
                                <th>Nom</th>
                                <th>Telephone</th>
                                <th>Email</th>
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
