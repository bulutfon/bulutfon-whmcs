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
        $cdrs = json_decode($this->client($this->token,['limit'=>15,'page'=>$page])->get('cdrs'))->cdrs;
        $this->paginate($page);
        $this->set('cdrs', json_encode($cdrs));
        return $this->view('cdr');
    }

    /**
     * Helper for setting pagination variables.
     * @param $page
     */
    private function paginate($page)
    {
        $previous = ($page >1) ? ($page - 1) : 1;
        $next = $page + 1;
        $this->set('previous', $previous);
        $this->set('next', $next);
    }
}