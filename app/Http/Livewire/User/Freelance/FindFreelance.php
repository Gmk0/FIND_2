<?php

namespace App\Http\Livewire\User\Freelance;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Freelance;
use App\Models\Conversation;
use Livewire\WithPagination;
use App\Models\Message;

class FindFreelance extends Component
{
    use WithPagination;
    
    public $category=null;
    public $specialite=null;
    public $query="";
    public $trie;
    public $experience;
    public $disponibilite;
    public $taux;
    public $message=false;
    public $freelance_id;
    public $body;
    public $conversations =null;


    

    
    protected $paginationTheme = 'tailwind';
    
      protected $queryString = [
        'category' => ['expect' => ''],
         'query' => ['expect' => ''],
        "specialite"=>['expect' => ''],
        
    

    ];

    public function conversation($id){

        $this->message=true;
        $this->freelance_id=$id;

        $conversation=Conversation::where('user_id',auth()->user()->id)
        ->where('freelance_id',$id)->first();

        if($conversation!== null){
             $this->conversations=Message::where('conversation_id',$conversation->id)->get();
       
        }
        
       

    }

    public function conversations($id){
        
        $freelance = Freelance::find($id);
    
        $conversation = Conversation::where('freelance_id', $freelance->id)
        ->whereHas('user', function($query) {
            $query->where('id', auth()->id());
        })
        ->first();
    
       
    // Si une conversation est trouvée, afficher la vue de la conversation
            if ($conversation) {
                return redirect()->route('MessageUser');
            }
    
 
            $conversation = new Conversation();
            $conversation->freelance_id = $freelance->id;
            $conversation->last_time_message=now();
            $conversation->status='pending';
            $conversation->save();
    
   
            return redirect()->route('MessageUser');

    
    }


    public function sendMessage(){

        if( $this->freelance_id !=null){


           // $freelance = Freelance::find($id);
    
        $conversation = Conversation::where('freelance_id', $this->freelance_id)
        ->whereHas('user', function($query) {
            $query->where('id', auth()->id());
        })
        ->first();

        //dd($conversation);
    
        $this->validate([
            'body'=>'required']);
       
    // Si une conversation est trouvée, afficher la vue de la conversation
            if ($conversation !=null) {
                //return redirect()->route('conversations');

                 $createdMessage = Message::create([
                'sender_id'=>auth()->user()->id,
                'receiver_id'=>$this->freelance_id,
                'conversation_id'=>$conversation->id,
                'body'=>$this->body,
                'is_read'=>'0',
                'type'=>"text",

            ]);
            }else{
            $conversation = new Conversation();
            $conversation->freelance_id = $this->freelance_id;
            $conversation->last_time_message=now();
            $conversation->status='pending';
            $conversation->save();
            $createdMessage = Message::create([
                'sender_id'=>auth()->user()->id,
                'receiver_id'=>$this->freelance_id,
                'conversation_id'=>$conversation->id,
                'body'=>$this->body,
                'is_read'=>'0',
                'type'=>"text",

            ]);

            }
            $this->pushMessage($createdMessage->id);
              
        };
    }

     public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->conversations->push($newMessage);
        $this->dispatchBrowserEvent('rowChatToBottom');
        # code...
    }
    

     public function updating()
    {
        $this->resetPage();
    }

    public function unselect($value)
    {
        switch($value){
            case 'experience':
                $this->experience=null;
                break;
            case 'taux':
                $this->taux=null;
                break;
            case 'disponibilite':
                $this->disponibilite=null;
                break;
            case 'query':
                $this->query="";
                break;
            case 'specialite':
                $this->specialite=null;
                break;

        }
        
    }
    
    public function render()
    {
        return view('livewire.user.freelance.find-freelance',[
            'freelancers'=>Freelance::when($this->category, function($query){
                    $query->where('category_id',$this->category)->get();
            })->when($this->specialite, function($query){
               $query->where('Sub_categorie', 'like', '%"'.$this->specialite.'"%');
            })->when($this->experience, function($q){
                $q->where('experience','LIKE','%"'.$this->experience.'"%');
            })->WhereHas('category',function($query){
                $query->where('name','LIKE',"%".$this->query."%");
            })->when($this->taux, function($query) {
                    $query->whereBetween('taux_journalier', [10, $this->taux]);
                })
            ->paginate(9),
           
            'specialites'=>SubCategory::where('category_id',$this->category)->get(),
        
            
            ])->extends('layouts.user')->section('content');
    }

    

     public function gotoPage($page)
    {
        $this->setPage($page);
        $this->emit('gotoTop');
    }

    public function nextPage()
    {
        $this->setPage($this->page + 1);
        $this->emit('gotoTop');
    }

    public function previousPage()
    {
        $this->setPage(max($this->page - 1, 1));
        $this->emit('gotoTop');
    }
    private function isAuth()
    {
        return auth()->check();
    }
}
