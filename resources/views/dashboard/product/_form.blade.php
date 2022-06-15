@csrf

<label for="">Código</label>
<input type="text"  class="form-control" name="code" value="{{ old('code', $product->code) }}">

<label for="">Modelo</label>
<input type="text" class="form-control" name="model" value="{{ old('model', '', $product->model) }}">

<label for="">Stock</label>
<input type="text" class="form-control" name="stock" value="{{ old('stock', '', $product->stock) }}">

<label for="">Ubicación</label>
<select class="form-control" name="location_id">
    <option value=""></option>
        @foreach ($locations as $name => $id)
            <option value="{{$id}}">{{{$name}}}</option>
        @endforeach
</select>

<label for="">Posteado</label>P
<select class="form-control" name="condition">
    <option {{ old('condition', $product->condition) == 'activo' ? 'selected' : '' }} value="activo">activo</option>
    <option {{ old('condition', $product->condition) == 'roto' ? 'selected' : '' }} value="roto">roto</option>
    <option {{ old('condition', $product->condition) == 'desaparecido' ? 'selected' : '' }} value="desaparecido">
        desaparecido</option>
</select>

<label for="">Fabricante</label>
<textarea class="form-control" name="maker"> {{ old('maker', $product->maker) }} </textarea>

<label for="">Descripción</label>
<textarea class="form-control" name="description"> {{ old('description', $product->description) }}</textarea>

@if (isset($task) && $task == 'edit')
    <label for="">Imagen</label>
    <input type="file" name="image">
@endif


<button type="submit" class="btn btn-success mt-3">Enviar</button>
