<?php

namespace App\Http\Livewire\Freelance\Services;

use Livewire\Component;
use App\Models\freelance;
use App\Models\Service as modelsService;

use Illuminate\Support\Facades\Storage;

use Illuminate\Contracts\View\View;
use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Tabs;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, RichEditor, MarkdownEditor, Select, Toggle, FileUpload};
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FormComponent;
use App\Models\SubCategory;
use WireUi\Traits\Actions;

class ServicesCreate extends Component implements Forms\Contracts\HasForms
{
    use Actions;
    use WithFileUploads;

    use Forms\Concerns\InteractsWithForms;


    public modelsService $service;

    public $title;
    public $description;
    public $price;
    public $basic_delivery_time;
    public $basic_price;
    public $basic_support;
    public $samples;
    public $images;
    public $is_publish;
    public $temps;
    public $delivery_time;
    public $sub_categorie;
    public $format;
    public  $program;
    //public $step;


    protected $listeners = ['refresh' => '$refresh'];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Step::make('Titre')
                    ->schema([
                        TextInput::make('title')->label('Titre')->placeholder('Je vais photographier votre mariage civil'),
                        //TextInput::make('title')->label('Titre')->placeholder('Je vais photographier votre mariage civil'),

                        Fieldset::make('Sous categories')
                            ->schema([
                                Forms\Components\Select::make('sub_categorie')
                                    ->label('Sous categorie')
                                    ->multiple()
                                    ->options(SubCategory::where('category_id', Auth::user()->freelance->category->id)->pluck('name', 'name')),



                            ]),

                        Fieldset::make('Prix')
                            ->schema([
                                // ...
                                TextInput::make('basic_price')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', thousandsSeparator: ',', decimalPlaces: 2))->label('Prix du Service'),
                                Select::make('temps')
                                    ->options([
                                        'Heure' => 'Heure',
                                        'Complet' => 'Complet',
                                    ])

                            ])
                            ->columns(2),

                        RichEditor::make('description'),
                        // ...
                    ]),
                Step::make('Support du Service')
                    ->Description('Veuillez Rajouter quelques information contenant votre service et des examples')
                    ->schema([
                        FileUpload::make('images')->label('Image Decrivant le service')->multiple(),
                        RichEditor::make('samples')->label('Quelques Realisation lier')
                            ->fileAttachmentsDisk('local')
                            ->fileAttachmentsDirectory('public/attachments'),
                        RichEditor::make('basic_support')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons(['orderedList', 'bulletList'])

                            ->label('Le Support en Rapport a ce projet')
                            ->placeholder('Utiliser les listes')

                        // ...
                    ]),
                Step::make('Temps & Visibilite')
                    ->schema([

                        Fieldset::make('Prix')
                            ->schema([
                                // ...
                                TextInput::make('basic_delivery_time')->label('Temps De livraison'),
                                Select::make('delivery_time')
                                    ->options([
                                        //'Heure' => 'Heure',
                                        'Jour' => 'Jour',
                                        //'Mois' => 'Mois',
                                    ])

                            ]),


                        Toggle::make('is_publish')->label('Publier'),

                    ])
            ])->submitAction(new HtmlString('<button class="bg-amber-600 px-6 py-1.5 rounded-md text-white focus:bg-amber-800"  type="submit"><span wire:loading.remove>Submit</span><span wire:loading>Creation....</span></button>')),





            // ...
        ];
    }






    public function resetForm(): void
    {
        // Réinitialiser le formulaire
        $this->form->setUp();
    }

    public function submit()
    {

        //$this->emitSelf('refresh');



        //$this->resetForm();
        // dd($this->form->Titre);

        //$this->reset('Step');
        //$this->form->clear();

        $fileNames = $this->addImage($this->images);

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'basic_price' => $this->basic_price,
            'basic_revision' => 0,
            'basic_support' => $this->basic_support,

            'basic_delivery_time' => $this->basic_delivery_time,
            'samples' => $this->samples,
            'files' => $fileNames,

            'view_count' => 0,
            //'mode_temps' => $this->temps,
            'like' => 0,
            'format' => $this->format,
            'sub_categorie' => $this->sub_categorie,
            'is_publish' => $this->is_publish,
            'category_id' => Auth::user()->freelance->category->id,
            'freelance_id' => Auth::user()->freelance->id,
        ];

        // dd($data);
        /*

         'title',
        'description',
        'basic_price',
        'basic_support',
        'basic_revision',
        'basic_delivery_time',
        'premium_price',
        'premium_support',
        'premium_revision',
        'premium_delivery_time',
        'sub_categorie',
        'extra_price',
        'extra_support',
        'extra_revision',
        'extra_delivery_time',
        'samples',
        'files',
        'format',
        'video_url',
        'view_count',
        'like',
        'is_publish',
        'freelance_id',
        'category_id', */


        // dd($data);

        modelsService::create($data);

        $this->notification()->success(
            $title = "Creation reussi ",
            $description = 'Votre service  ete creer avec success',
        );


        //$this->refresh();
        //$this->form()->reset();
        //$this->resetAll();
        return redirect()->route('freelance.service.create');
        //$this->emitSelf('refresh')
    }

    function resetAll()
    {
        $this->title = null;
        $this->description = null;
        $this->price = null;
        $this->basic_delivery_time = null;
        $this->basic_price = null;
        $this->basic_support = null;
        $this->samples = null;
        $this->images = null;
        $this->is_publish = null;
        $this->temps = null;
        $this->delivery_time = null;
        $this->sub_categorie = null;
        $this->format = null;
    }


    public function addImage($files)
    {
        try {
            //          $fileNames=[];

            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();


                $fal =  $file->storeAs('public/service/', $fileName);
                $fileNames[] = $fileName;
            }

            return $fileNames;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.freelance.services.services-create')->extends('layouts.freelanceTest2')->section('content');
    }
}