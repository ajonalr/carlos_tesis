@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/slim-select/slimselect.min.css') }}">   
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">

      <div class="card">
         <div class="card-body">
            <h4 class="card-title">REGISTRAR NUEVO GRADO</h4>
           
            <form action="{{route('grado.store')}}" method="post">
               @csrf
               @include('admin.grados.forms.form')


               <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> GUARDAR</button>
            </form>
         </div>
      </div>


      </div>
   </div>
</div>   
@endsection

@section('scripts')

<script src="{{asset('plugins/slim-select/slimselect.min.js') }}"></script>

<script>
   
      new SlimSelect({
         select: '#nombre',
         placeholder: 'Select Permissions',
         deselectLabel: '<span>&times;</span>',
         hideSelectedOption: true,
      })
   
</script>
@endsection