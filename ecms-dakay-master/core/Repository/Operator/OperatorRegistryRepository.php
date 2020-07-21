<?php

namespace Core\Repository\Operator;

interface OperatorRegistryRepository
{
    public function create_operator(array $operator) : array;
}