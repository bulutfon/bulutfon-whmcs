<?php
namespace Xuma\Libraries;

use Illuminate\Database\Capsule\Manager as DB;

class Sms
{
    public function save()
    {

    }

    public function get()
    {

    }

    public function all()
    {
        $templates = DB::table('mod_bulutfon_smstemplates')->get();
        return $templates;
    }
}