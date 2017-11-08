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
            ->where('tblinvoices.total', '!=', 0)
            ->join('tblclients', 'tblinvoices.userid', '=', 'tblclients.id')
            ->leftJoin('mod_bulutfon_usersettings', 'tblinvoices.userid', '=', 'mod_bulutfon_usersettings.clientid')
            ->first();
        $this->user = $user;
    }

    protected function userById($id)
    {
        $user = DB::table('tblclients')
            ->where('tblclients.id', $id)
            ->leftJoin('mod_bulutfon_usersettings', 'tblclients.id', '=', 'mod_bulutfon_usersettings.clientid')
            ->first();
        $this->user = $user;
    }

    protected function userFromTicket($ticketId)
    {
        $user = DB::table('tbltickets')
            ->where('tbltickets.id', $ticketId)
            ->join('tblclients', 'tbltickets.userid', '=', 'tblclients.id')
            ->leftJoin('mod_bulutfon_usersettings', 'tbltickets.userid', '=', 'mod_bulutfon_usersettings.clientid')
            ->first();
        $this->user = $user;
    }

    protected function userFromOrder($orderId)
    {
        $user = DB::table('tblorders')
            ->where('tblorders.id', $orderId)
            ->join('tblclients', 'tblorders.userid', '=', 'tblclients.id')
            ->leftJoin('mod_bulutfon_usersettings', 'tblorders.userid', '=', 'mod_bulutfon_usersettings.clientid')
            ->first();
        $this->user = $user;
    }
}
