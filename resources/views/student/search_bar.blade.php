     
<!--        Fine zona filtri-->
<div class="text-center margin-t-small-neg container-mid auto-margin-lr">
    
        {{ Form::open(array('route' => 'catalogo.filter'),['class' => 'contenitore-flex']) }}
          @csrf
                <div class="pad-lr-small border-r">
                    <h2>Dove</h2>
                    {{ Form::text('city', '' , ['class' => 'form-element','id' => 'where','placeholder' => 'Inserisci città']) }}
                    
                </div>
                <div class="pad-lr-small border-r">
                    <h2>Quando</h2>
                    
                    <div class="contenitore-flex">
                        {{ Form::date('dateStart',['class' => 'form-element'])}}
                       
                        
                        <h2 class="auto-margin-tb">-</h2>
                        {{ Form::date('dateFinish',['class' => 'form-element'])}}
                       
                        
                    </div>
                </div>
                <div class="pad-lr-small border-r">
                    <h2>
                        Tipologia
                    </h2>
                 {{ Form::select('tipology', ['0' => 'Appartamento', '1' => 'Posto letto'], ['class' => 'form-element'])}}
                
                    
                 <!-- <h2>
                        Tipologia
                    </h2>
                    <select id="tipo" name="tipo" class="form-element">
                        <option value="none" disabled selected>Tipologia</option>
                        <option value="appartamento">Appartamento</option>
                        <option value="postoLetto">Posto letto</option>
                    </select> -->
                                           
                </div>
                
                <br>
                
                <div class="margin-t-small text-center auto-margin-tb">
                {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}
                
               
                    
                           
                </div>
            </form>
        </div>