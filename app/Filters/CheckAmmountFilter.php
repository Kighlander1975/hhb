<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckAmmountFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // in der Datenbanktabelle "ammount" checken, ob das Datumsfeld = NULL ist, denn dann muss weitergeleitet werden zur ersten Kontostandsanzeige
        $user = auth()->user()->id;
        // checken, ob überhaupt ein Eintrag existiert
        $sql = "SELECT zeit FROM ammount WHERE user_id = '".$user."'";
        $db = \Config\Database::connect();
        $query = $db->query($sql);
        $request = $query->getRowArray();
        //dd($request);
        if($request === null) return redirect()->to('/getstartammount');
        if($request['zeit'] === NULL) return redirect()->to('/getstartammount');
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
