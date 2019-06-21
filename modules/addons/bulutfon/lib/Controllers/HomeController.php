<?php
namespace WHMCS\Module\Addon\Bulutfon\Controllers;
use Illuminate\Database\Capsule\Manager as DB;
/**
 * @property  token
 */
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
        $cdrs = $this->client($this->token, ['limit' => 15, 'page' => $page])->get('cdrs');

        $this->paginate($page);
        $results = json_decode($cdrs)->cdrs;
        $numbers = $this->getPhoneNumbers($results);

        $results = $this->associateNumbers($results, $numbers);

        $this->set('cdrs', $results);
        $this->set('token', $this->token);

        return $this->view('bulutfon/index');
    }

    /**
     * Apiden gelen numaralari veritabaninda arar.
     *
     * @param $results
     * @return \Illuminate\Support\Collection
     */
    private function getPhoneNumbers($results)
    {
        $numbers =  array_unique(array_map(function($item) {
            return substr($item->caller,2);
        },$results));

        // REGEXP ile bakmak daha verimli bir cozum.
        $found = DB::table('tblclients')
            ->whereRaw('phonenumber REGEXP ?', [implode('|', $numbers)])
            ->get(['id','firstname', 'lastname','phonenumber']);

        return collect($found);
    }

    /**
     * Apiden gelen numaralar ile veritabanindan
     * gelen numaralari iliskilendiri.
     *
     * @param $results
     * @param $numbers
     * @return mixed
     */
    private function associateNumbers($results, $numbers)
    {
        foreach ($results as $result) {
            $phoneNumber = substr($result->caller,1);
            $number = $this->matchPhoneNumber($numbers, $phoneNumber);
            $result->user = $number ? $number : false;
        }
        return $results;
    }

    /**
     * Whmcs numaralari belirli bir standartta olmadigi
     * string bulunan sonuclar arasinda var mi diye
     * bakiyoruz.
     *
     * @param $numbers
     * @param $search
     * @return bool
     */
    private function matchPhoneNumber($numbers, $search)
    {
        foreach ($numbers as $number) {
            if (str_contains($number->phonenumber, $search) && strlen($search)> 10) {
                return $number;
            }
        }
        return false;
    }
}
