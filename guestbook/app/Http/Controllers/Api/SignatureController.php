<?php

namespace App\Http\Controllers\Api;

use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SignatureResource;

class SignatureController extends Controller
{
    /**
     * Return a paginated list of signatures
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signatures = Signature::latest()
            ->ignoreFlagged()
            ->paginate(20);

        return SignatureResource::collection($signatures);
    }

    /**
     * Fetch and return the signature
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $signature)
    {
      return new SignatureResource($signature);
    }


    /**
     * Validate and store a new signature to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $signature = $this->validate($request, [
          'name' => 'required|min:3|max:50',
          'email' => 'required|email',
          'body' => 'required|min:3'
        ]);


        $signature = Signature::create($signature);

        return new SignatureResource($signature);
    }


}
