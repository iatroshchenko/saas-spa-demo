<?php

namespace App\Http\Resources;

use App\Models\Shipper\ShipperMailTemplate;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class MailTemplateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $variablesByType = ShipperMailTemplate::getVariablesByType();
        $type = ShipperMailTemplate::mailableToType($this->mailable);

        return [
            'id' => $this->uuid,
            'type' => $type,
            'is_active' => $this->is_active,
            'name' => $this->name,
            'subject' => $this->subject,
            'html_template' => $this->html_template,
            'updated_at' => $this->updated_at->format('m/d/Y'),
            'background_color' => $this->background_color,
            'variables' => $variablesByType[$type]
        ];
    }
}
