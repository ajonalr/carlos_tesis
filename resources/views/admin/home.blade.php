@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <img src="{{asset('logos/logo.png')}}" alt="" style="border-radius: 15px; width: 25%;" srcset="">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">NOTAS</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>FECHA DE CREACION</th>
                                    <th>DESCRIPCION</th>
                                    <th>FECHA DE REALIZACION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota )
                                <tr>
                                    <td>{{$nota->created_at}}</td>
                                    <td>{{$nota->description}}</td>
                                    <td>{{$nota->fecha}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection