<div id="v-pills-home" class="tab-pane fade active show">
   <h4>ENCARGADO PRIMARIO</h4>
   <div class="form-group">
      <label for="">NOMBRE</label>
      <input type="text" class="form-control" value="{{$data->nombre1}}" name="nombre1" placeholder="NOMBRE ENCARGADO">
   </div>

   <div class="row">
      <div class="col-md-4">
         <div class="form-group">
            <label for="">DPI</label>
            <input type="text" class="form-control" value="{{$data->dpi1}}" name="dpi1" placeholder="NUMERO DE DPI" required>
         </div>
      </div>
      <div class="col-md-8">
         <div class="form-group">
            <label for="">DIRECCION</label>
            <input type="text" class="form-control" value="{{$data->direccion1}}" name="direccion1" placeholder="DIRECCION DOMICILIAR" required>
         </div>
      </div>
   </div>

   <div class="row">
  
      <div class="col-md-4">
         <div class="form-group">
            <label for="">EDAD</label>
            <input type="number" class="form-control" value="{{$data->edad1}}" name="edad1" placeholder="EDAD DE ENCARGADO" required>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="">TELEFONO</label>
            <input type="text" class="form-control" value="{{$data->telefono1}}" name="telefono1" placeholder="NUMERO DE TELEFONO PRIMARIO" required>
         </div>
      </div>
   </div>

</div>