<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Phone extends ResourceCollection
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
            'model' => $this->model,
            'price' => $this->price,
            //prevent error 0 division if no rates yet
            'ratings' => $this->review->sum('star') > 0 ? round($this->review->sum('star')/$this->review->count(), 2) : 'No Ratings Yet!',
            //make another controller for review.index     
            'href' => [ 'reviews' => route('review.index', $this->id)]       
        ];
    }
}
