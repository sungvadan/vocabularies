<?php

namespace App\Services;

use App\Models\Note;
use App\Models\User;

class RandomNoteService
{

    public function getRandomNoteForUser(User $user): string
    {
        $notes = Note::where('user_id', $user->id)->where('learnable', true)->orderByRaw('rand()')->limit(2)->get();
        $randoms = [];

        foreach ($notes as $note) {
            $matches = explode('___', $note->body);
            $randoms[] = "# $note->title";
            if (count($matches) <= 3) {
                $randoms = array_merge($randoms ,$matches);
            } else {
                $chunk = [];
                while(count($chunk) < 3) {
                    $randomIndex = random_int(0 , count($matches) - 1);
                    if (!in_array($randomIndex, $chunk)) {
                        $chunk[] = $randomIndex;
                    }
                }

                foreach ($chunk as $index) {
                    $randoms[] = $matches[$index];
                }
            }
        }

        return implode("\n___\n", $randoms);
    }
}
