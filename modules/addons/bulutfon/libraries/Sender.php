<?php
namespace Xuma\Libraries;

use Illuminate\Database\Capsule\Manager as DB;

class Sender extends User
{
    public function find($id,$type)
    {

        switch ($type)
        {
            case 'invoice':
                $this->userFromInvoice($id);
                break;
            case 'userid':
                $this->userById($id);
                break;
            case 'ticket':
                $this->userFromTicket($id);
                break;
            case 'order':
                $this->userFromOrder($id);
                break;
            default:
                break;
        }
        return $this;
    }

    public function send()
    {
        return $this->user;
    }
}