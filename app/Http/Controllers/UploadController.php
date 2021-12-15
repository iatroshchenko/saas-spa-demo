<?php

namespace App\Http\Controllers;

use App\Http\Requests\Upload\UploadAvatarRequest;
use App\Http\Requests\Upload\UploadCompanyLogoRequest;
use App\Models\Shipper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function avatar(UploadAvatarRequest $request)
    {
        $user = $request->user();
        $file = $request->file('file');

        $file->move(User::getAvatarFolder(), $name = Str::random(30) . '.' . $file->getClientOriginalExtension());

        return response()
            ->json([
                'name' => $name
            ]);
    }

    public function companyLogo(UploadCompanyLogoRequest $request)
    {
        $shipper = $request->user()->getShipper();
        $file = $request->file('file');

        $file->move(Shipper::getLogosFolder(), $name = Str::random(30) . '.' . $file->getClientOriginalExtension());

        return response()
            ->json([
                'name' => $name
            ]);
    }
}
