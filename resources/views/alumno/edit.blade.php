<h1>Alumno EDitar</h1>
<form action="/alumno/1" method="POST">
<label>Nombre</label>
<input value={{ $alumno->nombre }} />
<label>Apellido</label>
<input value={{ $alumno->apellido }} />
<input type="hidden" name="_method" value="PUT">
<input type="submit" value="Guardar"/>
</form>