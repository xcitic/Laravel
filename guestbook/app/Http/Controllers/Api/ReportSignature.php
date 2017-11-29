<?php

namespace App\Http\Controllers\Api;


use App\Signature;
use App\Http\Controllers\Controller;

class ReportSignature extends Controller
{

  /**
   * Flag the given signature
   * @method update
   * @param Signature $signature
   * @return Signature
   */
    public function update(Signature $signature)
    {
      $signature->flag();

      return $signature;
    }
}
