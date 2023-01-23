<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;

class FileHandler
{

    /**
     * @param $File
     * @param $newName
     * @return boolean |string bei Error
     */
    public function saveFile ($File,$newName){
        $allowedType = ['pdf','jpeg','jpg','png'];
        $maxsize = 5242880; //5MB
        $uploadDir = 'D:\GS1 Dokumente\uploadFiles\\';
        $ret = false;
        if (is_uploaded_File($File['tmp_name'])){
            $fileType = explode("/", $File['type']); //pathinfo($File['name'], PATHINFO_EXTENSION);
            if(in_array($fileType[1],$allowedType)){
                if ($File['size'] <= $maxsize){
                    if(is_dir($uploadDir) && is_writable($uploadDir)){
                        if (!file_exists($uploadDir.$newName.'.'.$fileType[1])){
                            if( move_uploaded_file($File['tmp_name'],$uploadDir.$newName.'.'.$fileType[1])){
                                $ret =true;
                            }else {
                                $ret = "Fehler beim hochladen der Datei";
                            }
                        }else{
                            $ret ="der Name der Datei ist schon vorhanden!";
                        }
                    }else {
                        $ret = "pfad ist nicht richtig oder keine Berchtigung";
                    }
                }else{
                    $ret ="die Hochgeladene Datei ist zu groß";
                }
            }else {
                $ret = 'Unerlaubter Dateityp!';
            }
        }else{
            $ret = "die Datei ist nicht erfolgreich hochgeladen";
        }
        return $ret;
    }//saveFile

    /**
     * @return int
     */
    public function insert ($number){

        $Aufruf = $number."Auploadd";
        $fileType = explode("/", $_FILES['File']['type']);
        $DateiNameNeu = $_POST['Name'].'.'.$fileType[1];
        $DateiPfad ='Y:\uploadFiles';
        $now = date('Y-m-d H:i:s');
        $user = get_current_user();
        $Download = "https://cloud.vog.at/foto/download/". $Aufruf; //. $DateiNameNeu;
        $preview ="https://cloud.vog.at/foto/preview/". $Aufruf;  //. $DateiNameNeu;
            DB::table('FotoDateienMediaserver')->insertGetId([
            'Artikel_id'=>000,
            'Aufruf'=>$Aufruf,
            'DateinameNeu'=>$DateiNameNeu,
            'DateiPfad'=>$DateiPfad,
            'Erstellungsdatum'=>$now,
            'GultigAB'=>$_POST['Gultigab'],
            'GultigBis'=>$_POST['GultigBis'],
            'inhaltsbeschreibung'=>$_POST['inhaltbeschreibung'],
            'Benutzer'=>$user,
            'Download '=> $Download,
            'preview'=>$preview,
            'APP'=>'upload'
        ]);
            return $links = [$preview,$Download];
    }//insert

    /**
     * @return string
     */
    public function getNextNumber(){
        $ret ="Die number.xml Datei ist nicht vorhanden ";
        if (is_file('../resources/xml/number.xml')){
            $xml=   simplexml_load_file('../resources/xml/number.xml');
            $endNr = (int)$xml-> number->end ;
            $lastNumber = (int) $xml->number->last +1;
            if ($lastNumber <= $endNr ){
                $lastNumber = str_pad($lastNumber, 14, "0", STR_PAD_LEFT);
                $xml->number->last =$lastNumber;
                $xml->saveXML('../resources/xml/number.xml');
                $ret = $lastNumber;
            }else{
                $ret = 'Nummer kreis ist abgelauft';
            }
        }
        return $ret;
    }//getNextNumber
}//class
