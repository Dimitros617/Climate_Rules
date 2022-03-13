<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\ResetUserPassword;
use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Money_transaction_types;
use App\Models\Nations;
use App\Models\Nations_technologies;
use App\Models\Nations_technologies_status;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\Statistics_types;
use App\Models\Technologies;
use App\Models\Technologies_statistics_types_changes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TechnologiController extends Controller
{
    function show($lobby_id){

        Log::info('TechnologiController:show');

        return $this->getTechnologiView('technologies', $lobby_id);
    }

    function getTechnologiView($view_name, $lobby_id){

        Log::info('TechnologiController:show->getTechnologiView');

        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }

        $allTechnologies = Lobby_to_technologies::getAlltechnologiesFromLobby($lobby_id);
        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);
        $roundNumber = Rounds::getCountRoundsInLobby($lobby_id);
        $statistics_types = DB::table('statistics_types')
            ->select('statistics_types.*')
            ->join('nation_statistic_values','statistics_types.id','=','nation_statistic_values.statistics_type_id')
            ->where('nation_statistic_values.set','=',$my_nation->statistic_values_set)
            ->groupBy('statistics_types.code_name')
            ->orderBy('statistics_types.id')
            ->get();

        $technology_statuses = DB::table('nations_technologies_status')->get();

        $branches = DB::table('branches')->get();
        $areas = DB::table('areas')->get();

        return view($view_name, ['lobby' => $lobby, 'roundNumber' => $roundNumber, 'my_nation' => $my_nation, 'allTechnologies' => $allTechnologies, 'statistics_types' => $statistics_types, 'branches' => $branches, 'areas' => $areas, 'technology_statuses' => $technology_statuses]);

    }

    function getTechnologiBuyVerificationView($lobby_id, $technology_id, $nation_id=null){

        Log::info('TechnologiController:show->getTechnologiBuyVerificationView');

        if($nation_id == null) {
            $nation_id = Nations::getNationIdFromLobby($lobby_id);

            if (!is_int($nation_id) && str_contains(get_class($nation_id), 'Response')) {
                return $nation_id;  //vracím response s chybou;
            }
        }else{
            if(!Nations::isNationInLobby($nation_id, $lobby_id)){
                return response('Nelze zobrazit tento formulář, požadovaný hráč není v lobby přiřazen!', 500)->header('Content-Type', 'text/plain');
            }
        }

        $technology = Lobby_to_technologies::getOnetechnologiesFromLobby($technology_id);
        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);
        $statistics_types = DB::table('statistics_types')
            ->select('statistics_types.*')
            ->join('nation_statistic_values','statistics_types.id','=','nation_statistic_values.statistics_type_id')
            ->where('nation_statistic_values.set','=',$my_nation->statistic_values_set)
            ->groupBy('statistics_types.code_name')
            ->orderBy('statistics_types.id')
            ->get();



        return view('technologi-buy-verification', ['lobby' => $lobby, 'my_nation' => $my_nation,  'statistics_types' => $statistics_types, 'technology' => $technology]);

    }

    function getTechnologyCertificateForm(Request $request){
        $lobby_id = Lobby_to_technologies::find($request->technology_id)->lobby_id;

        return $this->getTechnologiCertificateVerificationView($lobby_id, $request->technology_id, $request->nation_id);
    }

    function getTechnologiCertificateVerificationView($lobby_id, $technology_id, $nation_id = null){

        Log::info('TechnologiController:show->getTechnologiCertificateVerificationView');

        if($nation_id == null) {
            $nation_id = Nations::getNationIdFromLobby($lobby_id);

            if (!is_int($nation_id) && str_contains(get_class($nation_id), 'Response')) {
                return $nation_id;  //vracím response s chybou;
            }
        }else{
            if(!Nations::isNationInLobby($nation_id, $lobby_id)){
                return response('Nelze zobrazit tento formulář, požadovaný hráč není v lobby přiřazen!', 500)->header('Content-Type', 'text/plain');
            }
        }

        $technology = Lobby_to_technologies::getOnetechnologiesFromLobby($technology_id);
        $my_nation_technology = Nations_technologies::getOneNationTechnology($nation_id, $technology_id);
        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);




        return view('technologi-certificate-verification', ['lobby' => $lobby, 'my_nation' => $my_nation, 'technology' => $technology, 'my_nation_technology' => $my_nation_technology]);

    }

    /**
     * @param $technology_id -> table technologies
     * @return void
     */
    function getTechnologyDescription($technology_id){
        $technology = Technologies::find($technology_id);

        return view('technologi-description', ['technology' => $technology]);
    }

    function getTechnologySetting($technology_id){

        Log::info('TechnologiController:getTechnologySetting' . $technology_id);

        $technology = Technologies::where('id', $technology_id)->first();
        $images = $this->getAllTechnologyImages();


        return view('technologi-setting', ['technology' => $technology, 'images' => $images]);
    }

    function getAllTechnologyImages(){

        $all_img = Storage::disk('technology-img')->allFiles();

        for ($i = 0 ; $i < count($all_img); $i++){
            $all_img[$i] = '/Img/technology-img/' . $all_img[$i];
        }

        $all_assigned_img = Technologies::where('img_url', '!=', '/Img/logo_mini_transparent_gray.png')->where('img_url', 'not like', '%/Img/technology-img/%')->groupBy('img_url')->get();

        foreach ($all_assigned_img as $img){
            array_push($all_img, $img->img_url);
        }

        return $all_img;


    }

    /**
     * Funkce změní stav technologie pro konkrétní stát. Zkontorluje zda je zapoetřebí certifikace
     * @param Request $request - Request->technology_id (Table: lobby_to_technologies) = id technologie které chceme pro daný stát změnit
     *
     */
    function changeNationToTechnologyStatus(Request $request){

        Log::info('TechnologiController:changeNationToTechnologyStatus');


        $lobby_id = Lobby_to_technologies::find($request->technology_id)->lobby_id;

        if($request->nation_id == null) {
            $nation_id = Nations::getNationIdFromLobby($lobby_id);

            if (!is_int($nation_id) && str_contains(get_class($nation_id), 'Response')) {
                return $nation_id;  //vracím response s chybou;
            }
        }else{
            if(!Nations::isNationInLobby($request->nation_id, $lobby_id)){
                return response('Nelze zobrazit tento formulář, požadovaný hráč není v lobby přiřazen!', 500)->header('Content-Type', 'text/plain');
            }
            $nation_id = $request->nation_id;
        }


        $status = Nations_technologies::getOneNationStatusOfTechnology($nation_id, $request->technology_id);


        //POkud nejsou žádné interakce státu z danou technologií bereme to jako koupi
        if(count($status)==0){

            if($request->response == 0){
                return $this->getTechnologiBuyVerificationView( $lobby_id, $request->technology_id);
            }

            $amouth = Lobby_to_technologies::getPriceOfTechnology($request->technology_id) + Nations_technologies::getOneTechnologyPatentPrice($request->technology_id);
            $bank_res = BankController::payAmount($amouth,$nation_id,null,'Technology buy:' . $request->admin_pay, Money_transaction_types::getIdByCode('buy_pay') , $request->admin_pay);

            if(!is_int($bank_res) && str_contains( get_class($bank_res), 'Response')){
                return $bank_res;  //vracím response s chybou;
            }


            if(Lobby_to_technologies::isTechnologyCertificated($request->technology_id)){
                if(!Nations_technologies::addNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('investment'))){
                    return response('Chyby při vytváření nového záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
                }
            }else{

                $activate_technology = $this->activateTechnologyToNation($request->technology_id, $nation_id);

                if($activate_technology != 1){
                    return $activate_technology;
                }

                if(!Nations_technologies::addNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('active'))){
                    return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
                }

                if(!Nations_technologies::isTechnologyPatentedBySomeone($request->technology_id)){
                    Nations_technologies::setNationPatent($request->technology_id,$nation_id,1);
                }
            }



            return $this->getTechnologiView('technologies-box', $lobby_id);

        }

        $status = $status[0];

        if ($status->code == 'new'){

            if($request->response == 0){
                return $this->getTechnologiBuyVerificationView( $lobby_id, $request->technology_id);
            }

            $amouth = Lobby_to_technologies::getPriceOfTechnology($request->technology_id) + Nations_technologies::getOneTechnologyPatentPrice($request->technology_id);
            $bank_res = BankController::payAmount( $amouth, $nation_id,null,'Technology buy:' . $request->admin_pay, Money_transaction_types::getIdByCode('buy_pay') , $request->admin_pay);

            if(!is_int($bank_res) && str_contains( get_class($bank_res), 'Response')){
                return $bank_res;  //vracím response s chybou;
            }

            if(Lobby_to_technologies::isTechnologyCertificated($request->technology_id)){
                if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('investment'))){
                    return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
                }
            }else{

                $activate_technology = $this->activateTechnologyToNation($request->technology_id, $nation_id);

                if($activate_technology != 1){
                    return $activate_technology;
                }

                if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('active'))){
                    return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
                }

                if(!Nations_technologies::isTechnologyPatentedBySomeone($request->technology_id)){
                    Nations_technologies::setNationPatent($request->technology_id,$nation_id,1);
                }
            }


            return $this->getTechnologiView('technologies-box', $lobby_id);



        }
