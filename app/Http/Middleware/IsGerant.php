<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsGerant
{
 
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role !== RoleEnum::GERANT->value) {
            return response()->json(data: ["message" => "you are not allowed to access this page"], status: 403);
        }
        return $next($request);
    }
}
