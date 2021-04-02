<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Page d'inscription utilisateur</h1>

    <form action="{{ route('utilisateurs.store' ) }}" method="POST">
        @csrf 


        <input type="text" name="nom" value="{{ old('nom')}}">
        @if($errors->has('nom'))
        <div class="text-danger ">{{ $errors->first('nom') }}</div>
        @endif


        <input type="text" name="prenom" value="{{ old('prenom')}}">
        @if($errors->has('prenom'))
        <div class="text-danger ">{{ $errors->first('prenom') }}</div>
        @endif

        <button type="submit">S'inscrire</button>

    </form>



</body>

</html>