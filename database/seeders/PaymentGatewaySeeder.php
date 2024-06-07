<?php

namespace Database\Seeders;

use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\PaymentGateway;
use App\Models\PaymentGatewayCurrency;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'Paypal', 'slug' => 'paypal', 'image' => 'assets/images/payment-gateway-icon/paypal.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Stripe', 'slug' => 'stripe', 'image' => 'assets/images/payment-gateway-icon/stripe.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Razorpay', 'slug' => 'razorpay', 'image' => 'assets/images/payment-gateway-icon/razorpay.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Instamojo', 'slug' => 'instamojo', 'image' => 'assets/images/payment-gateway-icon/instamojo.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Mollie', 'slug' => 'mollie', 'image' => 'assets/images/payment-gateway-icon/mollie.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Paystack', 'slug' => 'paystack', 'image' => 'assets/images/payment-gateway-icon/paystack.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Sslcommerz', 'slug' => 'sslcommerz', 'image' => 'assets/images/payment-gateway-icon/sslcommerz.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Flutterwave', 'slug' => 'flutterwave', 'image' => 'assets/images/payment-gateway-icon/flutterwave.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Mercadopago', 'slug' => 'mercadopago', 'image' => 'assets/images/payment-gateway-icon/mercadopago.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Bank', 'slug' => 'bank', 'image' => 'assets/images/payment-gateway-icon/bank.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['title' => 'Cash', 'slug' => 'cash', 'image' => 'assets/images/payment-gateway-icon/cash.png', 'status' => ACTIVE, 'mode' => GATEWAY_MODE_SANDBOX, 'url' => '', 'key' => '', 'secret' => '', 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
        ];
        PaymentGateway::insert($data);

        PaymentGatewayCurrency::insert([
            ['gateway_id' => 1, 'currency' => 'USD', 'conversion_rate' => 1],
            ['gateway_id' => 2, 'currency' => 'USD', 'conversion_rate' => 1],
            ['gateway_id' => 3, 'currency' => 'INR', 'conversion_rate' => 80],
            ['gateway_id' => 4, 'currency' => 'INR', 'conversion_rate' => 80],
            ['gateway_id' => 5, 'currency' => 'USD', 'conversion_rate' => 1],
            ['gateway_id' => 6, 'currency' => 'NGN', 'conversion_rate' => 464],
            ['gateway_id' => 7, 'currency' => 'BDT', 'conversion_rate' => 100],
            ['gateway_id' => 8, 'currency' => 'NGN', 'conversion_rate' => 464],
            ['gateway_id' => 9, 'currency' => 'BRL', 'conversion_rate' => 5],
            ['gateway_id' => 10, 'currency' => 'USD', 'conversion_rate' => 1],
            ['gateway_id' => 11, 'currency' => 'USD', 'conversion_rate' => 1],

        ]);
    }
}
