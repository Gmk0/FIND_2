<?php

namespace App\Http\Livewire\Freelance\Services;

use Livewire\Component;
use App\Models\freelance;
use App\Models\Service;

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
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FormComponent;
use App\Models\SubCategory;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TagsInput;
use WireUi\Traits\Actions;


class EditService extends Component implements Forms\Contracts\HasForms
{

    use WithFileUploads;

    use actions;

    use Forms\Concerns\InteractsWithForms;

    public $serviceId;
    public Service $service;
    public $serviceEdit;
    public $description;
    public $basic_support;
    public $samples;
    public $images;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($id)
    {
        $this->service = Service::find($id);
        $this->serviceEdit
            = Service::find($id)->toArray();
        $this->serviceId = $id;


        $this->form->fill([
            //'title' => $this->service->title,
            'description' => $this->serviceEdit['description'],
            //'basic_price' => $this->service->basic_price,
            //'basic_revision' => $this->service->basic_revision,
            'basic_support' => $this->serviceEdit['basic_support'],
            //'tags' => $this->service->sub_categorie,
            //'basic_delivery_time' => $this->service->basic_delivery_time,
            'samples' => $this->serviceEdit['samples'],
            // 'files' => json_encode($),

            // 'format' => json_decode($this->service->sub_categorie),

        ]);
    }

    public function submit()
    {
        $this->form->validate();

        $this->service->update([
            'description' => $this->description,
            'basic_support' => $this->basic_support,
            'samples' => $this->samples,

        ]);

        $this->emitSelf('refresh');
    }

    public function effacerImage($key)
    {


        $file = $this->service->files[$key];


        $data = $this->service->files;
        unset($data[$key]);

        $data = array_values($data);

        $datal = Storage::disk('local')->exists('public/service/' . $file);
        if ($datal) {

            Storage::disk('local')->delete('public/service/' . $file);

            $this->service->files = $data;
            $this->service->update();

            $this->notification()->success(
                $title = "Modifcation reussi ",
                $description = 'Votre service  ete creer avec success',
            );

            $this->emitSelf('refresh');
        } else {

            $this->service->files = $data;
            $this->service->update();

            $this->notification()->error(
                $title = "Erreur ",
                $description = 'le fichier existe pas',
            );
        }
    }
    public function modifierFirst()
    {
        $this->validate([
            'serviceEdit.title' => 'required',
            'serviceEdit.basic_price' => 'required',
            'serviceEdit.basic_delivery_time' => 'required',
            'serviceEdit.basic_revision' => 'required',
        ]);

        $this->service->update([
            'title' => $this->serviceEdit['title'],
            'basic_price' => $this->serviceEdit['basic_price'],
            'basic_delivery_time' => $this->serviceEdit['basic_delivery_time'],
            'basic_revision' => $this->serviceEdit['basic_revision'],
        ]);


        $this->notification()->success(
            $title = "Modifcation reussi ",
            $description = 'Votre service  ete creer avec success',
        );

        $this->emitSelf('refresh');
    }

    public function saveImage()
    {
        $this->validate([
            'images' => 'file|mimes:jpg,png,gif,jpeg',

        ]);


        $fileName = $this->images->getClientOriginalName();


        $files =  $this->images->storeAs('public/service/', $fileName);



        $data = $this->service->files;
        $data[] = $fileName;
        $this->service->files = $data;
        $this->service->update();

        $this->notification()->success(
            $title = "Modifcation reussi ",
            $description = 'Votre service  ete creer avec success',
        );

        $this->emitSelf('refresh');
    }


    protected function getFormSchema(): array
    {
        return [





            MarkdownEditor::make('description'),

            RichEditor::make('samples')->label('Quelques Realisation lier')
                ->fileAttachmentsDisk('local')
                ->fileAttachmentsDirectory('attachments'),
            MarkdownEditor::make('basic_support')
                ->disableAllToolbarButtons()
                ->enableToolbarButtons(['orderedList', 'bulletList'])

                ->label('Le Support en Rapport a ce projet')
                ->placeholder('Utiliser les listes')








            /* Wizard::make([
                Wizard\Step::make('Titre')
                    ->schema([
                        TextInput::make('title')->label('Titre')->placeholder('Je vais photographier votre mariage civil'),
                        //TextInput::make('title')->label('Titre')->placeholder('Je vais photographier votre mariage civil'),



                        TagsInput::make('tags'),
                        Fieldset::make('Sous categories')
                            ->schema([
                                Forms\Components\Select::make('sub_categorie')
                                    ->label('Sous categorie')
                                    ->multiple()
                                    ->options(SubCategory::where('category_id', Auth::user()->freelance->category->id)->pluck('name', 'name')),

                                TextInput::make('format')->label('Format'),

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

                        MarkdownEditor::make('description'),
                        // ...
                    ]),
                Wizard\Step::make('Support du Service')
                    ->Description('Veuillez Rajouter quelques information contenant votre service et des examples')
                    ->schema([
                        FileUpload::make('images')->label('Image Decrivant le service')->multiple(),
                        RichEditor::make('samples')->label('Quelques Realisation lier')
                            ->fileAttachmentsDisk('local')
                            ->fileAttachmentsDirectory('attachments'),
                        MarkdownEditor::make('basic_support')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons(['orderedList', 'bulletList'])

                            ->label('Le Support en Rapport a ce projet')
                            ->placeholder('Utiliser les listes')

                        // ...
                    ]),
                Wizard\Step::make('Temps & Visibilite')
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
            ])->skippable()
                ->submitAction(new HtmlString('<button class="bg-amber-600 px-6 py-1.5 rounded-md text-white focus:bg-amber-800"  type="submit"><span wire:loading.remove>Modifications</span><span wire:loading>Creation....</span></button>')),




*/
            // ...
        ];
    }

    public function render()
    {
        return view('livewire.freelance.services.edit-service')->extends('layouts.freelanceTest2')->section('content');
    }
}