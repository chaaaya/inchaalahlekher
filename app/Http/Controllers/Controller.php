<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    // Méthode de validation commune
    protected function validateRequest($request, $rules)
    {
        return $request->validate($rules);
    }

    // Méthode pour retourner une réponse JSON avec succès
    protected function respondWithSuccess($message, $data = [], $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    // Méthode pour retourner une réponse JSON avec erreur
    protected function respondWithError($message, $status, $errors = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}
