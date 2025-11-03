<x-mail::message>
# Vérification en deux étapes (2FA)

Bonjour {{ $user->prenom ?? $user->nom }},

Votre code de vérification est :

# **{{ $code }}**

Ce code expirera dans **10 minutes**.  
Merci de ne pas le partager avec d'autres personnes.

<x-mail::button :url="''">
Se connecter à CERTBFA
</x-mail::button>

Si vous n'avez pas tenté de vous connecter, veuillez ignorer cet e-mail.

Merci,<br>
**L’équipe CERTBFA**
</x-mail::message>

