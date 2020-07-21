<?php

namespace Core\Repository\Operator;

interface OperatorRepository
{
    public function get_operators();
    public function get_operator_by_id($operator_id);
    public function get_operators_list_by_key_id();
    public function save_operator(array $operator);
    public function update_operator($operator_id, array $operator);
    public function delete_operator($operator_id);
}