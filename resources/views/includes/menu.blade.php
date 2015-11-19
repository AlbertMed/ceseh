<div>
    <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header active"><i class="material-icons"></i>Marcas</div>
            <div class="collapsible-body">

                <ul class="collection">
                    <?php $array_C = array_slice($categoria,0,10); ?>
                    @foreach($array_C as $categorias)
                        <a href="{!! url('productos/'.$categorias->Marca) !!}" class="collection-item">{{$categorias->Marca}}<span class="badge"><i class="material-icons">send</i></span></a>
                    @endforeach
                </ul>

            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons"></i>Más Marcas</div>
            <div class="collapsible-body">

                <ul class="collection">
                    <?php $array_C = array_slice($categoria,10); ?>
                    @foreach($array_C as $categorias)
                        <a href="{!! url('productos/'.$categorias->Marca) !!}" class="collection-item">{{$categorias->Marca}}<span class="badge"><i class="material-icons">send</i></span></a>
                    @endforeach
                </ul>

            </div>
        </li>
    </ul>
</div>