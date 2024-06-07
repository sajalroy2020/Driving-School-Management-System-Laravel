<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CurrencyRequest;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\MultiLanguage;
use App\Models\PaymentGateway;
use App\Models\PaymentGatewayBank;
use App\Models\PaymentGatewayCurrency;
use App\Traits\JsonResponseTrait;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentGatewayController extends Controller
{
    use JsonResponseTrait;

    public function edit($id)
    {
        try {
            $data['gateway'] = PaymentGateway::where(['id'=> $id, 'tenant_id'=> auth()->user()->tenant_id,])
                ->with(['gateway_currency', 'gateway_bank'])
                ->first();

            $gatewayFieldDetails = [];
            if ($data['gateway']->slug == 'paypal') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Client ID',
                    'secret_show' => true,
                    'secret_title' => 'Secret Key',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'stripe') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Secret Key',
                    'secret_show' => false,
                    'secret_title' => '',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'razorpay') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Key',
                    'secret_show' => true,
                    'secret_title' => 'Secret',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'instamojo') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Api Key',
                    'secret_show' => true,
                    'secret_title' => 'Auth Token',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'mollie') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Mollie Key',
                    'secret_show' => false,
                    'secret_title' => '',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'paystack') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Public Key',
                    'secret_show' => false,
                    'secret_title' => '',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'sslcommerz') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Store ID',
                    'secret_show' => true,
                    'secret_title' => 'Store Password',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'flutterwave') {
                $gatewayFieldDetails = [
                    'url_show' => true,
                    'url_title' => 'Hash',
                    'key_show' => true,
                    'key_title' => 'Public Key',
                    'secret_show' => true,
                    'secret_title' => 'Client Secret',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'mercadopago') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => true,
                    'key_title' => 'Client ID',
                    'secret_show' => true,
                    'secret_title' => 'Client Secret',
                    'mode_show' => true,
                ];
            } elseif ($data['gateway']->slug == 'bank') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => false,
                    'key_title' => '',
                    'secret_show' => false,
                    'secret_title' => '',
                    'mode_show' => false,
                ];
            } elseif ($data['gateway']->slug == 'cash') {
                $gatewayFieldDetails = [
                    'url_show' => false,
                    'url_title' => '',
                    'key_show' => false,
                    'key_title' => '',
                    'secret_show' => false,
                    'secret_title' => '',
                    'mode_show' => false,
                ];
            }

            $data['gatewayFieldDetails'] = $gatewayFieldDetails;

            return view('admin.settings.payment-gateway.edit_form', $data)->render();
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }

    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $gateway = PaymentGateway::find(decrypt($request->id));
            if ($gateway->slug == 'bank') {
                $bankIds = [];
                for ($i = 0; $i < count($request->bank['name']); $i++) {
                    $bank = PaymentGatewayBank::updateOrCreate([
                        'id' => isset($request->bank['id'][$i]) ? $request->bank['id'][$i] : null,
                    ], [
                        'gateway_id' => $gateway->id,
                        'bank_name' => $request->bank['name'][$i],
                        'details' => $request->bank['details'][$i],
                        'status' => ACTIVE,
                    ]);
                    array_push($bankIds, $bank->id);
                }
                PaymentGatewayBank::where('gateway_id', $gateway->id)->whereNotIn('id', $bankIds)->delete();
            } else {
                $gateway->mode = $request->mode == GATEWAY_MODE_LIVE ? GATEWAY_MODE_LIVE : GATEWAY_MODE_SANDBOX;
                $gateway->url = $request->url;
                $gateway->key = $request->key;
                $gateway->secret = $request->secret;
            }
            $gateway->tenant_id = auth()->user()->tenant_id;
            $gateway->status = $request->status == STATUS_ACTIVE ? STATUS_ACTIVE : STATUS_INACTIVE;
            $gateway->save();

            $gatewayCurrencyIds = [];
            if (is_array($request->currency)) {
                foreach ($request->currency as $key => $currency) {
                    $gatewayCurrency =   PaymentGatewayCurrency::updateOrCreate([
                        'id' => isset($request->currency_id[$key]) ? $request->currency_id[$key] : null,
                    ], [
                        'gateway_id' => $gateway->id,
                        'currency' => $currency,
                        'conversion_rate' => $request->conversion_rate[$key],
                    ]);
                    array_push($gatewayCurrencyIds, $gatewayCurrency->id);
                }
            } else {
                throw new Exception(__('Please add at least one currency'));
            }
            PaymentGatewayCurrency::where('gateway_id', $gateway->id)->whereNotIn('id', $gatewayCurrencyIds)->delete();

            DB::commit();
            return $this->successResponse([], __(MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->errorResponse([], $exception->getMessage());
//            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }

    }


}
