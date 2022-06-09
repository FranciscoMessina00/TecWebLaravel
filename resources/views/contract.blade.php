@extends('layouts.public')
<?php
$name = $accomodation->name;
$tipology = $accomodation->tipology == 0 ? 'appartamento' : 'posto letto';
$dateAssign = $accomodation->dateAssign();
$timeAssign = $accomodation->timeAssign();
$dateStart = $accomodation->dateStart();
$dateFinish = $accomodation->dateFinish();
$price = $accomodation->price;

$studentName = $student->name;
$studentSurname = $student->surname;
$studentGender = $student->gender == 'uomo' ? 'Maschio' : ($locator->gender == 'donna' ? 'Femmina' : 'Altro');
$studentArticle = $student->gender == 'uomo' ? 'al' : ($student->gender == 'donna' ? 'alla' : 'all*');
$studentTitle = $student->gender == 'uomo' ? 'signor' : ($student->gender == 'donna' ? 'signora' : 'signor*');

$locatorName = $locator->name;
$locatorSurname = $locator->surname;
$locatorGender = $locator->gender == 'uomo' ? 'Maschio' : ($locator->gender == 'donna' ? 'Femmina' : 'Altro');
$locatorArticle = $locator->gender == 'uomo' ? 'del' : ($locator->gender == 'donna' ? 'della' : 'dell*');
$locatorTitle = $locator->gender == 'uomo' ? 'signor' : ($locator->gender == 'donna' ? 'signora' : 'signor*');

$text = "L'alloggio " . $name . ", tipologia " . $tipology . ", di proprietà " . $locatorArticle . " " . $locatorTitle . " " . $locatorSurname . " " . $locatorName . ", viene assegnato " . " " . $studentArticle . " " . $studentTitle . " " . $studentSurname . " " . $studentName . ", in data " . $dateAssign . " alle ore " . $timeAssign . " per il periodo che va da " . $dateStart . " a " . $dateFinish . "."
        . "\n\nIl canone d'affitto concordato è di " . $price . "€ mensili, da pagare entro, e non oltre, il primo di ogni mese. Pena revoca del contratto.";

$accomodationDetails = "\nDettagli alloggio\n"
        . "Nome: ".$name."\n"
        . "Tipologia: ".$tipology."\n"
        . "Città: ".$accomodation->city."\n"
        . "Indirizzo: ".$accomodation->address."\n";

$studentDetails = "\nDettagli locatario\n"
        . "Nome: ".$studentName."\n"
        . "Cognome: ".$studentSurname."\n"
        . "Email: ".$student->email."\n"
        . "Data di nascita: ".$student->bornDate()."\n"
        . "Età: ".$student->age()."\n"
        . "Genere: ".$studentGender."\n";

$locatorDetails = "\nDettagli locatore\n"
        . "Nome: ".$locatorName."\n"
        . "Cognome: ".$locatorSurname."\n"
        . "Email: ".$locator->email."\n"
        . "Data di nascita: ".$locator->bornDate()."\n"
        . "Età: ".$locator->age()."\n"
        . "Genere: ".$locatorGender."\n";

$mailTo = "mailto:".$student->email;

?>


@section('title', 'Contratto')

@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('Js/createEmailText.js') }}"></script>

@endsection


@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">
    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">Contratto di locazione - {{$accomodation->name}}</h1>
        <div class="offerta text-center">
            <h1>Contratto</h1>
            <p id="contractText">{{$text}}
            </p>
        </div>
        <div class="offerta contenitore-flex">
            <div>
                <h1>Dettagli alloggio</h1>
                <ul>
                    <li>Nome: {{$accomodation->name}}</li>
                    <li>Tipologia: {{$accomodation->tipology == 0 ? "Appartamento" : 'Posto letto'}}</li>
                    <li>Città: {{$accomodation->city}}</li>
                    <li>Indirizzo: {{$accomodation->address}}</li>
                </ul>
                <p class="nascondi" id="accomodationDetails">{{$accomodationDetails}}</p>
            </div>
            <div>
                <h1>Dettagli locatario</h1>
                <ul>
                    <li>Nome: {{$student->name}}</li>
                    <li>Cognome: {{$student->surname}}</li>
                    <li>Email: {{$student->email}}</li>
                    <li>Data di nascita: {{$student->bornDate()}}</li>
                    <li>Età: {{$student->age()}}</li>
                    <li>Genere: {{$studentGender}}</li>
                </ul>
                <p class="nascondi" id="studentDetails">{{$studentDetails}}</p>
            </div>
            <div>
                <h1>Dettagli locatore</h1>
                <ul>
                    <li>Nome: {{$locator->name}}</li>
                    <li>Cognome: {{$locator->surname}}</li>
                    <li>Email: {{$locator->email}}</li>
                    <li>Data di nascita: {{$locator->bornDate()}}</li>
                    <li>Età: {{$locator->age()}}</li>
                    <li>Genere: {{$locatorGender}}</li>
                </ul>
                <p class="nascondi" id="locatorDetails">{{$locatorDetails}}</p>
            </div>
        </div>

        <div class="offerta contenitore-flex">
            <div class='margin-t-mid'>
                <div class="contenitore-flex justify-content-end">
                    <a href="" class="tm-btn tm-btn-brown text-white nav-link margin-b-15">Stampa</a>
                </div>
            </div>
            <div class='margin-t-mid'>
                <div class="contenitore-flex justify-content-end">
                    <a href="{{$mailTo}}" class="tm-btn text-white nav-link margin-b-15" id="mailto">Inoltra per email</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection