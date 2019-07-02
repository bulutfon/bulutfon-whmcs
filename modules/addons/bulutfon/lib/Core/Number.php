<?php

namespace WHMCS\Module\Addon\Bulutfon\Core;

use Illuminate\Database\Capsule\Manager as DB;

class Number
{
    public $numbers = [];

    public $results;

    public $output = [];

    public function __construct($results)
    {
        $this->numbers = $results['numbers'];
    }

    public function standartize()
    {
        $this->numbers = array_map(function ($item) {
            return substr($item, 2);
        }, array_unique($this->numbers));

        return $this;
    }

    public function search()
    {
        $results = DB::table('tblclients')
            ->whereRaw('REPLACE(phonenumber, " ", "") REGEXP ?', [implode('|', $this->numbers)])
            ->get(['id', 'firstname', 'lastname', 'phonenumber']);

        $this->results = collect($results);

        return $this;
    }

    public function associate()
    {
        foreach ($this->results as $result) {
            foreach ($this->numbers as $number) {
                $this->isContainsNumber($result, $number);
            }
        }

        return $this->output;
    }

    private function isContainsNumber($result, $number)
    {
        if (str_contains(str_replace(' ', '', $result->phonenumber), $number) && strlen($number) > 5) {
            $key = "90{$number}";
            if (!is_array($this->output[$key])) {
                $this->output[$key] = [];
            }
            array_push($this->output[$key], $result);
        }
    }
}
