<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Help\SignatureHelper;
use Laravel\Sanctum\PersonalAccessToken;
use App\Exceptions\Helpers\DatabaseException;
use Illuminate\Validation\UnauthorizedException;

/**
 * Class Signature
 * @package App\Http\Middleware
 *
 * @property SignatureHelper $signatureHelper
 */
class ExternalAccess
{
    private SignatureHelper $signatureHelper;

    public function __construct()
    {
        $this->signatureHelper = new SignatureHelper();
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $publicKey = $request->get('pub');

        $publicToken = PersonalAccessToken::findToken($publicKey);

        if (!$publicToken) {
            throw new UnauthorizedException('Public key is invalid', 401);
        }

        return $next($request);
    }
}
