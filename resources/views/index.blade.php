<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre </th>
                <th>Imagen </th>
                <th>Descripcion </th>
                <th>Precio</th>
            <tr>    
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
            <tr>
                <td>{{$articulo->nombre}} </td>
                <td><img src="{{asset($articulo->imagen)}}"></td>
                <td> {{$articulo->descripcion}}</td>
                <td>{{$articulo->precio}} </td>
            </tr>
            @endforeach    
        </tbody>       

    </table>

    <form action="{{route('articulo_post')}}" method="post" enctype="multipart/form-data">
     @csrf
      <p><label>Nombre </label></p>
      <p><input type="text" name="nombre" id="nombre"></p>
      <p><label>Imagen </label></p>
      <p><input type="file" name="imagen" id="imagen"></p>
      <p><label>Descripcion </label></p>
      <p><input type="text" name="descripcion" id="descripcion"></p>
      <p><label>Precio </label></p>
      <p><input type="text" name="precio" id="precio"></p>
      <p><input type="submit" value="enviar"></p>
    </form>
    
</body>
</html>