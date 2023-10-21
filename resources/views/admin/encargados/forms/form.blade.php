<div class="form-group">
   <label for="">Nombre de ACtividad</label>
   <input type="text" class="form-control text-uppercase" name="nombre" placeholder="Nombre de Actividad">
</div>

<div class="form-group">
   <label for="">ASIGNACION DE GRADO</label>
   <select id="select" name="grado_id" required class="mb-4">
      <option value="">SELECCIONE UN GRADO</option>
      @foreach ($grados as $grado)
      <option value="{{$grado->id}}">{{$grado->nombre}} / Seccion: {{$grado->seccion}}</option>
      @endforeach
   </select>
</div>

<div class="form-group">
   <label for="descripcion">Descripcion de Actividad</label>
   <textarea class="form-control" name="descripcion" id="editor1" rows="3"></textarea>
</div>

<div class="form-group">
   <label for="">Costo de Actividad</label>
   <input type="number" step="any" class="form-control" name="costo" id="" placeholder="CASTO TOTAL DE ACTIVIAD">
</div>

<div class="form-group">
   <label for="">Fecha Realizacion de Actividad</label>
   <input type="date" class="form-control" name="fecha">
</div>

