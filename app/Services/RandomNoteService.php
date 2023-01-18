<?php

namespace App\Services;

use App\Models\Note;
use App\Models\User;

class RandomNoteService
{

    public function getRandomNoteForUser(User $user): string
    {
        $notes = Note::where('user_id', $user->id)->where('learnable', true)->orderByRaw('rand()')->limit(1)->get();
        $randoms = [];

        foreach ($notes as $note) {
            $matches = explode('___', $note->body);
            $randoms[] = "# $note->title";
            $randomKeys = (array) array_rand($matches, min(2, count($matches)));
            foreach ($randomKeys as $key) {
                $randoms[] = $matches[$key];
            }
        }

        return implode("\n___\n", $randoms);
    }
}
