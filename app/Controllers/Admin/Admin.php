<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Category;
use App\Models\CategoryModel;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Admin extends BaseController
{
    private $user;
    private $session;
    protected $currentammount;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->session = Services::session();
        $konto = getUserAmmount($this->user->id);
        $this->currentammount = $konto->ammount;
    }

    public function index()
    {
        return view('Admin/index',[
                'user' => $this->user,
                'session' => $this->session,
                'menu' => 1,
                'submenu1' => 0,
                'submenu2' => 0,
                'lastBookings' => lastBookings(user_id()),
        ]);
    }

    public function transaction()
    {
        if($this->session->has('newBooking')) {
            // angefangene Buchuung vorhanden, Seite aufrufen
            $step = $this->session->newBooking['step'];
            $page = "step".$step;
            return redirect()->to($page);
        }
        $catModel = new CategoryModel();
        $categories = $catModel->getFullCats();
        $cats = [];
        $cats['0000'] = "Neue Kategorie";
        foreach($categories as $category) {
            $cats[$category->cat_id] = $category->cat_text;
        }

        return view('Admin/transaction', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 2,
            'submenu1' => 0,
            'submenu2' => 0,
            'categories' => $cats,
        ]);
    }

    public function statistics()
    {
        return view('Admin/statistics', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 3,
            'submenu1' => 0,
            'submenu2' => 0,
        ]);
    }

    public function catlist()
    {
        $catModel = new CategoryModel();

        $categories = $catModel->getFullCats();

        return view('Admin/catlist', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 4,
            'submenu1' => 1,
            'submenu2' => 0,
            'categories' => $categories,
            'pager' => $catModel->pager,
        ]);
    }

    public function newcat()
    {
        $catModel = new CategoryModel();

        $categories = $catModel->getCategories(true);
        $usercats = $catModel->getCategoriesByUserId(user_id());
        $confirmed = true;
        if(count($usercats) !== 0) {
            foreach($usercats as $usercat) {
                if($usercat->confirmed !== "1") {
                    $confirmed = false;
                }
            }
            if(!$confirmed) {
                return redirect()->to('/catlist')->with('warning','Ein Vorschlag von Dir ist noch aktiv. Weitere Vorschläge können erst gemacht werden, wenn die Administratoren Deinem Vorschlag zugestimmt oder ihn abgelehnt haben.');
            }
        }

        $einnahmen = [];
        $ausgaben  = [];
        for ($i = 1; $i < 100; $i++) {
            if ($i < 50) {
                if ($i < 10) {
                    $einnahmen[] = "0" . $i . "00";
                } else {
                    $einnahmen[] = $i . "00";
                }
            } else {
                $ausgaben[] = $i . "00";
            }
        }
        // vorhandene Kategorien Rausfiltern
        foreach ($categories as $cat) {
            $search = array_search($cat->cat_id, $einnahmen);
            if ($search !== false) {
                unset($einnahmen[$search]);
            }
            $search = array_search($cat->cat_id, $ausgaben);
            if ($search !== false) {
                unset($ausgaben[$search]);
            }
        }

        // ersten verfügbaren Kategorien
        $ein = null;
        $aus = null;

        if(count($einnahmen) > 0) {
            $ein = array_values($einnahmen)[0];
        }
        if(count($ausgaben) > 0) {
            $aus = array_values($ausgaben)[0];
        }
        return view('Admin/newcat', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 4,
            'submenu1' => 2,
            'submenu2' => 0,
            'cat_id_ein' => $ein,
            'cat_id_aus' => $aus,
            'cat_options' => [$ein => $ein." Einnahme", $aus => $aus." Ausgabe"],
        ]);
    }
    public function create_new_cat()
    {
        $category = new Category($this->request->getPost());
        $catModel = new CategoryModel();

        if(auth()->user()->inGroup('superadmin')) {
            $category->confirmed = true;
        } else {
            $category->confirmed = false;
        }
        $category->user_id = user_id();
        if(!$catModel->insert($category)) {
            return redirect()->back()
                             ->with('warning','Fehlerhafte Eingabe')
                             ->with('errors', $catModel->errors())
                             ->withInput();
        } else {
            $erstellt = (auth()->user()->inGroup('superadmin') ? "Neue Kategorie angelegt." : "Neue Kategorie vorgeschlagen.");
            if(auth()->user()->inGroup('superadmin')) {
                $info = "Der Administrator ".$this->user->username." hat die Kategorie '$category->cat_text' erstellt.";
            } else {
                $info = "Der Benutzer ".$this->user->username." hat die Kategorie '$category->cat_text' vorgeschlagen.";
            }
            log_message('info',$info);
            return redirect()->to('/catlist')
                             ->with('info',$erstellt);
        }
    }

    public function subcatlist()
    {
        if (!auth()->user()->inGroup('premiumuser', 'superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Premium-User zugänglich.');
        }

        return view('Admin/subcatlist', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 4,
            'submenu1' => 3,
            'submenu2' => 0,
        ]);
    }

    public function newsubcat()
    {
        if (!auth()->user()->inGroup('premiumuser', 'superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Premium-User zugänglich.');
        }

        return view('Admin/newsubcat', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 4,
            'submenu1' => 1,
            'submenu2' => 0,
        ]);
    }

    public function admin1()
    {
        if (!auth()->user()->inGroup('superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Administratoren zugänglich.');
        }

        return view('Admin/admin1', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 5,
            'submenu1' => 0,
            'submenu2' => 1,
        ]);
    }

    public function admin2()
    {
        if (!auth()->user()->inGroup('superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Administratoren zugänglich.');
        }

        return view('Admin/admin2', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 5,
            'submenu1' => 0,
            'submenu2' => 2,
        ]);
    }

    public function admin3()
    {
        if (!auth()->user()->inGroup('superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Administratoren zugänglich.');
        }

        return view('Admin/admin3', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 5,
            'submenu1' => 0,
            'submenu2' => 3,
        ]);
    }

    public function admin4()
    {
        if (!auth()->user()->inGroup('superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Administratoren zugänglich.');
        }

        $catModel = new CategoryModel();

        $unconfirmed = $catModel->getUnconfirmedCategories();

        return view('Admin/admin4', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 5,
            'submenu1' => 0,
            'submenu2' => 4,
            'unconfirmed' => $unconfirmed,
        ]);
    }

    public function confirmCategory($cat_id)
    {
        if (!auth()->user()->inGroup('superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Administratoren zugänglich.');
        }

        $catModel = new CategoryModel();

        $category = $this->_getCategoryOr404($cat_id);

        $data = [
            'confirmed' => true,
            'user_id' => null,
        ];

        if($catModel->update($category->cat_id,$data)) {
            return redirect()->to('/admin4')->with('info','Kategorie freigegeben.');
        } else {
            return redirect()->to('/admin4')->with('warning','Fehler beim Schreiben in die Datenbank.')->with('errors',$catModel->errors());
        }
    }

    public function dismissCategory($cat_id)
    {
        if (!auth()->user()->inGroup('superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Administratoren zugänglich.');
        }
        
        $category = $this->_getCategoryOr404($cat_id);

        if($this->request->getMethod() === 'post') {
            $catModel = new CategoryModel();
            $catModel->delete($cat_id);

            return redirect()->to('/admin4')->with('info','Vorgeschlagene Kategorie gelöscht.');
        }

        return view('Admin/deletecategory', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 5,
            'submenu1' => 0,
            'submenu2' => 4,
            'category' => $category,
        ]);


    }

    public function admin5()
    {
        if (!auth()->user()->inGroup('superadmin')) {
            return redirect()->to('/dashboard')->with('warning', 'Dieser Bereich ist nur für Administratoren zugänglich.');
        }

        return view('Admin/admin5', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 5,
            'submenu1' => 0,
            'submenu2' => 5,
            'currentammount' => $this->currentammount,
        ]);
    }

    public function help()
    {
        return view('Admin/help', [
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 6,
            'submenu1' => 0,
            'submenu2' => 0,
        ]);
    }

    public function getStartAmmount()
    {

        return view('Admin/index',[
            'user' => $this->user,
            'session' => $this->session,
            'menu' => 1,
            'submenu1' => 0,
            'submenu2' => 0,
            'startammount' => true,
        ]);

        // $ptn = "/\-?\d+[\.\,]\d{2}/";
    }

    public function setAmmount()
    {
        $user_id = auth()->user()->id;
        $now = date('Y-m-d H:i:s');
        $rules = [
            'ammount' => 'required|regex_match[/^\-?\d+[\.\,]\d{2}$/]'
        ];

        $data = $this->request->getPost(array_keys($rules));
        if(!$this->validateData($data,$rules)) {
            return redirect()->back()->with("errors",$this->validator->getErrors())->withInput();
        }
        $ammount = $this->request->getPost('ammount');
        // eventuelles Komma in Punkt umwandeln
        $ammount = str_replace(",",".", $ammount);

        $db = \Config\Database::connect();
        $builder = $db->table('ammount');
        $data = [
            'id' => new RawSql('DEFAULT'),
            'user_id' => $user_id,
            'ammount' => (float)$ammount,
            'zeit' => $now
        ];
        // dd($data);
        $builder->insert($data);
        return redirect()->to("/dashboard");

    }

    public function addRole()
    {
        if(auth()->user()->inGroup('user')) {
            return redirect()->to('/dashboard')->with('warning', 'User bereits in Gruppe.');
        }
        auth()->user()->addGroup('user');
        return redirect()->to('/dashboard')->with('notice', 'User in Gruppe.');
    }

    public function removeRole()
    {
        if(!auth()->user()->inGroup('user')) {
            return redirect()->to('/dashboard')->with('warning', 'User nicht in Gruppe.');
        }
        auth()->user()->removeGroup('user');
        return redirect()->to('/dashboard')->with('notice', 'User aus Gruppe entfernt.');
    }

    private function _getCategoryOr404($cat_id)
    {
        $catModel = new CategoryModel();

        $category = $catModel->findCategoryByCatID($cat_id);

        if($category === null) {
            throw new PageNotFoundException("Kategorie '$cat_id' nicht gefunden");
        }
        return $category;
    }
}
