<?php
namespace Xuma\Controllers;

class HomeController extends Controller
{
    /**
     * Home page to list numbers.
     * @return array
     */
    public function index()
    {
        $page = $this->request->get('page', 1);
        $page = ($page <= 0) ? 1 : $page;
        $cdrs = $this->client($this->token, ['limit' => 15, 'page' => $page])->get('cdrs')->cdrs;
        
        $this->paginate($page);
        $this->set('cdrs', json_encode($cdrs));
        $this->set('token', $this->token);

        return $this->view('bulutfon/index');
    }
}
