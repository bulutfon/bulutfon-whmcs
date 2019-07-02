<?php

namespace WHMCS\Module\Addon\Bulutfon\Core;

use Illuminate\Database\Capsule\Manager as DB;

class User
{
    public $user;

    protected function userFromInvoice($invoiceId)
    {
        $user = DB::table('tblinvoices')
            ->where('tblinvoices.id', $invoiceId)
            ->where('tblinvoices.total', '!=', 0)
            ->join('tblclients', 'tblinvoices.userid', '=', 'tblclients.id')
            ->first();
        $this->user = $user;
    }

    public function userById($id)
    {
        $user = DB::table('tblclients')
            ->where('tblclients.id', $id)
            ->first();
        $this->user = $user;
    }

    protected function userFromTicket($ticketId)
    {
        $user = DB::table('tbltickets')
            ->where('tbltickets.id', $ticketId)
            ->join('tblclients', 'tbltickets.userid', '=', 'tblclients.id')
            ->first();
        $this->user = $user;
    }

    protected function userFromOrder($orderId)
    {
        $user = DB::table('tblorders')
            ->where('tblorders.id', $orderId)
            ->join('tblclients', 'tblorders.userid', '=', 'tblclients.id')
            ->first();
        $this->user = $user;
    }
}
