<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    private $rates;
    
    /**
     * Transform the resource into an array 
     * You can add property whatever you want here
     * Call property of related model using $this
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // foreach($this->getRatings as $rate) {           
        //     if($rate->phone_id == $this->id){
        //       $this->rates = $rate->rate;
        //     }
        // }     
        
        return [
            'name' => $this->name,
            'model' => $this->model,
            'price' => $this->price,
            //prevent error 0 division if no rates yet
            'ratings' => $this->review->sum('star') > 0 ? round($this->review->sum('star')/$this->review->count(), 2) : 'No Ratings Yet!',
            //make another controller for review.index     
            'href' => [ 'reviews' => route('review.index', $this->id)]       
        ];              
    }
}
