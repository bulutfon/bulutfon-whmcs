<?php
namespace Xuma\Libraries;

use Illuminate\Database\Capsule\Manager as DB;

class Sms
{
    public function save()
    {

    }

    /**
     * Get single template.
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $template =  DB::table('mod_bulutfon_smstemplates')->where('id', $id)->first();
        return $template;
    }

    /**
     * Get all templates.
     * @return mixed
     */
    public function all()
    {
        $templates = DB::table('mod_bulutfon_smstemplates')->get();
        return $templates ?: false;
    }

    /**
     * Set status of the template. active or inactive.
     * @param $id
     * @param $value
     */
    public function setStatus($id,$value)
    {
        DB::table('mod_bulutfon_smstemplates')->where('id', $id)->update([
            'active' => $value
        ]);
    }

    /**
     * Update given template.
     * @param $id
     * @param $template
     * @return mixed
     */
    public function update($id,$template)
    {
        $update = DB::table('mod_bulutfon_smstemplates')->where('id', $id)->update([
            'template' => $template
        ]);
        return $update;
    }
}