<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource; //from ResourceCollection to JsonResource

class Phone extends  JsonResource  //from ResourceCollection to JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return 
        [
            'name' => $this->name,
            'price' => $this->price,
            //prevent error 0 division if no rates yet
            'ratings' => $this->review->sum('star') > 0 ? round($this->review->sum('star')/$this->review->count(), 2) : 'No Ratings Yet!',        
            'href' => [ 'reviews' => route('phones.show', $this->id)]       
        ];
    }
}
