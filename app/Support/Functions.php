<?php

/**
 * Verifica se a função global `user()` já foi definida antes de declará-la.
 * Isso evita erros de redeclaração caso o arquivo seja carregado mais de uma vez,
 * ou caso outro pacote/arquivo já tenha definido uma função com o mesmo nome.
 */

use App\Models\User;

if (!function_exists('user')) {
    /**
     * Retorna o usuário autenticado atualmente com tipo estático correto, ou null.
     *
     * O motivo desta função existir é resolver um problema de inferência de tipos em IDEs
     * como o Intelephense: `auth()->user()` retorna `Authenticatable|null`, que é a interface
     * base do Laravel — não o modelo concreto `App\Models\User`. Por isso, ao encadear métodos
     * como `auth()->user()->like(...)`, o Intelephense não reconhece `like()` e exibe o erro
     * "Undefined method". Esta função declara explicitamente `?User` como tipo de retorno,
     * permitindo que o Intelephense resolva corretamente os métodos do modelo.
     *
     * Exemplo de uso:
     *   user()->like($question);      // Intelephense reconhece like() sem erros
     *   user()?->name;                // null-safe quando o usuário pode não estar autenticado
     *
     * @return User|null O usuário autenticado como instância de User, ou null se não autenticado.
     */
    function user(): ?User
    {
        // Se não há ninguém autenticado, retornamos null imediatamente.
        if (!auth()->check()) {
            return null;
        }

        // auth()->user() retorna Authenticatable|null, mas o check() acima garante
        // que há um usuário autenticado e que ele é uma instância de App\Models\User.
        return auth()->user();
    }
}
