<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rating;
use DB;


class RatingController extends Controller
{
    public function sendRating(Request $request){
            if($authId = Auth::id()){
        $ratingValue = $request->ratedUserRadioValue;
        $ratedUser = $request->ratedUserId;
        if($ratedUser==$authId){
            $data = ['result'=>'AuthIDSameAsRatedID'];
            return response()->json($data);
        }
            $ratingExists = Rating::        
        where('user_id_1','=',$authId)
        ->where('user_id_2','=',$ratedUser)
        ->get('id');

        if($ratingExists->isEmpty()){

        $rating = new Rating;
        $rating->user_id_1 =$authId;
        $rating->user_id_2 =$ratedUser;
        $rating->rating = $ratingValue;
        $rating->save();

            $data = ['result'=>'success'];
            return response()->json($data);
        }
        if($ratingExists->isNotEmpty()){

            Rating::where('id',$ratingExists[0]["id"])
            ->update(["rating"=>$ratingValue]);

            $data = ['result'=>'RatingUpdated'];
            return response()->json($data);

        }
            $data = ['result'=>'Error'];
            return response()->json($data);
            }

            $data = ['result'=>'userNotLoggedIn'];
            return response()->json($data);
    }
    public function getRating(Request $request){
            $rating = DB::table('ratings')
            ->where('user_id_2', $request->userId)
            ->sum('rating');
            $numberOfRatings = DB::table('ratings')
            ->where('user_id_2', $request->userId)
            ->count();
            if($numberOfRatings != 0){
                $finalRating= $rating/$numberOfRatings;
                    $data  = ['result'=>$finalRating];
                    return response()->json($data);
            }

        
            //$data = ['result'=>$request->userId];
            $data  = ['result'=>'noData'];
            return response()->json($data);
    }
}
