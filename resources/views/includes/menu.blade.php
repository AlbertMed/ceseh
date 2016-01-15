<div class="row">
    <div class="row">
        <div class="chip fontS">
            Filtrar productos:
        </div>
    </div>
    <br>
    <div class="col s12 m12 l12">
        <ul class="collapsible popout" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons"></i>Marcas</div>
                <div class="collapsible-body">

                    <ul class="collection ">
                        @foreach($categoria as $categorias)
                            <a href="{!! url('productos/Marca/'.$categorias->Marca) !!}" class="collection-item" style="color:#43B02A;">{{$categorias->Marca}}</a>
                        @endforeach
                    </ul>

                </div>
            </li>

            <li>
                <div class="collapsible-header"><i class="material-icons"></i>Modelo</div>
                <div class="collapsible-body">

                    <ul class="collection">
                        @foreach($series as $s)
                            <a href="{!! url('productos/Serie/'.$s->serie) !!}" class="collection-item" style="color:#43B02A;">{{$s->serie}}</a>
                        @endforeach
                    </ul>

                </div>
            </li>

            <li>
                <div class="collapsible-header"><i class="material-icons"></i>Nombre</div>
                <div class="collapsible-body">

                    <ul class="collection">
                        @foreach($name as $s)
                            <a href="{!! url('productos/Nombre/'.$s->ItemName) !!}" class="collection-item" style="color:#43B02A;">{{$s->ItemName}}</a>
                        @endforeach
                    </ul>

                </div>
            </li>
        </ul>
    </div>
</div>