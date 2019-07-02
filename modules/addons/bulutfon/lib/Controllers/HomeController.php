<?php

namespace WHMCS\Module\Addon\Bulutfon\Controllers;

use WHMCS\Module\Addon\Bulutfon\Core\Number;
use WHMCS\Module\Addon\Bulutfon\Core\User;

/**
 * @property  token
 */
class HomeController extends Controller
{
    /**
     * Home page to list numbers.
     */
    public function index()
    {
        $this->set('token', $this->token);

        return $this->view('bulutfon/index');
    }

    public function user()
    {
        $this->set('token', $this->token);
        $userid = $this->request->get('userid');

        $userRepo = new User();
        $userRepo->userById($userid);

        if (!$userRepo->user->phonenumber) {
            echo 'Çağrı kaydı bulunamadı.';
            exit;
        }

        $phonenumber = $userRepo->user->phonenumber;

        $phonenumber = str_replace(' ', '', $phonenumber);
        $phonenumber = str_replace('+', '', $phonenumber);
        $phonenumber = str_replace('.', '', $phonenumber);

        if (strlen($phonenumber) === 10) {
            $phonenumber = "90{$phonenumber}";
        }
        if (strlen($phonenumber) === 11) {
            $phonenumber = "9{$phonenumber}";
        }

        $this->set('phonenumber', $phonenumber);
        $this->set('user', $userRepo->user);
        $this->view('bulutfon/user');

        exit;
    }

    public function numbers()
    {
        $content = $this->request->getContent();

        if (!$content) {
            $this->json(['status' => false]);
        }

        $data = json_decode($content, true);

        $numbers = new Number($data);

        $result = $numbers->standartize()->search()->associate();

        $this->json($result);
    }
}
