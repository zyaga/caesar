<?php

namespace App\Http\Controllers;

use App\Services\Cipher;
use Illuminate\Http\Request;

class CipherController extends Controller
{
    public function __invoke(Cipher $cipher, Request $request)
    {
        if ($request->mode === 'decode') {
            return response()->json(['text' => $cipher->decode($request->text, $request->offset ?? 13)]);
        }

        return response()->json(['text' => $cipher->encode($request->text, $request->offset ?? 13)]);
    }
}
