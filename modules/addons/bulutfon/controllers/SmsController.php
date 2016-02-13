<?php
namespace Xuma\Controllers;

use Xuma\Libraries\Sms;

class SmsController extends Controller
{
    protected $sms;

    public function __construct()
    {
        parent::__construct();
        $this->sms = new Sms;
    }

    /**
     * List all sms templates.
     */
    public function index()
    {
        $this->set('templates', $this->sms->all());
        $this->view('sms/templates');
    }

    /**
     * Edit sms template.
     */
    public function edit()
    {
        $id = $this->request->get('id');
        if (!$id) {
            $this->redirect('addonmodules.php?module=bulutfon');
        }
        $this->view('sms/edit');
    }
}