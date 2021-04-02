<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Page de modification de {{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h1>

    <form action="{{route('utilisateurs.update',$utilisateur->id)}}" method="POST">
        @csrf 
        @method('patch')

        <input type="text" name="nom" value="{{  $utilisateur->nom }}">
        @if($errors->has('nom'))
        <div class="text-danger ">{{ $errors->first('nom') }}</div>
        @endif


        <input type="text" name="prenom" value="{{ $utilisateur->prenom }}">
        @if($errors->has('prenom'))
        <div class="text-danger ">{{ $errors->first('prenom') }}</div>
        @endif

        <button type="submit">Modifier</button>

    </form>



</body>

</html>