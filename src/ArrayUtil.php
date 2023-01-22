<?php

namespace EdwardAlgorist\ArrayUtil;

class ArrayUtil
{

    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function set($key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        return $this->data[$key];
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function in($needle, $strict = false): bool
    {
        return in_array($needle, $this->data, $strict);
    }

    public function keyExists($key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function map($callback, ...$arrays): ArrayUtil
    {
        return new ArrayUtil(array_map($callback, $this->data, ...$arrays));
    }

    public function search($needle, $strict = false): bool|int|string
    {
        return array_search($needle, $this->data, $strict);
    }

    public function __call($method, $arguments)
    {

        $method = 'array_' . $this->snake($method);

        if(!function_exists($method))
           $method = str_replace('array_', '', $method);

        $data = ($method)($this->data, ...$arguments);

        if(is_array($data))
            return new ArrayUtil($data);

        return $data;

    }

    /**
     * Convert a string to snake case.
     *
     * @param $str
     * @return string
     */
    private function snake($str): string
    {
        $str = preg_replace('/\s+/u', '', ucwords($str));
        return strtolower(preg_replace('/(.)(?=[A-Z])/u', '$1'. '_', $str));
    }

}
