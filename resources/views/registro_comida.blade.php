@extends('layouts.app')
@section('comida')
    <form method="POST" action="{{route('registro_comida')}}">
        @csrf
        <div class="row">
            <div class="col">
                <label for="">Nombre Producto</label>
                <input name="name" type="text" class="form-control" placeholder="producto" >
            </div>
            <div class="col">
                <label for="">Cantidad</label>
                <input name="cantidad" type="number" class="form-control" placeholder="cantidad" >
            </div>
        </div>
        <br> <br>
        <div class="col">
            <label for="" class="center">Cantidad</label>
            <select name="descripcion" class="custom-select" id="inputGroupSelect01" >
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="center">
        <button type="submit" class="btn btn-primary ">Registrar</button>
        </div>
    </form> 
    //
@endsection
