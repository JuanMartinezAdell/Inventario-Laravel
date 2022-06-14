@csrf

<label for="">Código</label>
<input type="text" name="code" value="{{ old('code', $product->code) }}">

<label for="">Modelo</label>
<input type="text" name="model" value="{{ old('model', '', $product->model) }}">

<label for="">Stock</label>
<input type="text" name="stock" value="{{ old('stock', '', $product->stock) }}">

<label for="">Ubicación</label>
<select name="location_id">
    <option value=""></option>
        @foreach ($locations as $name => $id)
            <option value="{{$id}}">{{{$name}}}</option>
        @endforeach
</select>

<label for="">Posteado</label>P
<select name="condition">
    <option {{ old('condition', $product->condition) == 'activo' ? 'selected' : '' }} value="activo">activo</option>
    <option {{ old('condition', $product->condition) == 'roto' ? 'selected' : '' }} value="roto">roto</option>
    <option {{ old('condition', $product->condition) == 'desaparecido' ? 'selected' : '' }} value="desaparecido">
        desaparecido</option>
</select>

<label for="">Fabricante</label>
<textarea name="maker"> {{ old('maker', $product->maker) }} </textarea>

<label for="">Descripción</label>
<textarea name="description"> {{ old('description', $product->description) }}</textarea>

@if (isset($task) && $task == 'edit')
    <label for="">Imagen</label>
    <input type="file" name="image">
@endif


<button type="submit">Enviar</button>
