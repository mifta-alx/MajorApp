<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Result;
use App\Models\School;
use App\Models\Ranking as Rankings;
use Livewire\WithPagination;

class Ranking extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $paginate = 10;
    public $search = '';
    public function render()
    {
        $results = Result::with('student')
            ->whereHas('student', function ($query) {
                $query->where('student_name', 'like', '%' . $this->search . '%')
                    ->orWhere('nisn', 'like', '%' . $this->search . '%');
            })->get();
        $results = collect($results)->sortByDesc(function ($result) {
            return $result->saw_result;
        })->values()->all();
        if($this->search == ''){
            if (Rankings::all()->count() != count($results)) {
                Rankings::truncate();
                foreach ($results as $key => $data) {
                    Rankings::create(
                        [
                            'ranking' => $key + 1,
                            'nisn' => $data->student->nisn,
                            'result_id' => $data->result_id,
                            'npsn' => $data->student->npsn,
                            ]
                        );
                    }
                };
            };
        return view('livewire.rankings.ranking', [
            'titles' => 'Rankings',
            'title' => 'Ranking',
            'count' => Rankings::all()->count(),
            'rankings' => Rankings::with(['student', 'school', 'result'])
                ->whereHas('student', function ($query) {
                    $query->where('student_name', 'like', '%' . $this->search . '%');
                })
                ->paginate($this->paginate),
        ]);
    }
}
