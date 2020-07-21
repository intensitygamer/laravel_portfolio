<?php

namespace Core\Repository\Operator;

interface OperatorSearchRepository
{
    public function get_operators(array $filters, $page, $per_page) : array;
}