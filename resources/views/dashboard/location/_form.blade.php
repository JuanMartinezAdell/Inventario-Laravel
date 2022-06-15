@csrf

<label for="">Ciudad</label>
<input class="form-control" type="text" name="city" value="{{ old('city', $location->title) }}">

<label for="">Ubicacion</label>
<input class="form-control" type="text" name="name" value="{{ old('name', '', $location->name) }}">

<label for="">Direccion</label>
<input class="form-control" type="text" name="address" value="{{ old('address', '', $location->address) }}">

<label for="">Numero</label>
<input class="form-control" type="text" name="model" value="{{ old('model', $location->number) }}">



<button class="btn btn-success mt-3" type="submit">Enviar</button>
