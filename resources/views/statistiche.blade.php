@extends('layouts.adminpublic')

@section('title', 'Homepage')

@section('content')
        <div class="margin-t-x-large margin-b-40 text-center">
            <div class="container-big auto-margin-lr pad-lr-large ">
                <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Statistiche generali</h2>
                <div class="text-center margin-t-small-neg container-mid auto-margin-lr">
                    <form class="contenitore-flex">
                        <div class="pad-lr-small border-r">
                            <h2>Quando</h2>
                            <div class="contenitore-flex">
                                <input type="date" id="min" class="form-element">
                                <h2 class="auto-margin-tb">-</h2>
                                <input type="date" id="max" class="form-element">
                            </div>
                        </div>
                        <div class="pad-lr-small border-r">

                            <h2>
                                Tipologia
                            </h2>
                            <select id="tipo" name="tipo" class="form-element">
                                <option value="none" selected>Entrambi</option>
                                <option value="appartamento">Appartamento</option>
                                <option value="postoLetto">Posto letto</option>
                            </select>
                        </div>
                        <br>
                        <div class="margin-t-small text-center auto-margin-tb">
                            <input class="tm-btn" type="submit" value="Filtra">
                        </div>
                    </form>
                    <div>
                        <table border class="text-center margin-t-small auto-margin-lr">
                        <tr><th>Tipologia</th><th>Totale offerte</th><th>Offerte opzionate</th><th>Alloggi locati</th></tr>
                        <tr><td>Appartamento</td><td>12</td><td>23</td><td>4</td></tr>
                        <tr><td>Posto letto</td><td>42</td><td>27</td><td>12</td></tr>
                        <tr class="border-t-2"><td>Totale</td><td>234</td><td>43</td><td>54</td></tr>
                    </table>
                    </div>
                </div>
            </div>
@endsection
     