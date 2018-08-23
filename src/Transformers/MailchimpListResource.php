<?php
namespace R64\NovaEmailMarketing\Transformers;

use League\Fractal;

class MailchimpListTransformer extends Fractal\TransformerAbstract
{
    public function transform($list)
    {
        return [
	        'id'      => (int) $list['id'],
            'name'    => $list['name'],
            'subscribers' => $list['stats']['member_count']
        ];
    }
}