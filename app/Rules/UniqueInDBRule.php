<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueInDBRule implements Rule
{
    protected $model;

    protected $fields;

    protected $except_id;
    protected $dates;

    /**
     * Create a new instance
     *
     * @param string class representing the model $model
     * @param array $fields
     * @param int   $except_id
     */
    public function __construct(string $model, array $fields, int $except_id = 0, array $dates = [])
    {
        $this->model = $this->getModelInstance($model);
        $this->fields = $fields;
        $this->except_id = $except_id;
        $this->dates = $dates;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($this->fields as $field) {
            $this->model = in_array($field, $this->dates) ?
                $this->model->whereDate($field, request($field)) :
                $this->model->where($field, request($field));
        }

        $model = $this->model->first();

        return $model === null || $model->id === $this->except_id;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Duplicated row in Database.';
    }

    protected function getModelInstance($model)
    {
        if (is_string($model)) {
            return new $model();
        }

        return $model;
    }
}
