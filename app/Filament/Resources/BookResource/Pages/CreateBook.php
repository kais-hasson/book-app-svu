<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;
    protected function beforeSave(): void
    {
        if ($this->record && $this->record->path_url) {
            // Get the relative path (e.g., 'books/filename.pdf')
            $path = $this->record->path_url;

            // Ensure it's stored as relative path
            $this->record->path_url = $path;

            // Save public URL in a virtual attribute or just use it in views when needed
            // For example: Storage::url($path) → https://yourdomain.com/storage/books/filename.pdf
            $this->record->save();
        }
    }
}