// Buy se už nepoužívá, schvalování probíjá automaticky
//        elseif ($status->code == 'buy'){
//
//
//            if(Auth::permition()->admin !=1){
//                return response('Ups, Na schválení nemáte dostatečná oprávnění!', 500)->header('Content-Type', 'text/plain');
//            }
//
//            if(Lobby_to_technologies::isTechnologyCertificated($request->technology_id)){
//                $new_code = "investment";
//            }else{
//                $new_code = "active";
//
//                $activate_technology = $this->activateTechnologyToNation($request->technology_id, $nation_id);
//                if($activate_technology != 1){
//                    return $activate_technology;
//                }
//            }
//
//            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode($new_code))){
//                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
//            }
//
//
//            return $this->getTechnologiView('technologies-box', $lobby_id);
//
//        }
        elseif ($status->code == 'investment'){

            if($request->response == 0){
                return $this->getTechnologiCertificateVerificationView( $lobby_id, $request->technology_id);
            }

            if(Nations_technologies::getOneNationTechnology($nation_id,$request->technology_id)->first_try != 1){
                Nations_technologies::setTechnologyCertificationChose($request->technology_id, $nation_id,$request->description, $request->benefits, $request->disadvantages, $request->business, $request->people);
            }else{
                return response('Tento formulář už byl jednou odeslán, počkejte na schválení nebo na vrácení!', 500)->header('Content-Type', 'text/plain');
            }


            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('certificate'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }
            return $this->getTechnologiView('technologies-box', $lobby_id);

        }
        elseif ($status->code == 'certificate'){

            if(Auth::permition()->admin !=1){
                return response('Ups, Na schválení nemáte dostatečná oprávnění!', 500)->header('Content-Type', 'text/plain');
            }

            if($request->response == 0){
                return $this->getTechnologiCertificateVerificationView( $lobby_id, $request->technology_id);
            }

            $activate_technology = $this->activateTechnologyToNation($request->technology_id, $nation_id);

            if($activate_technology != 1){
                return $activate_technology;
            }

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('active'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }

            if(!Nations_technologies::isTechnologyPatentedBySomeone($request->technology_id)){
                Nations_technologies::setNationPatent($request->technology_id,$nation_id,1);
            }

            return $this->getTechnologiView('technologies-box', $lobby_id);

        }
        elseif ($status->code == 'active'){

            return response('Tuto technologii máš již aktivovanou!', 500)->header('Content-Type', 'text/plain');

        }


    }


    /**
     * Funkce upraví statistiky státu podle karty technologie kterou chceme aktivovat.
     * @param $technology_id - id from lobby_to_technologies
     * @param $nation_id - id naroda z lobby
     * @return Response nebo 1 pokud je vše OK a aktivace proběhla v pořádku
     */
    function activateTechnologyToNation($technology_id, $nation_id){

        Log::info('TechnologyController:activateTechnologyToNation');


        $technology_statistic_change = Technologies_statistics_types_changes::where('technology_id', Lobby_to_technologies::find($technology_id)->technology_id)->get();

        if(count($technology_statistic_change)==0){
            return response('Ups, nelze najít technology_statistics_types_changes dané technologie: ' . $technology_id, 500)->header('Content-Type', 'text/plain');
        }

        foreach ($technology_statistic_change as $tech_stat){

                $statistic_code = Statistics_types::find($tech_stat->statistic_type_id)->code_name;
                $level_code = false;
                do {

                    $flag = 'Technology - ' . Technologies::find(Lobby_to_technologies::find($technology_id)->technology_id)->name;
                    $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation_id, $statistic_code, $tech_stat->index_move, $flag);


                    if ($ret != 1) {
                        if ($ret == -3) {
                            return response('Ups zadaný index posunu nemůže být záporný!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -2) {
                            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -1) {
                            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == 0) {
                            $temp_flag = $tech_stat->index_move > 0 ? 'max' : 'min';
                            $flag = 'Technology - ' . $temp_flag . ' - ' . Technologies::find(Lobby_to_technologies::find($technology_id)->technology_id)->name;
                            Round_to_nation_statistics::setBorderStaticticValueOfNation($nation_id, $statistic_code, $tech_stat->index_move, $flag);
                        }
                    }

                    if(!str_contains($statistic_code, 'level_') && Statistics_types::existLevelCode($statistic_code)){
                        $level_code = true;
                        $statistic_code = 'level_'.$statistic_code;
                    }else{
                        $level_code = false;
                    }

                }while($level_code);

        }

        return 1;
    }

    public function changeTechnologyParameter(Request $request){

        Log::info('TechnologyController:changeTechnologyParameter');

        $lobby_id = Lobby_to_technologies::where('id', $request->technology_id)->first()->lobby_id;

        $check = DB::table('lobby_to_technologies')
            ->where('id', $request->technology_id)
            ->update([
                $request->parameter => $request->value,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);


        if(!$check) {
            return response('Nastala chyba při aktualizaci dat v tabulce lobby_to_technologies ', 500)->header('Content-Type', 'text/plain');
        }else{
            return $this->getTechnologiView('technologies-box', $lobby_id);
        }
    }

    public function setNationToTechnologyStatus(Request $request){

        Log::info('TechnologyController:setNationToTechnologyStatus');

        $lobby_id = Lobby_to_technologies::find($request->technology_id)->lobby_id;

        $nation_id = Nations::getNationIdFromLobby($lobby_id, $request->nation_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }


        if( $request->response == 0) {

            if($request->first_try != null){
                $first_try = $request->first_try;
            }else{
                $first_try = Nations_technologies::where('technology_id',$request->technology_id)->where('nation_id',$nation_id)->first()->first_try;
            }

            $check = DB::table('nations_technologies')
                ->where('technology_id', $request->technology_id)
                ->where('nation_id', $nation_id)
                ->update([
                    'status_id' => Nations_technologies_status::getIdByCode($request->code),
                    'first_try' => $first_try,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);


            if (!$check) {
                return response('Nastala chyba při aktualizaci dat v tabulce nations_technologies ', 500)->header('Content-Type', 'text/plain');
            }
        }

        if(Nations_technologies::getOneNationTechnology($nation_id, $request->technology_id)->patent == 1 && $request->response == 0){
            return 0;
        }
        if(Nations_technologies::getOneNationTechnology($nation_id, $request->technology_id)->patent == 1 && $request->response == 1){

            $check = DB::table('nations_technologies')
                ->where('technology_id', $request->technology_id)
                ->where('nation_id', $nation_id)
                ->update([
                    'patent' => 0,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);


            if(!$check) {
                return response('Nastala chyba při aktualizaci dat v tabulce nations_technologies ', 500)->header('Content-Type', 'text/plain');
            }
        }


        return $this->getTechnologiView('technologies-box', $lobby_id);
    }

    function saveImage(Request $request){

        Log::info('TechnologyController:saveImage');

        if($request->img != "") {
            $validatedData = $request->validate([
                'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4092',
            ]);

            $img_type = $request->file('img')->getClientOriginalExtension();
            $img_name = $request->file('img')->getClientOriginalName();
//            $img_path = Carbon::now()->toDateTimeString().'.'.$img_type;
            request()->img->move(public_path('/Img/technology-img'), $img_name);
            $img_name = '/Img/technology-img/'.$img_name;
        }


        $images = $this->getAllTechnologyImages();

        return view('technologi-images-selector-gallery', ['images' => $images]);

    }

    function setImage(Request $request){

        Log::info('TechnologyController:setImage');

        $check = DB::table('technologies')
            ->where('id', $request->technology_id)
            ->update([
                'img_url' => $request->url,
            ]);


        if(!$check) {
            return response('Nastala chyba při aktualizaci dat v tabulce technologies ', 500)->header('Content-Type', 'text/plain');
        }

        $images = $this->getAllTechnologyImages();

        return view('technologi-images-selector-gallery', ['images' => $images]);


    }

    function removeImage(Request $request){

        Log::info('TechnologyController:removeImage');

        $all_technologies_used_image = Technologies::where('img_url', $request->url)->get();

        foreach ($all_technologies_used_image as $img){

            $check = DB::table('technologies')
                ->where('id', $img->id)
                ->update([
                    'img_url' => '/Img/default_technology_image.png',
                ]);


            if(!$check) {
                return response('Nastala chyba při aktualizaci dat v tabulce technologies ', 500)->header('Content-Type', 'text/plain');
            }
        }

        if (is_file(public_path($request->url))) {
            $check = unlink(public_path($img->url));
            if(!$check){
                return response('Chyba při mazání souboru ze složky!' . $request->table_name, 500)->header('Content-Type', 'text/plain');
            }
        }
//        //SMAZAt později debug else
//        else{
//            return response('Nenalezli jsme soubor ve složce!' . $request->table_name, 500)->header('Content-Type', 'text/plain');
//
//        }

        $images = $this->getAllTechnologyImages();

        return view('technologi-images-selector-gallery', ['images' => $images]);


    }

}
