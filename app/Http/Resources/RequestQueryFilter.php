<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class RequestQueryFilter
{
    public function attach($resource, Request $request = null)
    {
        $request = $request ?? request();
        return tap($resource, function ($resource) use ($request) {
            $this->getRequestIncludes($request)->each(function ($include) use ($resource) {
                $resource->load($include);
            });
        });
    }

    protected function getRequestIncludes(Request $request)
    {
        $include_request = $request->get('include');

        $include = [];

        if (!empty($include_request)) {

            //remove extra comma to prevent error

            $include_request = rtrim($include_request,',');

            $include = array_map('trim', explode(',', $include_request));
        }

        return collect($include);
    }
}