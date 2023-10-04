<?php

namespace Weishaypt\EnotIo\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ValidateTrait
{
    /**
     * @param Request $request
     * @return bool
     */
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merchant' => 'required',
            'amount' => 'required',
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function validateSignature(Request $request)
    {
        $hookArr = json_decode($request, true);
ksort($hookArr);
        $hookJsonSorted = json_encode($hookArr);
        $calculatedSignature = hash_hmac('sha256', $hookJsonSorted, config('enotio.secret_key'));
        return hash_equals($headerSignature, $calculatedSignature);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function validateOrderFromHandle(Request $request)
    {
        return $this->validate($request)
                    && $this->validateSignature($request);
    }
}
