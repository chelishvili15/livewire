<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comment = [
        [
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, magnam.',
            'created_at' => '1min ago',
            'author' => 'chelo'
            ]
    ];

    public $newComment;

    public function addComment()
    {
        array_unshift($this->comment, [
                'body' => $this->newComment,
                'created_at' => Carbon::now()->diffForHumans(),
                'author' => 'chelo'
        ]);

        $this->newComment = ''; //ინპუტს გახდის ცარიელის კომენტარის დამატების შემდეგ
    }

    public function render()
    {
        return view('livewire.comment');
    }
}