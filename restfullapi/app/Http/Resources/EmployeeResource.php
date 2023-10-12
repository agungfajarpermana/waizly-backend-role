<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'          => $this->name,
            'jobTitle'      => $this->job_title,
            'salary'        => $this->salary,
            'department'    => $this->department,
            'joinDate'      => $this->joined_date
        ];
    }
}
