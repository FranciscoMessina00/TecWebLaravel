@extends('layouts.public')

@section('title', 'Account')

@section('content')

<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-mid auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Informazioni personali</h2>
        <div class="contenitore-flex"> 
            <form name="dati" method="post" action= "{{route('account.update.store')}}">
                @csrf
                <div class="">
                    <!-- inizio mail-->
                    <div class="width-small margin-b-30">
                        <div class="text-left">
                            <label for="nome" style="font-size: x-large;">
                                Nome
                            </label>
                        </div>
                        <div class="">
                            <input class="form-element" id="nome" type="text" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="width-small margin-b-30">
                        <div class="text-left">
                            <label for="cognome" style="font-size: x-large;">
                                Cognome
                            </label>
                        </div>
                        <div class="">
                            <input class="form-element" id="cognome" type="text" name="surname" value="{{ Auth::user()->surname}}">
                        </div>
                    </div>
                    <div class="width-small margin-b-30">
                        <div class="text-left">
                            <label for="username" style="font-size: x-large;">
                                Username
                            </label>
                        </div>
                        <div class="">
                            <input class="form-element" id="username" type="text" name="username" value="{{ Auth::user()->username}}">
                        </div>
                    </div>
                    <div class="width-small margin-b-30">
                        <div class="text-left">
                            <label for="mail" style="font-size: x-large;">
                                E-mail
                            </label>
                        </div>
                        <div class="">
                            <input class="form-element" id="mail" type="text" name="email" value="{{ Auth::user()->email}}">
                        </div>
                    </div>
                    <div class="width-small">
                        <div class="text-left">
                            <label for="gender" style="font-size: x-large;">
                                Gender
                            </label>
                        </div>
                        <div class="margin-b-30">
                            <select id="gender" name="gender" class="form-element">
                                <option value="donna">Donna</option>
                                <option value="uomo" selected>Uomo</option>
                                <option value="altro">Altro</option>
                            </select>
                        </div>
                    </div>
                    <div class="width-small margin-b-30">
                        <div class="text-left">
                            <label for="data" style="font-size: x-large;">
                                Data di nascita
                            </label>
                        </div>
                        <div class="">
                            <input class="form-element" id="data" type="date" name="bornDate" value="{{ Auth::user()->bornDate}}">
                        </div>
                    </div>
                    <!-- fine mail-->
                    <!-- inizio pass-->
                    <div class="width-small margin-b-30">
                        <div class="text-left">
                            <label for="pass" style="font-size: x-large;">
                                Password
                            </label>
                        </div>
                        <div class="">
                            <input class="form-element" id="pass" type="password" name="password" value="{{ Auth::user()->password}}">
                        </div>
                    </div>
                </div>
                <!-- fine pass-->
                <!-- invia dati -->
                <div class="margin-t-small text-center margin-b-15">
                    <input class="tm-btn" type="submit" value="MODIFICA DATI">
                </div>
            </form>
            <div class="text-center">
                <form name="img-profilo" action="" enctype="multipart/form-data">
                    <label for="immagine">Cambia immagine profilo</label>
                    <input class="form-element" type="file" id="immagine" name="immagine"><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
