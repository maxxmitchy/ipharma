<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Rating extends Component
{
    public $rating;
    public $avgRating;
    public $product;
    public $users;
    public $review;

    public function mount($product) {

        $this->product = $product;
        $userRating = $this->product->users()
            ->firstWhere('user_id', auth()->id());

        if (!$userRating) {
            $this->rating = 0;
        } else {
            $this->rating = $userRating->pivot->rating;
        }

        $this->users = $this->product->users()->count();

        $this->calculateAverageRating();
    }

    private function calculateAverageRating() {
        $this->avgRating = round($this->product->users()->avg('rating'), 1);
    }

    public function render()
    {
        return view('livewire.rating');
    }

    public function setRating($val)
    {
        if ($this->rating == $val) {    // user can click on the same rating to reset the value
            $this->rating = 0;
        } else {
            $this->rating = $val;
        }

        $userId = auth()->id();

        $userRating = $this->product->users()->where('user_id', $userId)->first();

        if (!$userRating) {
            $userRating = $this->product->users()->attach($userId, [
                'rating' => $val
            ]);
        } else {
            $this->product->users()->updateExistingPivot($userId, [
                'rating' => $val
            ], false);
        }

        $this->users = $this->product->users()->count();

        $this->calculateAverageRating();
    }
}
