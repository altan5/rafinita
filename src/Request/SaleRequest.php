<?php

namespace Altan\Rafinita\Request;

class SaleRequest extends Request
{
    public function validate(): bool
    {
        if ($this->data["action"] != "SALE") {
            return false;
        }
        if (
            !is_string($this->data["client_key"]) ||
            (preg_match(
                '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/',
                $this->data["client_key"]
            ) !== 1)
        ) {
            return false;
        }
        if (isset($this->data["channel_id"])) {
            if (!is_string($this->data["channel_id"]) || strlen($this->data["channel_id"]) > 16) {
                return false;
            }
        }
        if (isset($this->data["order_id"])) {
            if (!is_string($this->data["order_id"]) || strlen($this->data["order_id"]) > 255) {
                return false;
            }
        }
        return true;
    }
}
