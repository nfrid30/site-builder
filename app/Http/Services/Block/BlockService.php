<?php

namespace App\Http\Services\Block;

use App\Enums\InputTypeEnum;
use App\Models\Block;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BlockService
{
    public function update(Request $request): void
    {
        $blocks = $request->blocks;

        if($blocksImages = $request->file('blocks')) {
            foreach ($blocksImages as $blockId => $fieldArray) {
                foreach ($fieldArray as $fileArray) {
                    foreach ($fileArray as $imageKey => $imageFile ) {
                        /** @var UploadedFile $imageFile */

                        $filename = $imageFile->getClientOriginalName();
                        $path = 'blocks/' . $blockId;
                        Storage::putFileAs($path, $imageFile, $filename);
                        $blocks[$blockId]['fields'][$imageKey] = $path . '/' . $filename;
                    }
                }
            }
        }

        foreach($blocks ?? [] as $block) {
            Block::query()->where('id', $block['id'])
                ->update(['fields' => $block['fields']]);
        }
    }

    public function processFields(Collection $blocks): Collection
    {

        $parsedBlocks = $blocks->map(function (Block $block) {

            if($block->template->is_general) {
                $block->fields = $block->template->generalBlock->fields;
                $block->showBlocks = $block->template->generalBlock->showBlocks;
            }

            foreach($block->template->options as $option) {
                $strategy = BlockFieldsProcessFactory::getStrategy(InputTypeEnum::tryFrom($option['type']));
                $block = $strategy->blockProcess($block, $option);
            }

            if(count($block->showBlocks)) {
                $block->showBlocks = $this->processFields($block->showBlocks);
            }
            return $block;
        });

        return $parsedBlocks;
    }
}
