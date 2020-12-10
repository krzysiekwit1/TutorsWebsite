<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;
use App\Models\Rating;


class TestController extends Controller
{
    public function index($sort , $language, $country, $city){
        
        function checkLanguage($languageToCheck){
            if($languageToCheck == "Arabic" || $languageToCheck == "Bulgarian" || $languageToCheck == "Cambodian" || $languageToCheck == "Chinese" || $languageToCheck == "Croatian" || $languageToCheck == "Czech" || $languageToCheck == "Danish" || $languageToCheck == "English" || $languageToCheck == "Estonian" || $languageToCheck == "French" || $languageToCheck == "Georgian" || $languageToCheck == "German" || $languageToCheck == "Greek" || $languageToCheck == "Hungarian" || $languageToCheck == "Icelandic" || $languageToCheck == "Irish" || $languageToCheck == "Italian" || $languageToCheck == "Japanese" || $languageToCheck == "Korean" || $languageToCheck == "Latvian" || $languageToCheck == "Lithuanian" || $languageToCheck == "Mongolian" || $languageToCheck == "Norwegian" || $languageToCheck == "Polish" || $languageToCheck == "Portuguese" || $languageToCheck == "Romanian" || $languageToCheck == "Russian" || $languageToCheck == "Serbian" || $languageToCheck == "Slovak" || $languageToCheck == "Spanish" || $languageToCheck == "Swedish" || $languageToCheck == "Thai" || $languageToCheck == "Turkish" || $languageToCheck == "Ukrainian" || $languageToCheck == "Vietnamese"  ){
                return true;
            }else{
                return false;
            }
        }
                function checkCountry($CountryToCheck){
            if($CountryToCheck == "Arabia" || $CountryToCheck == "Bulgaria" || $CountryToCheck == "Cambodia" || $CountryToCheck == "China" ||  $CountryToCheck == "Croatia" || $CountryToCheck == "Czech Republic" || $CountryToCheck == "Denmark" || $CountryToCheck == "England" || $CountryToCheck == "Estonia" || $CountryToCheck == "France" || $CountryToCheck == "Georgia" || $CountryToCheck == "Germany" || $CountryToCheck == "Greece" || $CountryToCheck == "Hungary" || $CountryToCheck == "Iceland" || $CountryToCheck == "Ireland" || $CountryToCheck == "Italy" || $CountryToCheck == "Japan" || $CountryToCheck == "Korea" || $CountryToCheck == "Latvia" || $CountryToCheck == "Lithuania" || $CountryToCheck == "Mongolia" || $CountryToCheck == "Norway" || $CountryToCheck == "Poland" || $CountryToCheck == "Portugal" || $CountryToCheck == "Romania" || $CountryToCheck == "Russia" || $CountryToCheck == "Serbia" || $CountryToCheck == "Slovakia" || $CountryToCheck == "Spain" || $CountryToCheck == "Sweden" || $CountryToCheck == "Thailand" || $CountryToCheck == "Turkey" || $CountryToCheck == "Ukraine" || $CountryToCheck == "Vietnam"  ){
                return true;
            }else{
                return false;
            }
        }
        
        if($sort == "pricedesc")
        {
            if(checkLanguage($language)== true){
                if(checkCountry($country)== true){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                                ->where('adverts.country', $country)
                                ->where(function($q) use ($language){
                                $q->where('adverts.language_1', $language)
                                ->orWhere('adverts.language_2', $language)
                                ->orWhere('adverts.language_3', $language)
                                ->orWhere('adverts.language_4', $language)
                                ->orWhere('adverts.language_5', $language);
                                })
                                ->where(function($q) use ($city){
                                $q->where('adverts.city', $city);
                                })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);

                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                                ->where('adverts.country', $country)
                                ->where(function($q) use ($language){
                                $q->where('adverts.language_1', $language)
                                ->orWhere('adverts.language_2', $language)
                                ->orWhere('adverts.language_3', $language)
                                ->orWhere('adverts.language_4', $language)
                                ->orWhere('adverts.language_5', $language);
                                })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);


                    }


                }else if (checkCountry($country)== false){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);

                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);

                    }


                }
            }else if(checkLanguage($language)== false){
                if(checkCountry($country)== true){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);

                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);

                    }
                }else if (checkCountry($country)== false){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','DESC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }
            }
        }
        else if($sort == "priceasc"){
            if(checkLanguage($language)== true){
                if(checkCountry($country)== true){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                                                    $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                                ->where('adverts.country', $country)
                                ->where(function($q) use ($language){
                                $q->where('adverts.language_1', $language)
                                ->orWhere('adverts.language_2', $language)
                                ->orWhere('adverts.language_3', $language)
                                ->orWhere('adverts.language_4', $language)
                                ->orWhere('adverts.language_5', $language);
                                })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }else if (checkCountry($country)== false){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                                ->where(function($q) use ($language){
                                $q->where('adverts.language_1', $language)
                                ->orWhere('adverts.language_2', $language)
                                ->orWhere('adverts.language_3', $language)
                                ->orWhere('adverts.language_4', $language)
                                ->orWhere('adverts.language_5', $language);
                                })
                                ->where(function($q) use ($city){
                                $q->where('adverts.city', $city);
                                })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }
            }else if(checkLanguage($language)== false){
                if(checkCountry($country)== true){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }else if (checkCountry($country)== false){
                        if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->select ('adverts.*','users.avatar')
                            ->orderBy('adverts.price','ASC')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }
            }
        }else if($sort == "none"){
            if(checkLanguage($language)== true){
                if(checkCountry($country)== true){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                                                    $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }else if (checkCountry($country)== false){
                    
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                                                    $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($language){
                            $q->where('adverts.language_1', $language)
                            ->orWhere('adverts.language_2', $language)
                            ->orWhere('adverts.language_3', $language)
                            ->orWhere('adverts.language_4', $language)
                            ->orWhere('adverts.language_5', $language);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }
            } if(checkLanguage($language)== false){
                if(checkCountry($country)== true){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where('adverts.country', $country)
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }else if (checkCountry($country)== false){
                    if($city != 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->where(function($q) use ($city){
                            $q->where('adverts.city', $city);
                            })
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }else if($city == 'none'){
                            $adverts=DB::table('adverts')
                            ->join('users','adverts.user_id','=','users.id')
                            ->select ('adverts.*','users.avatar')
                            ->get(); 
                            return view('pages/index')->with('adverts',$adverts);
                    }
                }
            }
        }
    }
}
