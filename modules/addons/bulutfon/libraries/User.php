<?php
namespace Xuma\Libraries;

use Illuminate\Database\Capsule\Manager as DB;

class User
{
    protected $user;

    protected function userFromInvoice($invoiceId)
    {
        $user = DB::table('tblinvoices')
            ->where('tblinvoices.id', $invoiceId)
            ->join('tblclients', 'tblinvoices.userid', '=', 'tblclients.id')
            ->first();
        $this->user = $user;
    }

    protected function userById($id)
    {
        $user = DB::table('tblclients')
            ->where('id', $id)
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