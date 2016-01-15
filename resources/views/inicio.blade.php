@extends('app')
@section('titulo')
  Home
@endsection
@section('subestilos')

@endsection
@section('content')

    <br>
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2015/02/Aniv-25-01.jpg" id="im"> <!-- random image -->
                <div class="caption center-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2015/10/19809-NSARHB-01.jpg"> <!-- random image -->
                <div class="caption left-align">
                    <h3>Left Aligned Caption</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="http://2.bp.blogspot.com/-sjqa0pKX02o/UNogFk_ZqzI/AAAAAAAAxD0/7rHVL9d5U24/s1600/Paisaje+Wallpaper+%2822%29.jpg"> <!-- random image -->
                <div class="caption right-align">
                    <h3>Right Aligned Caption</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="http://3.bp.blogspot.com/-vhOAiARFuSU/UNoi1MT7kOI/AAAAAAAAxGk/l_xo3KSJJRE/s1600/Paisaje+Wallpaper+%287%29.jpg"> <!-- random image -->
                <div class="caption center-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
        </ul>
    </div>

    <hr>
    <div class="row">
        <div class="cContainer">
            <div class="col s12 m9 l9">

                <div class="col s12 l12 m12">

                    <div class="row">
                        <div class="chip fontS">
                            Los más vendidos
                        </div>
                        <hr>
                    </div>
                    @foreach ($vistos as $vende)
                        <?php
                        $data = utf8_decode($vende->ItemCode);
                        $codes = preg_replace('/[^,\sA-Za-z0-9.-]/', '', $data);
                        ?>
                        <div class="col s4 m6 l4">
                            <div class="card medium z-depth-3" >
                                <div class="card-image responsive-img">
                                    <img src="{{$vende->image_url}}" class="avatar materialboxed hoverable" data-caption="Codigo: {{$vende->ItemCode}}">
                                </div>
                                <div class="card-content" style="height: 290px">
                                    <p>{{$vende->ItemName}}</p>

                                    <p>{{$vende->ItemCode}}</p>
                                    <p><a href="{!! url('productos/'.$vende->Marca.'/datos/'.$codes) !!}">Ver
                                            Detalles</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- no tocar este div -->

        <div class="col s6 m3 l3">
            <br><br><br>

            @include('includes.menu')

        </div><!-- no tocar este div -->
    </div>


    <hr>
    <!-- section of produts most buyed -->
    <br><br>
    <div class="cContainer">
        <div class="col s12 m9 l9">

            <div class="col s12 l12 m12">
                <div class="row">
                    <div class="chip fontS">
                        Te Recomendamos
                    </div>
                </div>
                <div class="row">
                    @foreach ($vendidos as $vende)
                        <?php
                        $data = utf8_decode($vende->ItemCode);
                        $codes = preg_replace('/[^,\sA-Za-z0-9.-]/', '', $data);
                        ?>
                        <div class="col s4 m6 l3">
                            <div class="card small grey lighten-2 z-depth-5">
                                <div class="card-image responsive-img">
                                    <img src="{{$vende->image_url}}" class="avatar materialboxed hoverable" data-caption="Codigo: {{$vende->ItemCode}}">
                                </div>
                                <div class="card-content">
                                    <p>{{$vende->ItemName}}</p>

                                    <p>{{$vende->ItemCode}}</p>
                                    <p><a href="{!! url('productos/'.$vende->Marca.'/datos/'.$codes) !!}">Ver
                                            Detalles</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div><!-- no tocar este div -->
</div>
            

@endsection



