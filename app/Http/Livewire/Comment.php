<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Comments;

class Comment extends Component
{
    public $newComment;
    public $comment;

    public function mount()
    {
        //dd ($this->comment[0]['body']);
        //dd ($comments);
        $comments = Comments::all();
        $this->comment = $comments;
    }

    /** livewire validation 
     *
     * @return realtimevalidation
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|min:2|max:255'
        ]);
    }

    public function remove($commentId)
    {
        $com = Comments::find($commentId);
        $com -> delete();
        $this->comment = $this->comment->where('id', '!==', $commentId);
    }

    public function addComment()
    {
        /* add ბათონზე დაჭერისას შეიქმება ახალი მასივი რომლი ბადი იქნება ინფუტ ელემენტში */
        $createComment = Comments::create([
            'body' => $this->newComment,
            'user_id' => 1,
        ]);

        /* და ეს შექმნილი მასივი დავფუშოთ commentში რომელიც გადაეცემა დომს mount მეთოდით */
        $this->comment->prepend($createComment);

        $this->newComment = ''; //ინპუტს გახდის ცარიელის კომენტარის დამატების შემდეგ
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
