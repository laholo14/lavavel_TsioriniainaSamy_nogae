@extends('layouts.principal')


@section('lien_css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('navbar')

@endsection

@section('contenu')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center login">
                <div class="login_contenu mt-md-5 mt-lg-5 mt-xl-5">
                    <h3 class="text-center mt-5">Bienvenue</h3>

                    <div class="form mt-4">
                        <form action="{{ route('login_user') }}" method="POST"
                            class="d-flex flex-column align-items-center">
                            @csrf
                            <div class="login_input">
                                <div class="d-flex"><i class="fas fa-user mr-2 mt-2"></i><input type="text"
                                        placeholder="e-mail" name="login" required></div>
                                <div class="d-flex mt-3 mb-3"><i class="fas fa-key mr-2 mt-2"></i><input type="password"
                                        placeholder="Mot de passe" name="password" id="password" required></div>
                                <label for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    Afficher le mot de passe
                                </label>
                            </div>

                            <div class="login_button d-flex mt-4">
                                <div class="col-6 login_button_seconnecter">
                                    <input type="submit" value="Se connecter" class="btn btn-primary" name="connect" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('lien_js')
<script src="{{ asset('js/login.js') }}"></script>
@endsection
