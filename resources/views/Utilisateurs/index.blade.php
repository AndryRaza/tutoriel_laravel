<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bienvenue sur la page Utilisateurs</h1>



    <a href="{{ route('utilisateurs.create') }}"> <button>Aller s'inscrire</button> </a>

    <h2>Liste des utilisateurs</h2>
    @foreach($utilisateurs as $utilisateur)
    <a href="{{route('utilisateurs.edit',$utilisateur->id)}}">
        <form action="{{ route('utilisateurs.destroy', $utilisateur->id ) }}" method="POST">
        @csrf
        @method('delete')
            <p>
                {{ $utilisateur->nom  }}
                {{ $utilisateur->prenom  }}
            </p>
            <button type="submit">Supprimer </button>
        </form>
    </a>
    @endforeach

</body>

</html>