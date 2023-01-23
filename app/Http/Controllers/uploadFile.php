<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\FotoDateienMediaserver;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FileHandler;
use App\Services\Utility;
class uploadFile extends Controller
{
    private $FileHandlerObj = null ;
    private $UtilityObj = null;
    public function __construct()
    {
       $this->FileHandlerObj = new FileHandler();
       $this->UtilityObj = new Utility();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function upload(){
        $ret ='';
       if (isset($_FILES['File']) and isset ($_POST)) {
         $Number =   $this->FileHandlerObj->getNextNumber();
         $ret = $Number;
               if (is_numeric($Number)){
                   $ret = $this->FileHandlerObj->saveFile($_FILES['File'],$_POST['Name']);
                   if(  true === $ret){
                       $ret = $this->FileHandlerObj->insert($Number);
                       $ret = 'die Datei ist erfolgreich hochgeladen'.PHP_EOL
                       .$ret[0].PHP_EOL
                       .$ret[1];
                   }
               }
       }
       return view('master',compact('ret'));
    }//upload

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getTablOflinks(){
        $links = $this->UtilityObj->getlinks();
        return view('master',compact('links'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getTableOfAllLinks(){
        $links = $this->UtilityObj->getAllLinks();
        return view('master',compact('links'));
    }
}
