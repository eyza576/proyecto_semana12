<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $doctor->nombre }}</p>
</div>

<!-- Apellido Field -->
<div class="col-sm-12">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{{ $doctor->apellido }}</p>
</div>

<!-- Especialidad Field -->
<div class="col-sm-12">
    {!! Form::label('especialidad', 'Especialidad:') !!}
    <p>{{ $doctor->especialidad }}</p>
</div>

