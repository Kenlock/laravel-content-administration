<?php

namespace Fjord\Crud\Fields;

use Fjord\Crud\BaseField;

class Boolean extends BaseField
{
    use Traits\FieldHasRules;

    /**
     * Field Vue component.
     *
     * @var string
     */
    protected $component = 'fj-field-boolean';

    /**
     * Cast field value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function castValue($value)
    {
        return (bool) $value;
    }
}
