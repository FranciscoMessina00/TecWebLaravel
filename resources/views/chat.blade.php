@extends('layouts.public')

@section('title', 'Chat')

@section('content')

 <div class="margin-t-x-large margin-b-40 contenitore-flex-2">

            <div class="margin-lr barra-filtri pad-lr-small">
                <h1 class="text-center text-gold ">Messaggi</h1>
                <!--                Inizio blocco solo studente-->
                <div class="flex justify-center margin-b-15 ">
                    <a class="tm-btn text-black" href="nuovomess.html">Nuovo messaggio</a>
                </div>
                <!--                Fine blocco solo studente-->
                <div class="overflow box">
                    <div class="pad-lr-small sfondo-grigio pad-tb-small pad-lr-small bord-rad-mid margin-b-15">
                        <h3>Mario Rossi</h3>
                    </div>
                    <div class="pad-lr-small sfondo-grigio pad-tb-small pad-lr-small bord-rad-mid margin-b-15">
                        <h3>Luigi Gialli</h3>
                    </div>
                </div>
            </div>

            <div class="container-big margin-lr pad-lr-mid">
                <div>
                    <div id="chat">
                        <h1 class="text-left text-gold">Mario Rossi - 24 anni</h1>
                        <div class="overflow box bord-rad-lg">
                            <div>
                                <div class="flex justify-left">
                                    <div class="messaggio pad-lr-mid sfondo-grigio pad-tb-small pad-lr-small bord-rad-mid margin-b-15 ">
                                        <h3>Mario Rossi - 9:20</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in fringillm lacinia, ac varius tortor gravida. Vivamus vel urna in magna fermentum gravida. Nulla vitae velit porta, facilisis erat non, tincidunt nisl. Aliquam sagittis eu urna vitae molestie. Etiam at dui laoreet, rutrum diam vel, facilisis mauris. Morbi eu elementum est. Nunc libero lectus, pulvinar vel posuere in, dapibus ac urna.</p>
                                    </div>
                                </div>
                                <div class="flex justify-right">
                                    <div class="messaggio pad-lr-mid sfondo-grigio pad-tb-small pad-lr-small bord-rad-mid margin-b-15 ">
                                        <h3>Giuseppe Verdi - 10:25</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in frquis ultricies purus. Etiam tristique augue id lorem lacinia, ac varius tortor gravida. Vivamus vel urna in magna fermentum gravida. Nulla vitae velit porta, facilisis erat non, tincidunt nisl. Aliquam sagittis eu urna vitae molestie. Etiam at dui laoreet, rutrum diam vel, facilisis mauris. Morbi eu elementum est. Nunc libero lectus, pulvinar vel posuere in, dapibus ac urna.</p>

                                    </div>
                                </div>
                                <div class="flex justify-left">
                                    <div class="messaggio pad-lr-mid sfondo-grigio pad-tb-small pad-lr-small bord-rad-mid margin-b-15 ">
                                        <h3>Mario Rossi - 9:20</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in fringilla neque, quis ultricies purus. Etiam tristique augue id lorem lacinia, ac varius tortor gravida. Vivamus vel urna in magna fermentum gravida. Nulla vitae velit porta, facilisis erat non, tincidunt nisl. Aliquam sagittis eu urna vitae molestie. Etiam at dui laoreet, rutrum diam vel, facilisis mauris. Morbi eu elementum est. Nunc libero lectus, pulvinar vel posuere in, dapibus ac urna.</p>
                                    </div>
                                </div>
                                <div class="flex justify-right">
                                    <div class="messaggio pad-lr-mid sfondo-grigio pad-tb-small pad-lr-small bord-rad-mid margin-b-15 ">
                                        <h3>Giuseppe Verdi - 10:25</h3>
                                        <p>Lorem ipsum dolor sit amet, cosis erat non, tincidunt nisl. Aliquam sagittis mauris. Morbi eu elementum est. Nunc libero lectus, pulvinar vel posuere in, dapibus ac urna.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="contenitore-flex-2 margin-t-x-small">
                            <input type="text" id="messaggio" class="form-element sfondo-grigio" placeholder="Scrivi messaggio...">
                            <input type="submit" value="Invia" class="tm-btn margin-lr bord-rad-mid">
                        </form>
                    </div>
                    <div id="new_messaggio">
                        <h1 class="text-left text-gold">Nuovo messaggio</h1>
                        <form name="accedi" method="get" class="">
                            <div>
                                <div class="text-left">
                                    <label for="destinatario" style="font-size: x-large;">
                                        Destinatario
                                    </label>
                                </div>
                                <div class="margin-b-40">
                                    <input class="form-element" id="destinatario" type="text" name="destinatario" placeholder="Inserisci destinatario">
                                </div>
                            </div>
                            <div>
                                <div class="text-left">
                                    <label for="message" style="font-size: x-large;">
                                        Messaggio
                                    </label>
                                </div>
                                <div class="margin-b-40">
                                    <textarea class="form-element" cols="90" rows="10" id="message" name="answer" placeholder="Scrivi messaggio..."></textarea>
                                </div>
                            </div>
                            <div class="margin-t-small text-center">
                                <input class="tm-btn margin-lr bord-rad-mid" type="submit" value="Invia">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
