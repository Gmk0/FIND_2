<?php

namespace App\Http\Livewire\Freelance\Commande;

use App\Models\Order;
use Livewire\Component;
use App\Models\feedback;
use App\Models\rapport;
use WireUi\Traits\Actions;
use App\Events\notificationOrder;

class CommandeDetails extends Component
{
    use Actions;
    public Order $order;

    public $progress;
    public $jour;
    public $description;

    public $status;
    protected $listeners = ['refresh' => '$refresh'];





    public function modLivre()
    {
        try {
            $this->validate([
                'progress' => 'required',
                'status' => 'required',
                'jour' => 'required',
            ]);

            $id = $this->order->id;

            $data = feedback::where('order_id', $id)->first();

            //dd($data);

            $data->etat = $this->status;
            $data->delai_livraison_estimee = $this->jour;
            $data->update();

            $this->order->progress = $this->progress;
            $this->order->update();
            if ($data) {

                $this->notification()->success(
                    $title = "Gestion commande",
                    $description = "Vos Modifications ont ete envoyer avec success",
                );
            }
            $this->reset('progress', 'jour', 'status');

            $this->emitSelf('refresh');

            broadcast(new notificationOrder($this->order->user));
        } catch (Exception $e) {
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

        broadcast(new notificationOrder($this->order->user));
        $this->emitSelf('refresh');
    }

    public function render()
    {
        return view('livewire.freelance.commande.commande-details');
    }
}
