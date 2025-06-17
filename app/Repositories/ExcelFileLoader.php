<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ExcelFileLoader
{
    /**
     * Data upload from files
     *
     * @var array
     */
    private $data = [];

    /**
     * Validation errors found on the file
     *
     * @var array
     */
    private $errors = [];

    /**
     * @param mixed[] $rules
     */
    public function __construct(
        /**
         * rules to validate each line of data.
         */
        private $validation_rules = []
    )
    {
    }

    public function load($files)
    {
        if (is_array($files)) {
            foreach ($files as $file) {
                if (is_array($file)) {
                    foreach ($file as $subFile) {
                        $this->handleLoad($subFile);
                    }
                } else {
                    $this->handleLoad($file);
                }
            }
        } else {
            $this->handleLoad($files);
        }

        return $this;
    }

    public function data()
    {
        return $this->data;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        if (count($this->errors) > 0) {
            return true;
        }

        return false;
    }

    private function handleLoad($file)
    {
        Excel::load($file, function ($reader): void {
            foreach ($reader->toArray() as $index => $data) {
                $this->handleRow($reader, $data, $index);
            }
        });
    }

    private function handleRow($reader, $data, $index)
    {
        $validator = Validator::make($data, $this->validation_rules);

        if ($validator->fails()) {
            $messages = $validator->messages()->getMessages();
            $field_with_error = array_keys($messages);
            $data = $validator->getData();

            $this->errors[
                explode('.', (string) $reader->file->getClientOriginalName())[0]
            ][] = [
                'data' => $data,
                'row_error' => $index + 2,
                'failed_field' => $field_with_error,
                'error_messages' => $messages,
            ];
        } else {
            $this->data[] = $data;
        }
    }
}
