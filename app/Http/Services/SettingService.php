<?php

namespace App\Http\Services;

use App\Http\Services\Block\BlockService;
use App\Models\Setting;

class SettingService
{

    public function __construct(
        protected BlockService $blockService,
    ) {
    }

    public function getParsed(): array
    {
        $settingModels = Setting::query()
            ->with('showBlock.template', 'showBlock.showBlocks.template')
            ->get();

        $settings = [];
        foreach($settingModels as $setting) {
            $setting->showBlocks = $this->blockService->processFields($setting->showBlocks);
            foreach($setting->showBlocks as $settingBlock) {
                $settings[$settingBlock->template->slug] = $settingBlock->fields;
                foreach($settingBlock->showBlocks as $showBlock) {
                    $settings[$settingBlock->template->slug]['blocks'][] = $showBlock->fields;
                }
            }
        }

        return $settings;
    }
}
