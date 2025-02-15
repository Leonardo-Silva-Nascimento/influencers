<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Validation\Constraint\SignedWith;

class JwtAuthMiddleware
{
    protected Configuration $config;

    public function __construct()
    { 
        $this->config = Configuration::forSymmetricSigner(
            new \Lcobucci\JWT\Signer\Hmac\Sha256(),
            \Lcobucci\JWT\Signer\Key\InMemory::plainText(env('JWT_SECRET'))
        );
    }

    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('auth_token'); 

        if (!$token) {
            return redirect('/login');
        }
    
        try {
            $parsedToken = $this->config->parser()->parse($token);
    
            $constraints = [
                new SignedWith($this->config->signer(), $this->config->signingKey()),
            ];
    
            if (!$this->config->validator()->validate($parsedToken, ...$constraints)) {
                return response()->json(['error' => 'Token inválido'], Response::HTTP_UNAUTHORIZED);
            }
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao validar o token'], Response::HTTP_UNAUTHORIZED);
        }
    
        return $next($request);
    }
    
}
