<?php

namespace App\Services;

interface PaymentGateWayInterface {

    public function getAuthorizationUrl($data);

}
