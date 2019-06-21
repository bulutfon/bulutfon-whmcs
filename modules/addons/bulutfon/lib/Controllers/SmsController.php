<?php
namespace WHMCS\Module\Addon\Bulutfon\Controllers;



use WHMCS\Module\Addon\Bulutfon\Core\Sms;

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
        $id = $this->id();
        $template = $this->sms->get($id);
        if (!$template) {
            $this->redirect('addonmodules.php?module=bulutfon&action=sms');
        }
        $this->set('template', $template);
        $this->view('sms/edit');
    }

    /**
     * Update given template.
     */
    public function update()
    {
        $id = $this->id();
        $update = $this->sms->update($id, $this->request->get('template'), $this->request->get('description'));
        if (!$update) {
            $this->redirect('addonmodules.php?module=bulutfon&action=sms');
        }
        $this->redirect('addonmodules.php?module=bulutfon&action=sms&work=edit&id='.$id);
    }

    /**
     * Activate given template
     * @return response
     */
    public function activate()
    {
        $id = $this->id();
        $this->sms->setStatus($id, 1);
        $this->redirect('addonmodules.php?module=bulutfon&action=sms');
    }

    /**
     * Deactivate given template
     * @return response
     */
    public function deactivate()
    {
        $id = $this->id();
        $this->sms->setStatus($id, 0);
        $this->redirect('addonmodules.php?module=bulutfon&action=sms');
    }

    /**
     * Debug page for messages.
     * @return array
     */
    public function debug()
    {
        $page = $this->request->get('page', 1);
        $page = ($page <= 0) ? 1 : $page;
        $this->paginate($page);
        $messages = $this->sms->debugMessages(10, $page);
        $this->set('data', json_encode($messages));

        return $this->view('bulutfon/debug');
    }

    /**
     * Get requested id.
     * @return mixed
     */
    private function id()
    {
        $id = $this->request->get('id', 1);
        if (!$id) {
            $this->redirect('addonmodules.php?module=bulutfon');
        }

        return $id;
    }
}
