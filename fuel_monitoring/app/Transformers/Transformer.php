<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Serializer\DataArraySerializer;

abstract class Transformer extends Fractal\TransformerAbstract
{
    protected $resource;

    public function transform_item($item)
    {
        $resource = new Fractal\Resource\Item($item, $this);

        return $this->serialize_to_array($resource);
    }

    public function transform_collection($items)
    {
        $resource = new Fractal\Resource\Collection($items, $this);

        return $this->serialize_to_array($resource);
    }

    private function serialize_to_array($resource)
    {
        $manager = new Manager();

        $manager->setSerializer(new DataArraySerializer());

        $list = $manager->createData($resource)->toArray();

        // return $list;
        if ($list)
            return $list['data'];
    }
}