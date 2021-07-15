<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Comments;

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

    

    public function mount()
    {
        //dd ($this->comment[0]['body']);
        //dd ($comments);
        $comments = Comments::all();
        $this->comment = $comments;
    }

    public function addComment()
    {
        
        if ($this->newComment === null){
            return;
        }

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
