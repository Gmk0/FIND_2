<?php

namespace App\Http\Livewire\User\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\service;
use Carbon\Carbon;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\{ToggleColumn, BadgeColumn, TextColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Forms;
use Filament\Tables\Filters\Filter;

use Filament\Tables\Actions\{BulkAction, Action};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TransactionUser extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;
    public $transaction;

    public $transactions;
    public $pending;
    public $successfull;
    public $failed;
    public $period = 'last7days';
    public $endDate;
    public $startDate;
    protected $listeners = ['startDateUpdated'];



    public function formatDate($date)
    {
        $carbonDate = Carbon::createFromFormat('m/d/Y', $date);
        return $carbonDate->format('Y-m-d H:i:s');
    }
    public function startDateUpdated($startDate, $endDate)
    {
        $this->startDate = $startDate;

        $this->endDate = $endDate;
    }

    public function cancel()
    {
        $this->startDate = null;

        $this->endDate = null;
    }




    function getTransaction()
    {
        $user = auth()->id();
        $transactions = Transaction::where('user_id', auth()->id());


        $statusFilters = [];

        if ($this->pending) {
            $statusFilters[] = 'pending';
        }

        if ($this->failed) {
            $statusFilters[] = 'failed';
        }

        if ($this->successfull) {
            $statusFilters[] = 'successfull';
        }

        if (!empty($statusFilters)) {
            $transactions->whereIn('status', $statusFilters);
        }

        if ($this->period === 'last7days') {
            $transactions->where('created_at', '>=', now()->subDays(7));
        } elseif ($this->period === 'last30days') {
            $transactions->where('created_at', '>=', now()->subMonths(1));
        } elseif ($this->period === 'last3months') {
            $transactions->where('created_at', '>=', now()->subMonths(3));
        } elseif ($this->period === 'last90days') {
            $transactions->where('created_at', '>=', now()->subMonths(9));
        } elseif ($this->period === 'today') {
            $transactions->where('created_at', '>=', now());
        }



        if ($this->startDate && $this->endDate) {



            $transactions->whereBetween('created_at', [$this->formatDate($this->startDate), $this->formatDate($this->endDate)]);
        }





        $transactions = $transactions->orderBy('created_at', 'desc')->get();



        return $transactions;
    }


    public function render()
    {
        $this->transactions = $this->getTransaction();
        return view(
            'livewire.user.transaction.transaction-user'
        )->layout('layouts.user-profile2');
    }
}
