<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DecodeHtmlEntities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Decodifica solo per POST, PUT, PATCH (non GET)
        if (in_array($request->method(), ['POST', 'PUT', 'PATCH'])) {
            $input = $request->all();
            
            // Campi da NON decodificare
            $excludeFields = ['email', 'password', 'password_confirmation', 'status', 'priority'];
            
            // Decodifica ricorsivamente tutti i campi stringa (eccetto quelli esclusi)
            array_walk_recursive($input, function(&$value, $key) use ($excludeFields) {
                if (is_string($value) && !in_array($key, $excludeFields)) {
                    $value = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
                }
            });
            
            // Aggiorna la request con i dati decodificati
            $request->merge($input);
        }
        
        return $next($request);
    }
}