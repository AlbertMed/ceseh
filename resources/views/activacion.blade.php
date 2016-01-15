<html>
    <br><br><br>
    <div class="row">
        <div class="container">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s12">
                            <div class="row">
                                  <span class="red-text" style="font-size: 16px;">
                                    <h1>{{$nombre}}<small> para completar tu registro</small></h1>
                                  </span>
                            </div>
                            <div class="row">
                                <span class="grey-text">
                                    Para cualquier aclaración comunicarse al 01800-237-3472
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col m12 right-align">

                        <p>
                            <a href="{{url('registrado/'.$email)}} " class="btn btn-primary"   role="button">
                                <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                                clic aca para activar tu cuenta
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>

</html>