<?php

namespace App\Http\Livewire\Freelance\Commande;

use App\Models\Order;
use Livewire\Component;
use App\Models\feedback;
use App\Models\rapport;
use WireUi\Traits\Actions;
use App\Events\notificationOrder;
use App\Models\FeedbackService;

class CommandeDetails extends Component
{
    use Actions;
    public Order $order;

    public $progress;
    public $jour;
    public $description;
    public $publier;

    public $status;
    protected $listeners = ['refresh' => '$refresh'];



    public function mount()
    {
        $this->publier = $this->order->feedback->is_publish ? $this->order->feedback->is_publish : 0;

        $this->progress = $this->order->progress;
        $this->status = $this->order->feedback?->etat;

        $this->jour = $this->order->feedback?->delai_livraison_estimee;
    }



    public function toogle()
    {


        $id = $this->order->id;

        $data = FeedbackService::where('order_id', $id)->first();
        $data->is_publish = $this->publier;
        $data->update();

        if ($data) {

            $this->notification()->success(
                $title = "Feedback modifier",

            );
        }
    }


    public function modLivre()
    {
        try {
            $this->validate([
                'progress' => 'required',
                'status' => 'required',
                'jour' => 'required',
            ]);


            if ($this->order->progress > $this->progress) {

                $this->notification()->error(
                    $title = "Gestion commande",
                    $description = "La progression ne doit etre inferieur a l'ancienne progression qui etait de " . $this->order->progress . "%",
                );

                $this->emitSelf('refresh');

                $this->progress = $this->order->progress;
            } else {
                $id = $this->order->id;

                $data = FeedbackService::where('order_id', $id)->first();

                //dd($data);

                $data->etat = $this->status;
                $data->delai_livraison_estimee = $this->jour;
                $data->update();


                $this->order->progress = $this->progress;
                $this->order->update();


                $data->notifyUser();
                if ($data) {

                    $this->notification()->success(
                        $title = "Gestion commande",
                        $description = "Vos Modifications ont ete envoyer avec success",
                    );
                }
                $this->reset('progress', 'jour', 'status');

                $this->emitSelf('refresh');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }


        //$this->emit('feedbackUpdated', $this->progress, $this->status, $this->jour);
    }

    public function SendRapport()
    {
        $this->validate([
            'description' => 'required',
        ]);

        $data = [
            'description' => $this->description,
            'order_id' => $this->order->id,
            'is_finish' => 0
        ];

        //dd($data);
        $data = rapport::create($data);

        if ($data) {

            $this->notification()->success(
                $title = "Raaport envoyer",
                $description = "",
            );
        }


        $this->reset('description');

        //broadcast(new notificationOrder($this->order->user));
        $this->emitSelf('refresh');
    }

    public function render()
    {
        return view('livewire.freelance.commande.commande-details');
    }
}
