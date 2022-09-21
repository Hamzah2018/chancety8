<?php

namespace App\Http\Resources\admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $options = view('admin.customers.partials.options' , ['instance' => $this])->render();
        $image = view('admin.customers.partials.image' , ['instance' => $this])->render();

        $active = view('admin.customers.partials.active', ['instance' => $this])->render();

        return [
            'id' => $this->id,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'password' => $this->mobile,
            'user_type' => 'customer',
            'email' => $this->email,
            'second_email' => $this->second_email,
            'activate' => $active,
            'options' => $options,
        ];
    }
}
