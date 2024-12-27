<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webhook extends CI_Controller
{
    private $secret_key = 'secretkey241224';

    public function __construct()
    {
        parent::__construct();
    }

    public function digiflazz()
    {
        $input = $this->input->post();
        $ref_id = isset($input['ref_id']) ? $input['ref_id'] : '';
        $received_sign = isset($input['sign']) ? $input['sign'] : '';
        $transaction_status = isset($input['status']) ? $input['status'] : '';

        if ($ref_id && $transaction_status) {
            if ($this->validate_signature($input, $received_sign)) {
                echo json_encode(['status' => 'success', 'data' => ['status' => $transaction_status]]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid signature']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Ref ID or status is missing']);
        }
    }

    private function validate_signature($data, $received_sign)
    {
        $username = 'siyonaop5jdD';
        $prod_key = 'f72ff07a-96dc-5be4-a854-8a3e20d28ba1';
        $ref_id = isset($data['ref_id']) ? $data['ref_id'] : '';

        $generated_sign = md5($username . $prod_key . $ref_id . $this->secret_key);

        return $received_sign === $generated_sign;
    }
}
