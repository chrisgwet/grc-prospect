@extends('admin.base')

@section('admin-content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Ipofiz - Utilisateurs </h2>
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
                    <h5 class="text-muted">Modifiez les infos de l'utilisateur</h5>

                    <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Nom et Prenom</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}" required="">
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="email">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" required="" class="form-control" id="email">
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="telephone">Email</label>
                        <input type="text" name="telephone" value="{{ $user->telephone }}" required="" class="form-control" id="telephone">
                        <div class="invalid-feedback">
                            @error('telephone') {{ $message }} @enderror
                        </div>

                        <label class="col-form-label" for="password">Mot de passe</label>
                        <input type="password" name="password" required="" class="form-control" id="password">

                        <label class="col-form-label" for="confirm_password">Confirmer le Mot de passe</label>
                        <input type="password" name="confirm_password" required="" class="form-control" id="confirm_password">

                        <label class="col-form-label" for="property">Photo</label>
                        <input type="file" id="property-avatar" name="avatar" accept="image/*" class="form-control p-0 border-0 @error('avatar') is-invalid @enderror">

                        <button class="btn btn-primary mt-2">Modifier l'utilisateur</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
