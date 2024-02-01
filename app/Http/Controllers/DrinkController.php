<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class DrinkController extends Controller
{
   public function getDrinks(){
    $drinks = Drink::with("type","package")->get();

    return $drinks;
   } 
   public function getOneDrinks($input){
    
    $drink = Drink::where("drink",$input)->first();
    
    return $drink;
   }
   public function getAddDrinks(Request $request){
    
   
    
    $data = $request->all();
    $drink = new Drink;
    $drink->drink = $data["drink"];
    $drink->amount = $data["amount"];
    $drink->type_id= $data["type_id"];
    $drink->package_id = $data["package_id"];
    $drink->save();

    return "OK";
   }
   public function modifyDrink(Request $request){
      $drink = Drink::find($request["id"]);

      $drink->drink =$request["drink"];

      $drink->save();
      return "ok";
   }
   public function deleteDrink(Request $request){
      $drink = Drink::find($request["id"]);
      $drink->delete();
      return "ok";
   }
}
