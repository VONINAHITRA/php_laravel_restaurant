<?php namespace App\Http\Controllers;

use App\Restaurant;
use App\Day;
use App\Http\Requests\RestaurantUpdateRequest;

class RestaurantController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $restaurants = Restaurant::paginate(5);

    return view('restaurants.index', compact('restaurants'));    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $days = $this->getDaysWithRestaurants($id);
    $restaurant = $this->getRestaurantById($id);

    return view('restaurants.show', compact('days', 'restaurant'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $days = $this->getDaysWithRestaurants($id);
    $restaurant = $this->getRestaurantById($id);
    $index = 1;

    return view('restaurants.edit', compact('days','restaurant', 'index'));    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  RestaurantUpdateRequest $restaurantUpdateRequest
   * @param  int  $id
   * @return Response
   */
  public function update(RestaurantUpdateRequest $restaurantUpdateRequest, $id)
  {
    // Mise à jour du nom
    $restaurant = Restaurant::find($id);
    $restaurant->name = $restaurantUpdateRequest->name;
    $restaurant->save();

    // Balayage et mise à jour des plages
    $starts = $restaurantUpdateRequest->all()['start'];
    $ends = $restaurantUpdateRequest->all()['end'];    
    $restaurant->days()->detach();
    foreach ($starts as $key => $array){
      //$restaurant->days()->detach($key);
      foreach ($array as $k => $value) {
        $restaurant->days()->attach([$key => ['start_time' => $value, 'end_time' => $ends[$key][$k]]]);
      }
    }

    return response()->json();    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $restaurant = $this->getRestaurantById($id);
    // Détachement des plages horaires
    $restaurant->days()->detach();
    // Suppression du restaurant
    $restaurant->delete();   

    return back(); 
  }

    protected function getDaysWithRestaurants($id) 
    {
      return Day::with(['restaurants' => function ($query) use($id) {
                  $query->where('restaurants.id', $id);
              }])->get();
    }

  protected function getRestaurantById($id)
  {
    return Restaurant::find($id);
  }
  
}

?>