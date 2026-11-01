<?php

namespace App\Livewire\Backend;

use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Medias extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $media;

    public $totalMedia;

    public $perPage = 12;

    public $selectedMedia = []; // Array to store selected media items

    public $select;

    public $openModal;

    public $search;

    public $editedMedia;

    public $alt;

    public $description;

    public $caption;

    public $selectedMonth;

    public $sortOrder = 'desc'; // 'asc' or 'desc'

    public function mount()
    {
        $this->loadMedia();
    }

    public function loadMore()
    {
        $this->editedMedia = null;
        $this->reset(['alt', 'description', 'caption']);
        $this->perPage += 24;
        $this->loadMedia();
    }

    public function resetMonthFilter()
    {
        $this->selectedMonth = null;
        $this->resetPage();
    }

    public function setSortOrder($order)
    {
        $this->sortOrder = $order === 'asc' ? 'asc' : 'desc';
        $this->resetPage();
    }

    public function updatedSortOrder()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function getAvailableMonths()
    {
        $months = Media::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($item) {
                $date = Carbon::create($item->year, $item->month, 1);

                return [
                    'value' => $date->format('Y-m'),
                    'label' => $date->format('F Y'), // e.g., "December 2025"
                ];
            });

        return $months;
    }

    public function toggleSelect($mediaId)
    {
        $this->editedMedia = null;
        $this->reset(['alt', 'description', 'caption']);

        if ($this->select === 'multiple') {
            // Toggle selection for multiple mode
            if (in_array($mediaId, $this->selectedMedia)) {
                $this->selectedMedia = array_values(array_diff($this->selectedMedia, [$mediaId]));
            } else {
                $this->selectedMedia[] = $mediaId;
            }
        } else {
            // Store single array for single mode - toggle between selected and empty
            if (in_array($mediaId, $this->selectedMedia)) {
                $this->selectedMedia = [];
            } else {
                $this->selectedMedia = [$mediaId];
            }
        }
    }

    private function loadMedia()
    {
        $this->totalMedia = Media::count();
    }

    public function deleteMedia($id)
    {
        $this->editedMedia = null;
        $this->reset(['alt', 'description', 'caption']);
        $media = Media::with('user:id,name')->where('id', $id)->first();

        if ($media != null) {

            $media->delete();
            $this->dispatch('media-updated');
            $this->dispatch('success', ['message' => 'Image Deleted.']);

            Storage::disk('public')->delete($media->file_name);
        } else {
            $this->dispatch('warning', ['message' => 'Image Not Found.']);
        }
    }

    public function closeModal()
    {
        $this->openModal = 'false';
        $this->editedMedia = null;
        $this->reset(['alt', 'description', 'caption']);
    }

    // edit
    public function editMedia($id)
    {
        $this->reset(['alt', 'description', 'caption']);

        $media = Media::with('user:id,name')->where('id', $id)->first();

        if ($media != null) {

            $this->editedMedia = $media;
            $this->alt = $media->alt;
            $this->description = $media->description;
            $this->caption = $media->caption;

            $this->dispatch('go_to_media_body');

        } else {
            $this->dispatch('warning', ['message' => 'Image Not Found.']);
        }
    }

    public function editedMediaSubmit($id)
    {
        $media = Media::with('user:id,name')->where('id', $id)->first();

        if ($media != null) {

            $media->alt = $this->alt;
            $media->description = $this->description;
            $media->caption = $this->caption;
            $media->save();

            $this->dispatch('success', ['message' => 'Updated.']);

        } else {
            $this->dispatch('warning', ['message' => 'Image Not Found.']);
        }
    }

    public function reloadMedia()
    {
        $this->editedMedia = null;
        $this->reset(['alt', 'description', 'caption']);
        $this->dispatch('media-updated');
    }

    #[On('media-updated')]
    public function render()
    {
        $query = Media::query()->with('user:id,name');

        // Search filter
        if ($this->search) {
            $query->where('file_original_name', 'like', '%'.$this->search.'%');
        }

        // Month filter
        if ($this->selectedMonth) {
            $query->whereYear('created_at', date('Y', strtotime($this->selectedMonth.'-01')))
                ->whereMonth('created_at', date('m', strtotime($this->selectedMonth.'-01')));
        }

        // Order by created_at (asc or desc)
        $query->orderBy('created_at', $this->sortOrder);

        return view('livewire.backend.medias', [
            'medias' => $query->paginate($this->perPage),
            'availableMonths' => $this->getAvailableMonths(),
        ]);
    }
}
