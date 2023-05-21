<?php

namespace App\Http\Livewire\User\Services;

use App\Models\Category;
use App\Models\Conversation;
use App\Models\Favori;
use App\Models\Freelance;
use App\Models\Like;
use App\Models\Service;
use App\Tools\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use WireUi\Traits\Actions;

class PresentationService extends Component
{

    use Actions;

    public function render()
    {
        $category = Category::all();

        $servicesBest = Service::limit(20)->get();

        // $servicesBest = Service::whereHas('category', function ($query) {
        //   $query->where('id', "Photographie");
        //})->limit(20)->get();

        $freelance = Freelance::paginate(20);

        $services = Service::orderBy('basic_price', 'Asc')->paginate(8);






        return view('livewire.user.services.presentation-service', [


            'categories' => $category,
            'servicesBest' => $servicesBest,
            'freelances' => $freelance,
            'services' => $services,

        ]);
    }





    public function conversations($id)
    {

        $freelance = Freelance::find($id);

        $conversation = Conversation::where('freelance_id', $freelance->id)
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();


        // Si une conversation est trouvée, afficher la vue de la conversation
        if ($conversation) {
            return redirect()->route('MessageUser');
        }


        $conversation = new Conversation();
        $conversation->freelance_id = $freelance->id;
        $conversation->last_time_message = now();
        $conversation->status = 'pending';
        $conversation->save();

        $this->emitTo('user.conversation.body-message', 'loadConversation', $conversation, $freelance->id);


        return redirect()->route('MessageUser');
    }
}
