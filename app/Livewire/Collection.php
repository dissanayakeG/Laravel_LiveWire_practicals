<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Fluent;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Collection extends Component
{
    public $formData;
    public $ages = [];
    public $technologies = [];
    public $selected = [];
    public $comments = null;
    public array $logs = [];
    public $pageNumber = 1;

    use WithPagination;


    public function mount()
    {
        $this->formData = ['name' => 'Mds'];
        $this->ages = [1, 2, 3, 4, 5, 6, 7];
        $this->technologies = ["VueJs", "ReactJs", "AngularJs", "NodeJs", "ExpressJs"];
        $this->getLogs();
    }

    public function getFluentApiProperty()
    {
        $data = new Fluent($this->formData);
        $data['last_name'] = 'smith';

        $data->lastName('congo')
            ->age(25)
            ->isAdmin()
            ->isModerator(false);

        //return $data->name;
        return $data->toJson();
        return $data->toArray()['name'];
        return $data->getAttributes()['name'];
        return $data->get('name', 'Jack');
    }

    public function render()
    {
        return view('livewire.collection', ['posts' => Comment::paginate(10)]);
    }
    public function getLogs()
    {
        // $url = 'http://127.0.0.1:8000/api/api-logs?sessionId=&page=1';
        // $logs = Http::withToken('111')->get($url);
        // $this->logs = json_decode($logs->body(), true);
        $this->logs = [
            "current_page" => 1,
            "data" => [
                [
                    "id" => 1,
                    "environment" => "Dummy Data 1",
                    "level" => "Dummy Data 1",
                ],
                [
                    "id" => 2,
                    "environment" => "Dummy Data 2",
                    "level" => "Dummy Data 2",
                ],
                [
                    "id" => 3,
                    "environment" => "Dummy Data 2",
                    "level" => "Dummy Data 2",
                ],
                [
                    "id" => 4,
                    "environment" => "Dummy Data 1",
                    "level" => "Dummy Data 1",
                ],
                [
                    "id" => 5,
                    "environment" => "Dummy Data 2",
                    "level" => "Dummy Data 2",
                ],
                [
                    "id" => 6,
                    "environment" => "Dummy Data 2",
                    "level" => "Dummy Data 2",
                ],
                [
                    "id" => 7,
                    "environment" => "Dummy Data 1",
                    "level" => "Dummy Data 1",
                ],
                [
                    "id" => 8,
                    "environment" => "Dummy Data 2",
                    "level" => "Dummy Data 2",
                ],
                [
                    "id" => 9,
                    "environment" => "Dummy Data 2",
                    "level" => "Dummy Data 2",
                ],
            ],
            "first_page_url" => "/?page=1",
            "from" => 1,
            "last_page" => 4,
            "last_page_url" => "/?page=4",
            "links" => [
                "link1" => "/link1",
                "link2" => "/link2",
                "link3" => "/link3",
                "link4" => "/link4",
                "link5" => "/link5",
                "link6" => "/link6",
            ],
            "next_page_url" => "/?page=2",
            "path" => "/",
            "per_page" => 2,
            "prev_page_url" => null,
            "to" => 2,
            "total" => 8
        ];
    }

    public function pagination(int|string $page = 1)
    {
        if (is_string($page)) {
            $parts = parse_url($page);

            if (isset($parts['query'])) {
                parse_str($parts['query'], $query);
                if (isset($query['page'])) {
                    $this->pageNumber = intval($query['page']);
                } else {
                    echo 'Page number parameter is missing in the URL.';
                }
            }
        } else {
            $this->pageNumber = intval($page);
        }
        $this->getLogs();
    }

    public function getComments()
    {
        $this->comments = Comment::paginate(10);
    }
}
