<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Professional;

class ProfessionalController extends Controller
{
    public function create(Request $request)
    {
        $professional = new Professional();
        $professional->username = $this->getMandate($request, 'username');
        $professional->email = $request->get('email');
        if($request->has('password'))
        {
            $professional->password = Hash::make($request->get('password'));
        }
        $professional->profession = $this->getMandate($request, 'profession');
        $professional->tel = $this->getMandate($request, 'tel');
        $professional->save();

        return $professional;
    }

    public function edit(Request $request)
    {
        $professionalId = $this->getMandate($request, 'professional_id');
        $professional = Professional::findOrFail($professionalId);

        if($request->has('password'))
        {
            $professional->password = Hash::make($request->get('password'));
        }

        $professional->profession = $this->getMandate($request, 'profession');

        $professional->tel = $this->getMandate($request, 'tel');
        $professional->save();

        return $professional;
    }
}
